<?php
/**
* BlogCacheManager
*
* Forget (delete) controllers caches
* Events are binded in app/start/global.php
*/

/**
 * BlogCacheManager
 *
 * @author seb
 */
class BlogCacheManager {
    
        /**
         * Parameters allowed to create a cache identifier
         */
        public static $allowed_identifier_parameters = ['slug','tag'];

        /**
         * get a content from cache
         * 
         * @return mixed \Illuminate\Http\Response | null
         */
	public static function get() {
		$identifier = static::getIdentifierFromCurrentRoute();
		$exists = Cache::has($identifier);
		Log::info('get : check cache : '. $identifier .' : '. ($exists ? 'existe' : 'existe pas'));

		$cache = Cache::get(static::getIdentifierFromCurrentRoute(), null);
		// dd($cache);
		if(!is_null($cache)) {
			// add new header to response to evaluate if content needs to be cached by cache filter
			$response = new Illuminate\Http\Response();
			$response->setContent($cache);
			$response->header('X-BlogCacheManager', 'cached', false);
			return $response;
		}
	}

        /**
         * Put proceeded route response in cache
         * 
         * @param \Illuminate\Http\Response $response Response rendered by route
         */
	public static function put($response) {
		$cached = (bool)$response->headers->get('X-BlogCacheManager', false);
		if(!$cached) {
			$identifier = static::getIdentifierFromCurrentRoute();
			Cache::forever(static::getIdentifierFromCurrentRoute(), $response->original);
			Log::info('put : '. $identifier .' - '.$response->headers->get('X-BlogCacheManager', 'not defined'));
		}
	}

        /**
         * Get a cache identifier based on current route
         * 
         * @return string
         */
	protected static function getIdentifierFromCurrentRoute() {
		$route = Route::getCurrentRoute();
		$request = Route::getCurrentRequest();
		$page = $request->input('page', '0');

	  	return static::getIdentifier($route->getName(), $route->parameters(), $page);
	}
        
        /**
         * 
         * @param type $route_name
         * @param type $parameters
         * @param type $page
         * @return string
         */
        protected static function getIdentifier($route_name, $parameters, $page = '0')
        {
            // filter params
//            $parameters = array_filter($parameters, function($element) {
//                return in_array($element, BlogCacheManager::$allowed_identifier_parameters ) ;
//            });
            $parameters = array_only($parameters, BlogCacheManager::$allowed_identifier_parameters);
            $parameters_flatten = '';
            foreach($parameters AS $key => $value) {
                $parameters_flatten = $key.':'.$value.'_';
            }
            $parameters_flatten = substr($parameters_flatten,0, -1);
            
            return $route_name.'_'.$parameters_flatten.'_'.$page;
        }

	/**
	* Delete caches when page saved
	*
	* @return void
	**/
	public static function postSaving(Post $post)
	{
		// forget post cache
		static::forgetPost($post);

		// delete cache of posts list on home
		
		$nb_pages = ceil( Post::wherePublished('1')->count() / Config::get('blog.posts_per_page') )+1;
		while($nb_pages--) {
                        $identifier = static::getIdentifier('home', [], $nb_pages);
			Cache::forget($identifier);
			Log::info('cache manager : delete posts : '.$identifier);
		}

		// delete cache of posts list filter by tag
                // @todo : it must delete cache of post tags, removed tags needs also to be forgotten
                static::forgetTags($post->tags->all());
	}

	/**
	* Comment Approved
	*
	* Forget related Post controller cache
	*
	* @return void
	**/
	public function commentApproved(Comment $comment)
	{
		static::forgetPost($comment->post);
	}

	/**
	* Forget Post controller cache
	* 
	* @param Post $post
	* @return void
	**/
	protected static function forgetPost(Post $post) {
		Cache::forget(static::getIdentifier('post.view', $post->getAttributes()));
		Log::info('cache manager : delete Post : '.static::getIdentifier('post.view', $post->getAttributes()));
	}
        
        /**
	* Forget Tags controller cache
	* 
	* @param mixed array|Collection Tags
	* @return void
	**/
        protected static function forgetTags($tags) {
            foreach($tags AS $tag)
            { 
                $nb_pages = ceil( 
                    Post::with(['tags' => function($query) use ($tag) {
                            $query->whereId($tag->id);}])
                            ->count() / Config::get('blog.posts_per_page') )+1;

                while($nb_pages--) {
                    Cache::forget(static::getIdentifier('tag.view', ['tag' => $tag->title], $nb_pages));
                    Log::info('cache manager : delete posts : taglist_'.static::getIdentifier('tag.view', ['tag' => $tag->title], $nb_pages));
                }
            }
        }
}

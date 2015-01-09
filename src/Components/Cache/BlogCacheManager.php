<?php
/**
* BlogCacheManager
*
* Forget (delete) controllers caches
* Events are binded in app/start/global.php
 * 
 * @author sebastienmonterisi@yahoo.fr
 * @package onemorelaravelblog
*/

namespace SebSept\OMLB\Components\Cache;

use \SebSept\OMLB\Models\Tag\Tag;

/**
 * BlogCacheManager
 *
 */
class BlogCacheManager {
    
        /**
         * Parameters allowed to create a cache identifier
         */
        protected static $allowed_identifier_parameters = ['slug','tag'];

        /**
         * get a content from cache
         * 
         * @return mixed \Illuminate\Http\Response | null
         */
	public function get() {
		$identifier = $this->getIdentifierFromCurrentRoute();
		$exists = \Cache::has($identifier);
                \Config::get('app.debug') && \Log::info('get : check cache : '. $identifier .' : '. ($exists ? 'exists' : 'doesnt exists'));

		$cache = \Cache::get($this->getIdentifierFromCurrentRoute(), null);
		if(!is_null($cache)) {
			// add new header to response to evaluate if content needs to be cached by cache filter
			$response = new \Illuminate\Http\Response();
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
	public function put($response) {
		$cached = (bool)$response->headers->get('X-BlogCacheManager', false);
		if(!$cached) {
			$identifier = $this->getIdentifierFromCurrentRoute();
			\Cache::forever($this->getIdentifierFromCurrentRoute(), $response->original);
			\Config::get('app.debug') && \Log::info('put : '. $identifier .' - '.$response->headers->get('X-BlogCacheManager', 'not defined'));
		}
	}

        /**
         * Get a cache identifier based on current route
         * 
         * @return string
         */
	protected function getIdentifierFromCurrentRoute() {
		$route = \Route::getCurrentRoute();
		$request = \Route::getCurrentRequest();
		$page = $request->input('page', '0');

	  	return $this->getIdentifier($route->getName(), $route->parameters(), $page);
	}
        
        /**
         * 
         * @param type $route_name
         * @param type $parameters
         * @param type $page
         * @return string
         */
        protected function getIdentifier($route_name, $parameters, $page = '0')
        {
            $parameters = array_only($parameters, static::$allowed_identifier_parameters);
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
	public function postSaving(\SebSept\OMLB\Models\Post\Post $post)
	{
		// forget post cache
		$this->forgetPost($post);

		// delete cache of posts list on home
		
		$nb_pages = ceil(\SebSept\OMLB\Models\Post\Post::wherePublished('1')->count() / \Config::get('blog.posts_per_page') )+1;
		while($nb_pages--) {
                        $identifier = $this->getIdentifier('post.index', [], $nb_pages);
			\Cache::forget($identifier);
			\Config::get('app.debug') && \Log::info('cache manager : delete posts : '.$identifier);
		}
	}

	/**
	* Comment Published
	*
	* Forget related Post controller cache
	*
	* @return void
	**/
	public function commentPublished(\SebSept\OMLB\Models\Comment\Comment $comment)
	{
		$this->forgetPost($comment->post);
	}
        
        public function postSavingTags($original_tags, $new_tags)
        {
            $tags_id = array_unique( array_merge($original_tags, $new_tags) );
            $tags = Tag::find($tags_id);
            $this->forgetTags($tags);
        }

	/**
	* Forget Post controller cache
	* 
	* @param Post $post
	* @return void
	**/
	protected function forgetPost(\SebSept\OMLB\Models\Post\Post $post) {
		\Cache::forget($this->getIdentifier('post.show', $post->getAttributes()));
		\Config::get('app.debug') && \Log::info('cache manager : delete Post : '.$this->getIdentifier('post.show', $post->getAttributes()));
	}
        
        /**
	* Forget Tags controller cache
	* 
	* @param mixed array|Collection Tags
	* @return void
	**/
        protected function forgetTags($tags) {
            foreach($tags AS $tag)
            { 
                $nb_pages = ceil( 
                        \SebSept\OMLB\Models\Post\Post::with(['tags' => function($query) use ($tag) {
                            $query->whereId($tag->id);}])
                            ->count() / \Config::get('blog.posts_per_page') )+1;

                while($nb_pages--) {
                    \Cache::forget($this->getIdentifier('post.index.bytag', ['tag' => $tag->title], $nb_pages));
                    \Config::get('app.debug') && \Log::info('cache manager : delete posts : taglist_'.$this->getIdentifier('post.index.bytag', ['tag' => $tag->title], $nb_pages));
                }
            }
        }
        
        /**
         * Flush cache
         * 
         * @return void
         */
        public function flush()
        {
            \Config::get('app.debug') && \Log::info('cache manager : cache flush requested');
            \Cache::flush();
        }
}

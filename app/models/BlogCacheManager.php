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

	public static function get() {
		$identifier = static::getIdentifier();
		$exists = Cache::has($identifier);
		Log::info('get : check cache : '. $identifier .' : '. ($exists ? 'existe' : 'existe pas'));

		$cache = Cache::get(static::getIdentifier(), null);
		// dd($cache);
		if(!is_null($cache)) {
			// add new header to response to evaluate if content needs to be cached by cache filter
			$response = new Illuminate\Http\Response();
			$response->setContent($cache);
			$response->header('X-BlogCacheManager', 'cached', false);
			return $response;
		}

		
	}

	public static function put($response) {
		$cached = (bool)$response->headers->get('X-BlogCacheManager', false);
		if(!$cached) {
			$identifier = static::getIdentifier();
			Cache::forever(static::getIdentifier(), $response->original);
			Log::info('put : '. $identifier .' - '.$response->headers->get('X-BlogCacheManager', 'not defined'));
		}
	}

	protected static function getIdentifier() {
		$route = Route::getCurrentRoute();
		$request = Route::getCurrentRequest();
		$page = $request->input('page', '0');

		$identifier = $route->getName().'_'.
					  // serialize($route->parameters()).'_'.
					  $page
					  ;
	  	return $identifier;
	}

	/**
	* Delete caches when page saved
	*
	* @return void
	**/
	public static function postSaving(Post $post)
	{
		// forget post cache
		$this->forgetPost($comment->post);

		// delete cache of posts list on home
		trigger_error(('implement me'));
		$nb_pages = ceil( Post::wherePublished('1')->count() / Config::get('app.posts_per_page') )+1;
		while($nb_pages--) {
			Cache::forget('homelist_'.$nb_pages);
			Log::info('cache manager : delete posts : page'.$nb_pages);
		}

		// delete cache of posts list filter by tag
		foreach($post->tags AS $tag)
		{ 
			$nb_pages = ceil( 
				Post::with(['tags' => function($query) use ($tag) {
					$query->whereId($tag->id);}])
					->count() / Config::get('app.posts_per_page') )+1;

			while($nb_pages--) {
				Cache::forget('taglist_'.$tag->title.$nb_pages);
				Log::info('cache manager : delete posts : taglist_'.$tag->title.$nb_pages);
			}
		}
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
		$this->forgetPost($comment->post);
	}

	/**
	* Forget Post controller cache
	* 
	* @param Post $post
	* @return void
	**/
	protected function forgetPost(Post $post) {
		trigger_error(('implement me'));
		$cache_id = 'post_'.$post->getOriginal('slug');
		Cache::forget($cache_id);
		Log::info('cache manager : delete Post : '.$cache_id);
	}

}

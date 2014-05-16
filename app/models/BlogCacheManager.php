<?php
/*
 * 
 */

/**
 * Cache : extended FileStore
 *
 * @author seb
 */
class BlogCacheManager {

	/**
	* Delete caches when page saved
	* 
	* Called because event registred in app/start/global.php
	**/
	public static function postSaving(Post $post)
	{
		// delete cache of post cache
		$cache_id = 'post_'.$post->getOriginal('slug');
		Cache::forget($cache_id);
		Log::info('cache manager : delete : '.$cache_id);

		// delete cache of posts list on home
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

}

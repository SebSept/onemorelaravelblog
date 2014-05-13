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

	public static function postSaving(Post $post)
	{
		// delete post cache
		Cache::forget('post_'.$post->getOriginal('slug'));
		Log::info('cache manager : delete post : '.$post->getOriginal('slug'));

		// delete list cache
		$nb_pages = ceil( Post::wherePublished('1')->count() / Config::get('app.posts_per_page') )+1;
		while($nb_pages--) {
			Cache::forget('home_'.$nb_pages);
			Log::info('cache manager : delete home : page'.$nb_pages);
		}
	}

}

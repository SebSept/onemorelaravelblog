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
		Log::info('cache manager : delete post cache : '.$post->getOriginal('slug'));

		// @todo delete list cache
	}

}

<?php

/**
 * BlogCacheManager
 *
 * Forget (delete) controllers caches
 * 
 * @author sebastienmonterisi@yahoo.fr
 * @package onemorelaravelblog
 */

namespace SebSept\OMLB\Components\Cache;

/**
 * BlogCacheManagerServiceProvider
 *
 * Register BlogCacheManager instance in $app
 * Create the facade BlogCacheManager
 */
class BlogCacheManagerServiceProvider extends \Illuminate\Support\ServiceProvider
{

    public function register()
    {
        $this->app->bind('BlogCacheManager', function()
        {
            return new \SebSept\OMLB\Components\Cache\BlogCacheManager;
        });
    }

    public function boot()
    {
        // @todo : remove & update Facade
        // declare the facade
        $loader = \Illuminate\Foundation\AliasLoader::getInstance();
        $loader->alias('BlogCacheManager', '\SebSept\OMLB\Components\Cache\Facade\BlogCacheManager');
        $this->listenToEvents();
    }

    private function listenToEvents()
    {
        // post saving
        \SebSept\OMLB\Models\Post\Post::saving(function($post)
        {
            \BlogCacheManager::postSaving($post);
        });

        // post tags changed
//        \Event::listen('post.saving.tags', 'BlogCacheManager@postSavingTags');
        
        // comments approved, added by admin 
//        Event::listen('comment.approved', 'BlogCacheManager@commentPublished');
//        Event::listen('comment.added_by_admin', 'BlogCacheManager@commentPublished');
    }

}

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

namespace OMLB\Components\Cache;

/**
 * BlogCacheManager
 *
 */
class BlogCacheManagerServiceProvider extends \Illuminate\Support\ServiceProvider {
    
    public function register()
    {
        \App::bind('BlogCacheManager', function()
        {
            return new \OMLB\Components\Cache\BlogCacheManager;
        });
    }
}

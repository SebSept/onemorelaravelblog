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

/**
 * BlogCacheManagerServiceProvider
 *
 * Register BlogCacheManager instance in $app
 * Create the facade BlogCacheManager
 */
class BlogCacheManagerServiceProvider extends \Illuminate\Support\ServiceProvider {
    
    public function register()
    {
        $this->app->bind('BlogCacheManager', function()
        {
            return new \SebSept\OMLB\Components\Cache\BlogCacheManager;
        });
    }
    
    public function boot()
    {
        // declare the facade
        $loader = \Illuminate\Foundation\AliasLoader::getInstance();
        $loader->alias('BlogCacheManager', '\SebSept\OMLB\Components\Cache\Facade\BlogCacheManager');
    }
}

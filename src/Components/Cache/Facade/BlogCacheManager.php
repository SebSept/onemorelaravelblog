<?php
/**
 * BlogCacheManager Facade
 * 
 * @author sebastienmonterisi@yahoo.fr
 * @package onemorelaravelblog 
 */

namespace SebSept\OMLB\Components\Cache\Facade;
/**
 * BlogCacheManager
 *
 */
class BlogCacheManager extends \Illuminate\Support\Facades\Facade {
    
    protected static function getFacadeAccessor() {
        return 'BlogCacheManager';
    }
    
}

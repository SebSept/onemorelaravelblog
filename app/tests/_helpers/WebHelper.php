<?php
namespace Codeception\Module;

// here you can define custom functions for WebGuy 

class WebHelper extends \Codeception\Module
{
    /**
     * user is not a logged admin
     * 
     * mock Auth::check() to return false;
     */
    public function amGuest()
    {
        \Illuminate\Support\Facades\Auth::shouldReceive('check')
        ->once()
        ->andReturn(false);
    }
    
    /**
     * user is a logged admin
     * 
     * mock Auth::check() to return true;
     */
    public function amAdmin() 
    {        
        \Illuminate\Support\Facades\Auth::shouldReceive('check')
        ->once()
        ->andReturn(true);
    }
    
    public function prepareEmptyCache()
    {
        // assert using a file cache
        $this->assertEquals('Illuminate\Cache\FileStore', get_class(\Cache::getStore()), 'You must config testing cache to be "file"');
        // create dir if not exists
        file_exists($this->cacheDir()) || mkdir($this->cacheDir());
        
        // flush cache dir
        \BlogCacheManager::flush();

        $this->seeEmptyCacheDir();
    }
    
    public function seeEmptyCacheDir($debug = false)
    {
//        if($debug)
//            dd(glob( $this->cacheDir().'/*'));
        $this->assertEmpty(glob( $this->cacheDir().'/*/*/*'));
    }
    
    public function seeNewCache()
    {
        $this->assertNotEmpty(glob( $this->cacheDir().'/*/*/*'));
    }

    public function seeCacheCommentTag()
    {
        $this->getModule('Laravel4')->see('<!-- retrieved from cache -->');
    }
    
    private function cacheDir()
    {
        return \Config::get('cache.path');
    }
}

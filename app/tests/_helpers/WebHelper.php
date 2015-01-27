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
        // enable filter to check if admin
        \Route::enableFilters();
        // auth user
        $this->getModule('Laravel4')->amHttpAuthenticated('testguy', 'pass');
    }
    
    public function amAdminWithMock()
    {
        $this->amAdmin();
        \Illuminate\Support\Facades\Auth::shouldReceive('check')
            ->once()
            ->andReturn(true);
    }
    
    /**
     * be on the page that display a specified post
     * 
     * @param Post $post
     */
    public function amOnPostPage($post)
    {
        $this->getModule('Laravel4')->amOnPage('/'.$post->slug);
    }
    
    /**
     * be on the page that display list of post with a specified tag
     * 
     * @param Tag $tag
     */
    public function amOnTagPage($tag)
    {
        $this->getModule('Laravel4')->amOnPage('/tag/'.$tag->title);
    }
    
    public function prepareEmptyCache()
    {
        // assert using a file cache
        $this->assertEquals('Illuminate\Cache\FileStore', get_class(\Cache::getStore()), 'You must config testing cache to be "file"');
        // create dir if not exists
        file_exists($this->cacheDir()) || mkdir($this->cacheDir());
        
        // flush cache dir
        \BlogCacheManager::flush();
    }

    /**
     * content is retrived from cache
     */
    public function contentIsFromCache()
    {
        $this->getModule('Laravel4')->see('<!-- retrieved from cache -->');
    }
    
    /**
     * Content is not retrieved from cache
     */
    public function contentIsNotFromCache()
    {
        $this->getModule('Laravel4')->dontSee('<!-- retrieved from cache -->');
    }
    
    private function cacheDir()
    {
        return \Config::get('cache.path');
    }
}

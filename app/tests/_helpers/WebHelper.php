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
        ->andReturn(false);
    }
    
}

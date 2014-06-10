<?php
/**
 * PostRepositoryFactory
 * 
 * @author sebastienmonterisi@yahoo.fr
 * @package onemorelaravelblog
 */

/**
 * PostRepository Factory
 *
 */
class PostRepositoryFactory {
    
    /**
     * Available context strings
     */
    const CONTEXT_FRONT = 'front';
    const CONTEXT_ADMIN = 'admin';


    /**
     * Post Repository Factory
     * 
     * @param type $context
     * @return IPostRepository
     */
    public static function make($context = null)
    {
        $context = is_null($context) ? static::findContext(): $context;
        switch ($context) {
            case (self::CONTEXT_ADMIN) :
                return new AdminPostRepository();
                break;
            case (self::CONTEXT_FRONT) :
                return new FrontPostRepository();                
                break;
            default :
                throw new Illuminate\Exception('undefined context');
        }
    }
    
    /**
     * Find context by route & user authentification
     * 
     * @return string front|admin
     */
    protected static function findContext() {
        if( starts_with(Route::current()->getPrefix(), 'admin')
            && Auth::check()) {
            return self::CONTEXT_ADMIN;
        }
        return self::CONTEXT_FRONT;
    }
    
}

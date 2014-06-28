<?php
/**
 * CommentRepositoryFactory
 * 
 * @licence MIT  http://choosealicense.com/licenses/mit/
 * @author sebastienmonterisi@yahoo.fr
 * @package onemorelaravelblog
 */

namespace SebSept\OMLB\Models\Comment;

/**
 * CommentRepository Factory
 */
class Factory {
    
    /**
     * Available context strings
     */
    const CONTEXT_GUEST = 'front';
    const CONTEXT_ADMIN = 'admin';


    /**
     * Comment Repository Factory
     * 
     * @param  string $context
     * @return ICommentRepository
     */
    public static function make($context = null)
    {
        $context = is_null($context) ? static::findContext(): $context;
        switch ($context) {
            case (self::CONTEXT_ADMIN) :
                return new Repository\AdminCommentRepository();
                break;
            case (self::CONTEXT_GUEST) :
                return new Repository\GuestCommentRepository();                
                break;
            default :
                throw new Illuminate\Exception('undefined context <em>'.$context.'</em>');
        }
    }
    
    /**
     * Find context by user authentification
     * 
     * @return string self::CONTEXT_ADMIN|self::CONTEXT_GUEST
     */
    protected static function findContext() {
        return \Auth::check() ? self::CONTEXT_ADMIN : self::CONTEXT_GUEST;
    }
    
}

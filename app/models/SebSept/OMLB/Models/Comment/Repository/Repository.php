<?php
/**
 * CommentRepository
 * 
 * @author sebastienmonterisi@yahoo.fr
 * @package onemorelaravelblog
 */

namespace SebSept\OMLB\Models\Comment\Repository;

/**
 * Repository
 */
abstract class Repository {

    /**
     * Get comments (paginated)
     * 
     * @return \Illuminate\Database\Eloquent\Collection Collection of Posts
     */
//    abstract function getAll();
    
    /**
     * Closure used to alter Post scope
     * 
     * @return Closure
     */
     abstract protected function getDefaultScope();
}

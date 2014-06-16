<?php
/**
 * FrontPostRepository
 * 
 * Posts repository for front end
 * 
 * @author sebastienmonterisi@yahoo.fr
 * @package onemorelaravelblog
 */

namespace OMLB\Models\Post\Repository;

use OMLB\Models\Post\Post;
use OMLB\Models\Tag\Tag;

/**
 * FrontPostRepository
 *
 */
class FrontPostRepository extends PostRepository {

    /**
     * Closure used to alter Post scope
     * 
     * This defines the scope for all Post request
     * 
     * @return Closure
     */
     protected function getDefaultScope() {
         return function($query) { 
            return $query->wherePublished('1')
            ->orderBy('created_at', 'DESC'); 
         };
    }
}

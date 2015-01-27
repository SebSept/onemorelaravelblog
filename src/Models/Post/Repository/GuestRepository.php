<?php
/**
 * GuestRepository
 * 
 * Posts repository for front end
 * 
 * @author sebastienmonterisi@yahoo.fr
 * @package onemorelaravelblog
 */

namespace SebSept\OMLB\Models\Post\Repository;

/**
 * GuestRepository
 *
 */
class GuestRepository extends Repository {

    /**
     * Get posts (paginated)
     * 
     * @return \Illuminate\Database\Eloquent\Collection Collection of Posts
     */
    public function getAll()
    {
        return \SebSept\OMLB\Models\Post\Post::applyScope($this->getDefaultScope())
            ->paginate(\Config::get('blog.posts_per_page'));
    }
    
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

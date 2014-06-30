<?php
/**
 * Comments Guest Repository
 * 
 * Comments repository for guests
 * 
 * @author sebastienmonterisi@yahoo.fr
 * @package onemorelaravelblog
 */

namespace SebSept\OMLB\Models\Comment\Repository;

/**
 * Comments Guest Repository
 *
 */
class GuestRepository extends Repository {
    
    /**
     * Save new Comment in storage
     * 
     * @param array attributes $values
     * @return bool
     */
    public function add(array $values) {
        $comment = new \SebSept\OMLB\Models\Comment\Comment($values);
        $comment->post_id = $values['post_id'];
        \Config::get('app.debug') && \Log::debug(__CLASS__);
        return $comment->save();
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

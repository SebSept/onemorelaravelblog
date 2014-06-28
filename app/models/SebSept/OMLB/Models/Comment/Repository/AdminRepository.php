<?php
/**
 * AdminRepository
 * 
 * Comments repository for admins
 * 
 * @author sebastienmonterisi@yahoo.fr
 * @package onemorelaravelblog
 */

namespace SebSept\OMLB\Models\Comment\Repository;

/**
 * AdminRepository
 *
 */
class AdminRepository extends Repository {
    
    /**
     * Save new Comment in storage
     * 
     * @param array attributes $values
     * @return bool
     */
    public function add(array $values) {
        $comment = new \SebSept\OMLB\Models\Comment\Comment($values);
        
        $comment->post_id = $values['post_id'];
        $comment->published = 1;
        $comment->is_admin = 1;
        
        if($comment->save()) {
            \Event::fire('comment.added_by_admin', [$comment]);
            return true;
        }
        return false;
    }
    
}

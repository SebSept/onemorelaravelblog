<?php
/**
 * GuestCommentRepository
 * 
 * Comments repository for guests
 * 
 * @author sebastienmonterisi@yahoo.fr
 * @package onemorelaravelblog
 */

namespace OMLB\Models\Comment\Repository;

/**
 * Description of GuestCommentRepository
 *
 */
class GuestCommentRepository extends Repository {
    
    /**
     * Save new Comment in storage
     * 
     * @param array attributes $values
     * @return bool
     */
    public function add(array $values) {
        $comment = new \OMLB\Models\Comment\Comment($values);
        $comment->post_id = $values['post_id'];
        return $comment->save();
    }
}

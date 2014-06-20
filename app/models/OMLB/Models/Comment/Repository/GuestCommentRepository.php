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
//        $values['is_admin'] = 0;
//        $values['published'] = 0;
        $comment = new OMLB\Models\Comment\Comment($values);
        return $comment->save();
    }
}

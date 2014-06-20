<?php
/**
 * AdminCommentRepository
 * 
 * Comments repository for admins
 * 
 * @author sebastienmonterisi@yahoo.fr
 * @package onemorelaravelblog
 */

namespace OMLB\Models\Comment\Repository;

/**
 * AdminCommentRepository
 *
 */
class AdminCommentRepository extends Repository {
    
    /**
     * Save new Comment in storage
     * 
     * @param array attributes $values
     * @return bool
     */
    public function add(array $values) {
        $values['is_admin'] = 1;
        $values['published'] = 1;
        $comment = new OMLB\Models\Comment\Comment($values);
        return $comment->save();
    }
    
}

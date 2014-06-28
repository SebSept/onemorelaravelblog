<?php
/**
 * CommentRepository
 * 
 * @author sebastienmonterisi@yahoo.fr
 * @package onemorelaravelblog
 */

namespace SebSept\OMLB\Models\Comment\Repository;

/**
 * AdminCommentRepository
 *
 */
abstract class Repository {
    
    /**
     * Save new Comment in storage
     * 
     * @param array attributes $values
     * @return bool
     */
    abstract public function add(array $values);
}

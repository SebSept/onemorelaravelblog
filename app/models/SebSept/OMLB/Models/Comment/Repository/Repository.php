<?php
/**
 * CommentRepository
 * 
 * @author sebastienmonterisi@yahoo.fr
 * @package onemorelaravelblog
 */

namespace SebSept\OMLB\Models\Comment\Repository;

/**
 * AdminRepository
 *
 */
abstract class Repository {

    /**
     * Closure used to alter Post scope
     * 
     * @return Closure
     */
     abstract protected function getDefaultScope();
}

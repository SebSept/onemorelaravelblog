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

use \SebSept\OMLB\Models\Comment\Comment;

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
        \Config::get('app.debug') && \Log::debug(__CLASS__);
        
        if($comment->save()) {
            \Event::fire('comment.added_by_admin', [$comment]);
            return true;
        }
        return false;
    }
    
            
    /**
     * Get unmoderated/unpublished comments
     * 
     * @return \Illuminate\Database\Eloquent\Collection Collection of Posts
     */
    public function getUnmoderated()
    {      
        // @todo use a dedicated config value
        return Comment::applyScope($this->getDefaultScope())
            ->wherePublished('0')
            ->paginate(\Config::get('blog.posts_per_page'));
    }
    
    /**
     * Total number of comments
     * 
     * @return int
     */
    public function count()
    {
        return Comment::applyScope($this->getDefaultScope())
            ->count();
    }
    
    /**
     * Get a comment by id
     * 
     * @param int $id
     * @return mixed Post | null
     */
    public  function getById($id) {
        return Comment::applyScope($this->getDefaultScope())
                ->whereId($id)
                ->first();
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
            return $query->orderBy('created_at', 'DESC'); 
         };
    }
}

<?php
/**
 * AdminPostRepository
 * 
 * Posts repository for backend
 * 
 * @author sebastienmonterisi@yahoo.fr
 * @package onemorelaravelblog
 */

/**
 * AdminPostRepository
 *
 */
class AdminPostRepository extends PostRepository {
        
    /**
     * Get a post by id or get a new one
     * 
     * @param int $id
     * @return Post
     */
    public function getByIdOrNew($id) {
        if(!$post = $this->getById($id)) {
            // instanciate new Post with givent $id OR autoincremented id
            $post = new Post();
            $post->id = $id ?: ((int)DB::table((new Post())->getTable())->max('id')+1);
        }
        return $post;
    }
    
    /**
     * Save Post and associated tags
     * 
     * @param int $id
     * @param array $inputs
     * @return bool
     */
    public  function save($id, array $inputs)
    {
        $post = $this->getByIdOrNew($id);
        
        $inputs['published'] = is_null($inputs['published']) ? 0 : 1;
        $post->setTagsFromString(Input::get('hidden-tags'));
        unset( $inputs['hidden-tags'] );
        $post->fill($inputs);
        
        return $post->save();
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

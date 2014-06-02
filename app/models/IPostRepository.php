<?php
/**
 * PostRepository Interface
 * 
 * @author sebastienmonterisi@yahoo.fr
 * @package onemorelaravelblog
 */

/**
 * PostRepository
 *
 */
interface IPostRepository {
    /**
     * Get posts (paginated)
     * 
     * @return \Illuminate\Database\Eloquent\Collection Collection of Posts
     */
    public function getAll();
    
    /**
     * Get posts with tag
     * 
     * @param  string requested tag title 
     * @return \Illuminate\Database\Eloquent\Collection Collection of Posts
     */
//    public function getByTagName($tag_name);
    
    /**
     * Get a post by id
     * 
     * @param int $id
     * @return mixed Post | null
     */
    public function getById($id);
    
    /**
     * Get Post by slug
     * 
     * @param string $slug
     * @return mixed Post|null
     */
    public  function getBySlug($slug);
}

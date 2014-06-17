<?php
/**
 * PostRepository
 * 
 * @author sebastienmonterisi@yahoo.fr
 * @package onemorelaravelblog
 */

namespace OMLB\Models\Post\Repository;

use OMLB\Models\Post\Post;
use OMLB\Models\Tag\Tag;

/**
 * PostRepository
 *
 * @author seb
 */
abstract class PostRepository implements IPostRepository {
        
    /**
     * Get posts (paginated)
     * 
     * @return \Illuminate\Database\Eloquent\Collection Collection of Posts
     */
    public function getAll()
    {      
        return Post::applyScope($this->getDefaultScope())
            ->paginate(\Config::get('blog.posts_per_page'));
    }
    
    /**
     * Get posts with tag
     * 
     * @param  string requested tag title 
     * @return \Illuminate\Database\Eloquent\Collection Collection of Posts
     */
    public function getByTagName($tag_name)
    {
        $tag = Tag::whereTitle($tag_name)->first();
        return Post::applyScope($this->getDefaultScope())
            ->whereHas('tags', function($q) use($tag) { $q->where('id', '=', $tag->id); })
            ->paginate(\Config::get('blog.posts_per_page'));
    }
    
    /**
     * Get a post by id
     * 
     * @param int $id
     * @return mixed Post | null
     */
    public  function getById($id) {
        return Post::applyScope($this->getDefaultScope())
                ->whereId($id)
                ->first();
    }

    /**
     * Get Post by slug
     * 
     * @param string $slug
     * @return mixed Post|null
     */
    public function getBySlug($slug)
    {
        return Post::applyScope($this->getDefaultScope())
            ->whereSlug($slug)
            ->with(['comments' => function($query) {
                $query->wherePublished('1');
            }, 'tags'])
            ->first();
    }

    /**
     * Closure used to alter Post scope
     * 
     * @return Closure
     */
     abstract protected function getDefaultScope();
}
<?php
/**
 * Repository
 * 
 * @author sebastienmonterisi@yahoo.fr
 * @package onemorelaravelblog
 */

namespace SebSept\OMLB\Models\Post\Repository;

use \SebSept\OMLB\Models\Post\Post;
use \SebSept\OMLB\Models\Tag\Tag;

/**
 * Repository
 *
 */
abstract class Repository {

    /**
     * Get posts (paginated)
     * 
     * @return \Illuminate\Database\Eloquent\Collection Collection of Posts
     */
    abstract function getAll();
    
    /**
     * Get posts with tag
     * 
     * @param  string requested tag title 
     * @return \Illuminate\Database\Eloquent\Collection Collection of Posts
     */
    public function getByTagName($tag_name)
    {
        $tag = Tag::whereTitle($tag_name)->firstOrFail();
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
            ->firstOrFail();
    }

    /**
     * Closure used to alter Post scope
     * 
     * @return Closure
     */
     abstract protected function getDefaultScope();
}

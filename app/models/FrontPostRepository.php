<?php
/**
 * FrontPostRepository
 * 
 * Posts repository for front end
 * 
 * @author sebastienmonterisi@yahoo.fr
 * @package onemorelaravelblog
 */

/**
 * FrontPostRepository
 *
 */
class FrontPostRepository implements IPostRepository {
    
    /**
     * Get posts (paginated)
     * 
     * @return \Illuminate\Database\Eloquent\Collection Collection of Posts
     */
    public function getAll()
    {
        return Post::
            wherePublished('1')
            ->orderBy('created_at', 'DESC')
            ->paginate(Config::get('blog.posts_per_page'));
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
        return Post::whereHas('tags', function($q) use($tag) { $q->where('id', '=', $tag->id); })
            ->wherePublished('1')
            ->paginate(Config::get('blog.posts_per_page'));
    }
    
    /**
     * Get a post by id
     * 
     * @param int $id
     * @return mixed Post | null
     */
    public  function getById($id) {
        return Post::whereId($id)
                ->wherePublished('1')
                ->first();
    }

    /**
     * Get Post by slug
     * 
     * @param string $slug
     * @return mixed Post|null
     */
    public  function getBySlug($slug)
    {
        return Post::whereSlug($slug)
            ->wherePublished('1')
            ->with(['comments' => function($query) {
                $query->wherePublished('1');
            }, 'tags'])
            ->first();
    }
}

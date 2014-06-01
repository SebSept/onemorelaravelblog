<?php
/**
 * PostRepository
 * 
 * @author sebastienmonterisi@yahoo.fr
 * @package onemorelaravelblog
 */

/**
 * PostRepository
 *
 */
class PostRepository {
    
    /**
     * Get posts (paginated)
     * 
     * @return \Illuminate\Database\Eloquent\Collection Collection of Posts
     */
    public static function getAll()
    {
        return Post::wherePublished('1')
                ->orderBy('created_at', 'DESC')
                ->paginate(Config::get('blog.posts_per_page'));
    }
    
    /**
     * Get posts with tag
     * 
     * @param  string requested tag title 
     * @return \Illuminate\Database\Eloquent\Collection Collection of Posts
     */
    public static function getByTagName($tag_name)
    {
        $tag = Tag::whereTitle($tag_name)->first();
        return Post::wherePublished('1')
                    ->with(['tags' => function($query) use ($tag) {
                        $query->whereId($tag->id);
                    }])
                    ->paginate(Config::get('blog.posts_per_page'));
    }
    
    /**
     * Get Post by slug
     * 
     * @param string $slug
     * @return mixed Post|null
     */
    public static function getBySlug($slug)
    {
        return Post::whereSlug($slug)
            ->wherePublished('1')
            ->with(['comments' => function($query) {
                $query->wherePublished('1');
            }, 'tags'])
            ->first();
    }
}

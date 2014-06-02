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
    public static function getAll($context = 'front')
    {
        if($context == 'admin') {
            return Post::
                    orderBy('created_at', 'DESC')
                    ->paginate( Config::get('blog.posts_per_page_admin') );
        }
        else {
            return Post::
                wherePublished('1')
                ->orderBy('created_at', 'DESC')
                ->paginate(Config::get('blog.posts_per_page'));
        }
        
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
     * Get a post by id or get a new one
     * 
     * @param int $id
     * @return Post
     */
    public static function getByIdOrCreate($id) {
        return static::getById($id) ?: new Post;
    }
    
    /**
     * Get a post by id
     * 
     * @param int $id
     * @return mixed Post | null
     */
    public static function getById($id) {
        return Post::whereId($id)->first();
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
    
    /**
     * Save Post and associated tags
     * 
     * @param int $id
     * @param array $inputs
     * @return bool
     */
    public static function save($id, array $inputs)
    {
        $post = static::getById($id);
        
        $inputs['published'] = is_null($inputs['published']) ? 0 : 1;
        $post->setTagsFromString(Input::get('hidden-tags'));
        unset( $inputs['hidden-tags'] );
        $post->fill($inputs);
        
        return $post->save();
    }
}

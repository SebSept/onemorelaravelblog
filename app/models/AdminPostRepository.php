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
class AdminPostRepository implements IPostRepository 
{

    /**
     * Get posts (paginated)
     * 
     * @return \Illuminate\Database\Eloquent\Collection Collection of Posts
     */
    public function getAll()
    {
        return Post::
                orderBy('created_at', 'DESC')
                ->paginate( Config::get('blog.posts_per_page_admin') );
    }
        
    /**
     * Get a post by id or get a new one
     * 
     * @param int $id
     * @return Post
     */
    public function getByIdOrCreate($id) {
        return $this->getById($id) ?: new Post;
    }
    
    /**
     * Get a post by id
     * 
     * @param int $id
     * @return mixed Post | null
     */
    public  function getById($id) {
        return Post::whereId($id)->first();
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
    public  function save($id, array $inputs)
    {
        $post = $this->getByIdOrCreate($id);
        
        $inputs['published'] = is_null($inputs['published']) ? 0 : 1;
        $post->setTagsFromString(Input::get('hidden-tags'));
        unset( $inputs['hidden-tags'] );
        $post->fill($inputs);
        
        return $post->save();
    }
}


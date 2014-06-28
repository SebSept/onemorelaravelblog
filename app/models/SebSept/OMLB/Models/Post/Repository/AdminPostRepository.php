<?php
/**
 * AdminPostRepository
 * 
 * Posts repository for backend
 * 
 * @author sebastienmonterisi@yahoo.fr
 * @package onemorelaravelblog
 */

namespace SebSept\OMLB\Models\Post\Repository;

use \SebSept\OMLB\Models\Post\Post;
use \SebSept\OMLB\Models\Tag\Tag;

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
            $post->id = $id ?: ((int)\DB::table((new Post())->getTable())->max('id')+1);
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
    public function save($id, array $inputs)
    {
        $post = $this->getByIdOrNew($id);
        $inputs['published'] = is_null($inputs['published']) ? 0 : 1;
        unset( $inputs['hidden-tags'] );
        $post->fill($inputs);
        if(!$this->validate($post)) {
            return false;
        }
        
        $this->setTagsFromString(\Input::get('hidden-tags'), $post);
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
    
    /**
     * Set Post tags from a commat separated list of tags
     * 
     * @return void
     * */
    public function setTagsFromString($tags_string, Post $post)
    {
        // create array from string, delimiter is ','. empty and non unique values removed 
        $input_tags_string_array = array_unique(array_filter(explode(',', $tags_string)));
        $search_query = \DB::table('tags')
                ->select('id', 'title')
                ->whereIn('title', $input_tags_string_array);

        // store existing tags ids => $found_tags_ids_array
        $tags_ids_array = $found_tags_ids_array = $search_query->lists('id');
        $found_tags_title_array = $search_query->lists('title');

        // create new tags
        $not_found_tags_title_array = array_diff($input_tags_string_array, $found_tags_title_array);
        foreach ($not_found_tags_title_array AS $tag)
        {
            $tags_ids_array[] = Tag::create(['title' => $tag])->id;
        }

        \Event::fire('post.saving.tags', ['original' => $post->tags->lists('id') , 'new' => $tags_ids_array]);
        
        // update pivot table
        return $post->tags()->sync($tags_ids_array);
    }
    
    /**
     * Validate 
     * 
     * @return bool
     */
    protected function validate(Post $post) {
        $validator = \Validator::make($post->getAttributes(), 
                [ 'slug' => 'required|unique:posts,slug,'.$post->id  ]);
        \Session::put('errors', $validator->errors());
        return $validator->passes();
    }
}

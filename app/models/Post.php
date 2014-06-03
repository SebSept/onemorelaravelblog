<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Post
 *
 * @author seb
 */
class Post extends \Eloquent
{

    /**
     * Properties that must not be mass-assigned
     * */
    protected $guarded = array('id');

    public static function boot()
    {
        parent::boot();

        // delete attached tags (in case foreign keys are not respected (needed for sqlite))
        self::deleting(function ($post) {
            return $post->tags()->detach() !== false;
        });
        
//        // fill created_at & updated_at on creation time
//        self::creating( function($post) {
//            return (bool) $post->created_at = $post->updated_at = \Carbon\Carbon::now();
//        });
    }

    /**
     * @return Collection collection of Tag objects
     */
    public function tags()
    {
        return $this->belongsToMany('Tag');
    }

    /**
     * @return Collection collection of Comment objects
     * */
    public function comments()
    {
        return $this->hasMany('Comment');
    }

    /**
     * Set Post tags from a commat separated list of tags
     * @return void
     * */
    public function setTagsFromString($tags_string)
    {
        // create array from string, delimiter is ','. empty and non unique values removed 
        $input_tags_string_array = array_unique(array_filter(explode(',', $tags_string)));
        $search_query = DB::table('tags')
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

        Event::fire('post.saving.tags', ['original' => $this->tags->lists('id') , 'new' => $tags_ids_array]);
        
        // updated pivot table
        return $this->tags()->sync($tags_ids_array);
    }

}

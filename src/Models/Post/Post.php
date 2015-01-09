<?php
/**
 * Blog Post
 * 
 * @author sebastienmonterisi@yahoo.fr
 * @package onemorelaravelblog
 */

namespace SebSept\OMLB\Models\Post;

/**
 * Post
 *
 */
class Post extends \SebSept\OMLB\Models\MyEloquent
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
    }

    /**
     * @return Collection collection of Tag objects
     */
    public function tags()
    {
        return $this->belongsToMany('\SebSept\OMLB\Models\Tag\Tag');
    }

    /**
     * @return Collection collection of Comment objects
     * */
    public function comments()
    {
        return $this->hasMany('\SebSept\OMLB\Models\Comment\Comment');
    }
    
}
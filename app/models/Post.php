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
class Post extends \Eloquent {

	/**
	* Properties that must not be mass-assigned
	**/
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
	public function tags() {
		return $this->belongsToMany('Tag');
	}

	/**
	* @return Collection collection of Comment objects
	**/
	public function comments() {
		return $this->hasMany('Comment');
	}
    
}

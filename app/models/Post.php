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

	public function tags() {
		return $this->belongsToMany('Tag');
	}

	public function comments() {
		return $this->hasMany('Comment');
	}
    
}

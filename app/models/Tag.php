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
class Tag extends \Eloquent {

	/**
	* Properties that must not be mass-assigned
	**/
	protected $guarded = array('id');

	/**
	* No created_at nor updated_at columns
	**/
	public $timestamps = false;
    
}

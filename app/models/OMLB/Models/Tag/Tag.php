<?php
/**
 * Tag for a Post
 * 
 * @licence MIT  http://choosealicense.com/licenses/mit/
 * @author sebastienmonterisi@yahoo.fr
 * @package onemorelaravelblog
 */

namespace OMLB\Models\Tag;

/**
 * Tag
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

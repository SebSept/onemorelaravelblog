<?php
/**
 * Comment for a Post
 * 
 * @licence MIT  http://choosealicense.com/licenses/mit/
 * @author sebastienmonterisi@yahoo.fr
 * @package onemorelaravelblog
 */

namespace OMLB\Models\Comment;

/**
 * Comment
 */
class Comment extends \Eloquent {

	/**
	* Properties that must not be mass-assigned
	**/
	protected $guarded = array('id', 'published', 'created_at', 'updated_at', 'post_id');

	/**
	* Comment approved
	*
	* set published to '1' and save Comment
	*
	* @return bool updated succeeded 
	**/
	public function approve() {
		$this->published = 1;
		if($this->update()) {
			Event::fire('comment.approved', [$this]);
			return true;
		};
		return false;
	}

	/**
	* Post this comments belongs to
	*
	* @return Post
	**/
	public function post()
	{
		return $this->belongsTo('Post');
	}
   
}

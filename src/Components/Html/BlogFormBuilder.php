<?php
/**
 * BlogFormBuilder
 *
 * Provides @tagsSelector to Blade
 * 
 * @author sebastienmonterisi@yahoo.fr
 * @package onemorelaravelblog
*/

namespace SebSept\OMLB\Components\Html;

use Illuminate\Html\FormBuilder;

/**
 * BlogFormBuilder
 * 
 */
class BlogFormBuilder extends FormBuilder {

	public function tagsSelector($attribute, $label) {
		$return = '';

		// tags line
		$return .= '<div class="form-group">';
		$return .= $this->label('tags', $label, ['class' => 'col-sm-2 control-label', 'for' => $attribute]);
		$return .= '<div class="col-sm-10">';
		$id = 'tm-input-'.$attribute;
		$return .= \Form::text($attribute, 'default', ['id' => $id, 'class' => 'tm-input-info']);
		$return .= '</div>';
		$return .= '</div>';

		$current_tags = json_encode( $this->model->tags->lists('title') );

		$return .= '<script type="text/javascript" >
			$(document).ready(
				function() 
				{ 
					jQuery("#'.$id.'").tagsManager(
						{
      						prefilled: '.$current_tags.'
    					}
					);
				} 
			);</script>';
		
		// tags chooser (all available tags selector)
		$available_tags = \SebSept\OMLB\Models\Tag\Tag::all()->lists('title');

		$return .= '<div class="form-group">';
		$return .= '<div class="col-sm-10 col-sm-offset-2">';
		$return .= '<ul id="available_tags">';
		foreach ($available_tags as $tag) {
			$return .= '<li class="tm-tag">'.$tag.'</li>';
		}
		$return .= '</ul>';
		$return .= '</div>';
		$return .= '</div>';

		$return .= '<script type="text/javascript">
			$("#available_tags li").on("click", function() 
			{
				jQuery("#'.$id.'").tagsManager("pushTag",$(this).text());
			});
		</script>';

		return $return;
	}
}
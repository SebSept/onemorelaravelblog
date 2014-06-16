<?php
/**
 * BlogHtmlServiceProvider
 *
 * Provides @tagsSelector to Blade
 * 
 * @author sebastienmonterisi@yahoo.fr
 * @package onemorelaravelblog
*/

namespace OMLB\Components\Html;

use Illuminate\Html\HtmlServiceProvider;

/**
 * BlogHtmlServiceProvider
 * 
 * Register form instance in $app
 * replace original FormBuilder by our BlogFormBuilder
 */
class BlogHtmlServiceProvider extends HtmlServiceProvider {

	/**
	 * Register the form builder instance.
	 *
	 * @return void
	 */
	protected function registerFormBuilder()
	{
		$this->app->bindShared('form', function($app)
		{
			$form = new BlogFormBuilder($app['html'], $app['url'], $app['session.store']->getToken());

			return $form->setSessionStore($app['session.store']);
		});
	}
        
}

<?php

/**
 * BlogHtmlServiceProvider
 *
 * Provides @tagsSelector to Blade
 * 
 * @author sebastienmonterisi@yahoo.fr
 * @package onemorelaravelblog
 */

namespace SebSept\OMLB\Components\Html;

use Illuminate\Support\ServiceProvider;

/**
 * BlogHtmlServiceProvider
 * 
 * Register form instance in $app
 * replace original FormBuilder by our BlogFormBuilder
 */
class BlogHtmlServiceProvider extends ServiceProvider
{

    /**
     * Register the form builder instance.
     *
     * @return void
     */
    public function register()
    {
        $this->registerForm();
        $this->extendBlade();
    }

    protected function registerForm()
    {
        $this->app->bindShared('form', function($app)
        {
            $form = new BlogFormBuilder(
                    $app['html'], $app['url'], $app['session.store']->getToken());

            return $form->setSessionStore($app['session.store']);
        });
    }

    public function extendBlade()
    {
        /**
         * Extends blade
         * - @tag($tag)
         */
        \Blade::extend(function($view, $compiler)
        {
            $pattern = $compiler->createMatcher('tag');

            return preg_replace($pattern, '$1<?php 
    	$_tag = $2;
    	echo link_to_route("post.index.bytag", $_tag->title, ["tag" => $_tag->title], ["class" => Config::get("blog.tag_class")]) ; ?>', $view);
        });
    }

}

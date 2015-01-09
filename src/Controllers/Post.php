<?php

/**
 * Post Controller
 * 
 * Main front controller
 * @package onemorelaravelblog
 */

namespace SebSept\OMLB\Controllers;

use \SebSept\OMLB\Models\Post\Factory As PostRepositoryFactory;
use \SebSept\OMLB\Models\Comment\Factory As CommentRepositoryFactory;

class Post extends BaseController
{

    /**
     * Display a listing of the posts.
     *
     * @return Response
     */
    public function index()
    {
        $posts = PostRepositoryFactory::make()->getAll();
        return \View::make(\Config::get('blog.theme') . '::post_index', compact('posts'))->render();
    }

    /**
     * Display a listing of the posts with specified tag
     *
     * @return Response
     */
    public function indexByTag($tag)
    {
        if ($posts = PostRepositoryFactory::make()->getByTagName($tag))
        {
            $list_title = \Lang::get('front.list.header.posts tagged', ['title' => $tag]);
            return \View::make(\Config::get('blog.theme') . '::post_index', compact('posts', 'list_title'))->render();
        }
        \app::abort(404);
    }

    /**
     * Display the specified posts.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($slug)
    {
        if ($post = PostRepositoryFactory::make()->getBySlug($slug))
        {
            return \View::make(\Config::get('blog.theme') . '::post', compact('post'))->render();
        }
        \app::abort(404);
    }

    /**
     * Posting a new comment
     * 
     * @param integer $post_id
     * @return Response
     */
    public function postComment($post_id)
    {
        $commentRepository = CommentRepositoryFactory::make();
        $success = $commentRepository->add(array_merge(['post_id' => $post_id], \Input::only(['title', 'author_name', 'author_site', 'content'])));
        if ($success)
        {
            return \Redirect::route('post.show', ['slug' => PostRepositoryFactory::make()->getById($post_id)->slug,
                        '#comment_submitted']);
        } else
        {
            return \Redirect::back()
                            ->with('error', 'front.comment.submission_failled')
                            ->withInput();
        }
    }

    /**
     * Show the form for creating a new posts.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created posts in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Show the form for editing the specified posts.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified posts in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified posts from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}

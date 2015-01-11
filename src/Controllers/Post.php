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
use Input,
    Redirect,
    View,
    Config;

/**
 * @todo implement 2/3 Controllers ?
 */
class Post extends BaseController
{
    use adminPosts;
    use adminComments;
    use front;
}

trait front {
    
    /**
     * Front methods
     */

    /**
     * Display a listing of the posts.
     *
     * @return Response
     */
    public function index()
    {
        $posts = PostRepositoryFactory::make()->getAll();
        return View::make('post_index', compact('posts'))->render();
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
            return View::make('post_index', compact('posts', 'list_title'))->render();
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
            return View::make('post', compact('post'))->render();
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
        $success = $commentRepository->add(array_merge(['post_id' => $post_id], Input::only(['title', 'author_name', 'author_site', 'content'])));
        if ($success)
        {
            return Redirect::route('post.show', ['slug' => PostRepositoryFactory::make()->getById($post_id)->slug,
                        '#comment_submitted']);
        } else
        {
            return Redirect::back()
                            ->with('error', 'front.comment.submission_failled')
                            ->withInput();
        }
    }

    /**
     * Remove the specified posts from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        if (PostRepositoryFactory::make()->getById($id)->delete())
        {
            return Redirect::back()->with('message', trans('admin.post.destroyed'));
        }
        return Redirect::back()->with('message', trans('admin.post.deletion_failled'));
    }

}

trait adminPosts
{

    /**
     * Dashboard / Admin home
     * 
     * @return Response
     */
    public function dashboard()
    {
        $posts = PostRepositoryFactory::make()->getAll('admin');
        $unpublished_comments_count = CommentRepositoryFactory::make()->count();
        return View::make('admin.dashboard', compact('posts', 'unpublished_comments_count'));
    }

    /**
     * Show the form for editing the specified posts.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id = null)
    {
        $post = PostRepositoryFactory::make()->getByIdOrNew($id);
        return View::make('admin.edit', compact('post'));
    }

    /**
     * Update the specified posts in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id = null)
    {
        $inputs = Input::only(['title', 'slug', 'teaser', 'content', 'published', 'hidden-tags']);
        if (PostRepositoryFactory::make()->save($id, $inputs))
        {
            return Redirect::route('admin.dashboard')->with('message', trans('admin.post.saved'));
        }
        return Redirect::back()->withInput()->withErrors(Session::get('errors'));
    }

    /**
     * Toggle pusblished value (1/0)
     * 
     * @param integer $id post id
     * @return Response
     */
    public function togglePublished($id)
    {
        $post = PostRepositoryFactory::make()->getById($id);
        $post->published = abs($post->published - 1);
        $post->save();
        return Redirect::back()->with('message', $post->published ? 'published' : 'unpublished');
    }

    /**
     * Preview a post
     * 
     * @param string $slug
     * @return Response
     */
    public function preview($slug)
    {
        $post = PostRepositoryFactory::make()->getBySlug($slug);
        if ($post)
        {
            return View::make('post', compact('post'));
        }
        app::abort(404);
    }

    public function flushCache()
    {
        BlogCacheManager::flush();
        return Redirect::back()->with('message', trans('admin.cache.flushed'));
    }

}

trait adminComments
{

    /**
     * Display a listing of unmoderated comments.
     * 
     * @return Response
     */
    public function indexUnmoderatedComments()
    {
        $unpublished_comments = CommentRepositoryFactory::make()->getUnmoderated();
        return View::make('admin.comment_moderate', compact('unpublished_comments'));
    }

    /**
     * Approve a comment
     * 
     * @param  integer  $comment_id
     * @return Response
     */
    public function approveComment($comment_id)
    {
        $comment = CommentRepositoryFactory::make()->getById($comment_id);
        if ($comment && $comment->approve())
        {
            return Redirect::back()->with('message', trans('admin.comment.approved'));
        }
        return Redirect::back()->with('error', trans('admin.comment.approved_failled'));
    }

    /**
     * Delete a comment
     * 
     * @param  interger $comment_id
     * @return Response
     */
    public function deleteComment($comment_id)
    {
        $comment = CommentRepositoryFactory::make()->getById($comment_id);
        if ($comment->delete())
        {
            return Redirect::back()->with('message', trans('admin.comment.destroyed'));
        }
    }

}

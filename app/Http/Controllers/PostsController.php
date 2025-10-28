<?php

namespace App\Http\Controllers;

use App\Common\Captcha;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\Post;

class PostsController extends Controller
{

    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        $post = Post::query();
        return view('pages.posts.index', ['posts' => $post->orderBy('created_at', 'desc')->paginate(10)]);
    }

    public function showPost(Post $post): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        Captcha::create();

        return view('pages.posts.post', ['post' => $post, 'comments' => $post->comments()->orderBy('created_at', 'desc')->paginate(5)]);
    }

    public function storeComment(CommentRequest $request, Post $post): \Illuminate\Http\RedirectResponse
    {

        $comment = new Comment($request->validated());
        $post->comments()->save($comment);

        return redirect(route('post', [$post->id]))->with('message', 'Comment added.');
    }

    public function form(Post $post): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        return view('posts.create', ['post' => $post]);
    }
}

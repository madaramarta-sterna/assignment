<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Comment;
use App\Models\Post;

class AdminPostsController extends Controller
{
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        $posts = Post::query()->orderBy('created_at', 'desc')->paginate(20);
        return view('admin.posts.index', ['posts' => $posts, 'emptyPost' => new Post()]);
    }

    public function form(?Post $post): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        return view('admin.posts.form', ['post' => $post, 'comments' => $post->comments()->orderBy('created_at', 'desc')->paginate(20)]);
    }

    public function store(PostRequest $request): \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
    {
        $post = Post::query();

        $this->createImageString($request);
        $post->updateOrCreate($request->only('id'), $request->only('title', 'content', 'post_image'));
        return redirect(route('admin.posts'))->with('message', 'Post created/updated successfully.');
    }

    public function deletePost(Post $post): \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
    {
        $post->delete();

        return redirect(route('admin.posts'))->with('message', 'Post successfully deleted');
    }

    public function deleteComment(Post $post, Comment $comment): \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
    {
        if($comment->post->id == $post->id) {
            $comment->delete();
            return redirect(route('admin.post.edit', [$post->id]))->with('message', 'Comment successfully deleted');
        }
        return redirect(route('admin.post.edit', [$post->id]))->with('message', 'Comment is not in this post');

    }

    private function createImageString(PostRequest &$request)
    {
        if($request->file('image')) {
            $image = $request->file('image');

            $request->merge(['post_image' => sprintf('data:%s;base64,%s', $image->getMimeType(), base64_encode(file_get_contents($image->getPathname())))]);
        }
    }
}

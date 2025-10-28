<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminPostsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;

Route::get('/', [PostsController::class, 'index'])->name('posts');
Route::get('/post/{post}', [PostsController::class, 'showPost'])->name('post');
Route::post('/post/{post}', [PostsController::class, 'storeComment'])->name('storeComment');

Route::get('/login', [AdminController::class, 'login'])->name('login');
Route::post('/login', [AdminController::class, 'login'])->name('loginAction');

Route::middleware(['auth'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
    Route::get('/posts', [AdminPostsController::class, 'index'])->name('posts');
    Route::get('/post/show/{post}', [AdminPostsController::class, 'showPost'])->name('post.view');
    Route::get('/post/form/{post?}', [AdminPostsController::class, 'form'])->name('post.edit');
    Route::post('/post/form/{post?}', [AdminPostsController::class, 'store'])->name('post.store');
    Route::get('/post/delete/{post}', [AdminPostsController::class, 'deletePost'])->name('post.delete');
    Route::get('/post/{post}/comment/delete/{comment}', [AdminPostsController::class, 'deleteComment'])->name('comment.delete');
});

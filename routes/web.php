<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('category', 'CategoryController', ['except' => [
    'create', 'update'
]]);
Route::resource('posts', 'PostController', ['except' => [
    'create', 'update'
]]);
Route::resource('comments', 'CommentController', ['except' => [
    'create', 'update'
]]);

Route::resource('like', 'LikeController', ['except' => [
    'create', 'update', 'index', 'show', 'edit', 'destroy'
]]);
Route::resource('upvote', 'UpvoteController', ['except' => [
    'create', 'update', 'index', 'show', 'edit', 'destroy'
]]);
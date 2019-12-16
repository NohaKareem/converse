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
    return view('users');
});

Auth::routes();

Route::get('/index', 'UserController@index')->name('index');
Route::get('/home', 'HomeController@index')->name('home');

//~
Route::get('/users', 'UserController@index'); // show all users
Route::get('/users/{user}', 'UserController@show'); // show user profile

// Posts
Route::get('posts', 'PostController@index'); // show post for a user
Route::get('/posts/{post}', 'PostController@show'); // show post for a user
Route::post("/posts", "PostController@store")->name("post.create"); // make post 
Route::delete("/posts/{post}", "PostController@destroy");
Route::get("/post_form", function () {
    return view("post_form");
});

// Comments   
Route::post('/comments', "CommentController@store")->name("comment.create"); // make comment
Route::delete('/comments/{comment}', "CommentController@destroy"); // delete comment
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
    return view('auth.login');
});

Auth::routes();

Route::get('/index', 'UserController@index')->name('index');
// Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

//~
Route::get('/users', 'UserController@index'); // show all users (friends list~)
Route::get('/users/{user}', 'UserController@show'); // show user profile

// Route::get('/users/{user}/posts', 'PostController@index'); // show all posts for a user
// Route::get('/users/{user}/posts/{post}', 'PostController@show'); // show post for a user

// if (Auth::check()) {
    Route::get('posts', 'PostController@index'); // show post for a user
    Route::get('/posts/{post}', 'PostController@show'); // show post for a user
    Route::post("/posts", "PostController@store")->name("post.create"); // make post 
    
    // edit + destroy
    Route::get("/posts/{post}/edit", "PostController@edit"); 
    Route::patch("/posts/{post}", "PostController@update");
    Route::delete("/posts/{post}", "PostController@destroy");
    
    
    Route::get("/post_form", function () {
        return view("post_form");
    });
// } else {
    // Route::get('/home', 'HomeController@index')->name('home');
// }

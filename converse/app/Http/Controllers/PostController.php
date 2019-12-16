<?php

namespace App\Http\Controllers;
use App\Post;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage; 

class PostController extends Controller {
    
    /**  
     * Restrict access to entire controller to logged in users only
     * */ 
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of posts.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('posts');
    }

    /**
     * Store a newly created post record in storage.
     * required, as checked by the Validator facade.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $validator =  Validator::make($request->all(), [
            'title' => 'required|max:255', 
            'text' => 'required', 
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:3000' // image max limit 3MB
            // 'user_id' => 'required'  // not provided by user
          ]);

        // stay in post form to show errors if any
        if ($validator->fails()) {  
            return redirect('/post_form')->withInput()->withErrors($validator);
        }

        // check if image is provided, since it's optional
        $image = $request->image;
        $imageName = $image != null ? Storage::putFile('public', $image) : ""; 

        Post::Create([
            'title' => $request->input('title'),
            'text' => $request->input('text'),
            'image' => $imageName,
            'user_id' => auth()->id()
        ]);
        
        return redirect('/posts');
    }

    /**
     * Display the specified post.
     * ~Post sent to view as an array of posts, to utilize the same blade file used for search results, for more DRY code.
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post) {
        return view('post', ['posts' => [$post]]);
    }

    /**
     * Remove the specified post from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post) {
        // ~check current user is authorized to delete
        if (auth()->id == $post.user_id) {
            // redirect to main page
            $post->delete();
            return redirect('/posts');
        }
    }
}

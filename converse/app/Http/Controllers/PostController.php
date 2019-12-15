<?php

namespace App\Http\Controllers;
use App\Post;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage; 

class PostController extends Controller {
    
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

}

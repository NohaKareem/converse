<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller {
    /** 
     * Search posts
     * @return Illuminate\Http\Response
     */
    public function index() {
        // albeit not ideal, id is returned as a response to have links to view each post separately
        $posts = Post::all()->map->only(['title', 'imageUri', 'id']); // return all
        return response()->json($posts, 200); 
    }

    public function find(Request $request) {
        // $posts = Post::where('title', $request->searchStr)->get();
        $posts = Post::where('text', 'LIKE', "%{$request->searchStr}%")->get();
        return response()->json($posts, 200); 
    }

    
}

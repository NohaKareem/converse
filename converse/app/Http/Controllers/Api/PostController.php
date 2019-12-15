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
        $posts = Post::all()->map->only(['title', 'imageUri']);
        return response()->json($posts, 200); 
    }
}

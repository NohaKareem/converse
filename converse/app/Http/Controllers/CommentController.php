<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Comment;

class CommentController extends Controller {

    
    /**
     * Store a newly created comment record in storage.
     * Required fields are as checked by the Validator facade.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $validator =  Validator::make($request->all(), [
            'commentText' => 'required|max:255' 
          ]);
        // stay in page to show errors if any
        if ($validator->fails()) {  
            return redirect('/')->withInput()->withErrors($validator);
        }
        dump($request->input('post_id'));
        Comment::Create([
            'commentText' => $request->input('commentText'),
            'user_id' => auth()->id(), 
            'post_id' => $request->input('post_id')
        ]);
        
        return redirect('/posts');
    }

    /**
     * Remove the specified comment from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment) {
        // check current user is authorized to delete
        if (auth()->id() == $comment->user_id) {
            // redirect to main page
            $comment->delete();
           return redirect('/posts');
    }
    }
}

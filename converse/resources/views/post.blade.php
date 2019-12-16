@extends('layouts.app')

@section('content')
    <!-- Display all posts -->
    <div id="container"> 
        <div class="postCon">
            @foreach($posts as $post)
                <div class="post">
                    <!-- <img class="postImg" src="{{ $post->image }}"> -->
                    <!-- <div class="postImg" style="background:url(' {{ $post->image }} + ')"></div> -->
                    <h1 class="postTitle">{{ $post->title }} </h1>
                    <p class="postText">{{ $post->text }} </p>
                    <p class="postAuthor">Author:  <a href="/users/{{$post->user_id}}"> {{ App\User::find($post->user_id)->first_name }} {{ App\User::find($post->user_id)->last_name }}</a> </p>

                    @if(auth()->id() == $post->user_id)
                        <form action="/posts/{{ $post->id }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-outline-danger btn-sm" type="submit">delete post</button>
                        </form>
                    @endif
                    
                    <div class="commentSection">
                        <h2>Comments</h2>
                        <!-- display post comments -->
                        @foreach($post->comments as $comment) 
                            <p class="commentText">{{ $comment->commentText }} </p>
                            <p class="commentAuthor">By <a href="/users/{{$comment->user_id}}"> {{ App\User::find($comment->user_id)->first_name }} {{ App\User::find($comment->user_id)->last_name }} </a> </p>
                            
                            @if(auth()->id() == $comment->user_id)
                                <form action="/comments/{{ $comment->id }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-outline-danger btn-sm inlineButton" type="submit">delete comment</button>
                                </form>
                            @endif
                        @endforeach

                        <h3>Add comment</h3>
                        <form action="/comments" method="POST">
                            @csrf
                            <label for="commentText" class="control-label sr-only">Post comment</label>
                            <textarea rows="3" name="commentText" id="commentText" class="form-control" placeholder="comment"></textarea>  
                            
                            <!-- pass post id -->
                            <input name="post_id" id="post_id" class="form-control hidden" type="text" placeholder="post id" value="{{$post->id}}">
                            <button class="btn btn-outline-success btn-sm actionButton" type="submit">post comment</button>
                        </form>
                    </div>
            </div>
            @endforeach
        </div>  
        <form action="/post_form" method="GET" id="addPost" class="col-md-2">
            <button type="submit" class="btn btn-outline-primary btn-block">
                New Post
            </button>
        </form>
    </div>
@endsection
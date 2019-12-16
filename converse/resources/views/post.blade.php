@extends('layouts.app')

@section('content')
    <!-- Display all posts -->
    <div id="container"> 
        <div class="postsCon">
            @foreach($posts as $post)
                <div class="post">
                    <!-- <img class="postImg" src="{{ $post->image }}"> -->
                    <h1 class="postTitle">{{ $post->title }} </h1>
                    <p class="postText">{{ $post->text }} </p>

                    <form action="/posts/{{ $post->id }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-outline-danger btn-sm" type="submit">delete</button>
                    </form>
            
                <form action="/comments" method="POST">
                    @csrf
                    <label for="comment" class="control-label sr-only">Post comment</label>
                    <textarea rows="10" name="comment" id="commentBox" class="form-control" placeholder="comment"></textarea>  

                    <button class="btn btn-outline-success btn-sm actionButton" type="submit">post comment</button>
                </form>
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
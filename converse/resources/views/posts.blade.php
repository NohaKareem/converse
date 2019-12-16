@extends('layouts.app')

@section('content')
    <p id="searchPostsCon"></p>

    <!-- Display all posts -->
    <div id="container"> 
        <div class="postsCon">
            @foreach(App\Post::all() as $post)
                <div class="post">
                    <!-- <img class="postImg" src="{{ $post->image }}"> -->
                    <a href="/posts/{{ $post->id }}"><h1 class="postTitle">{{ $post->title }} </h1></a>
                    <p class="postText">{{ $post->text }} </p>
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
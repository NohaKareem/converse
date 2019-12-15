@extends('layouts.app')

@section('content')
    <form action="/post_form" method="GET" id="addPost" class="col-md-2 offset-md-7">
        <button type="submit" class="btn btn-outline-primary">
            +
        </button>
    </form>
    
    <!-- Display all posts -->
    <div id="container"> 
        <div id="postsCon">
            @foreach(App\Post::all() as $post) 
                <div class="post">
                    <img class="postImg" src="{{ $post->image }}">
                    <h1 class="postTitle">{{ $post->title }} </h1>
                    <p class="postText">{{ $post->text }} </p>
                </div>
            @endforeach
        </div>

        <p id="searchPostsCon">
            Hello
        </p>
    </div>
@endsection
@extends('layouts.app')

@section('content')
    <form action="/post_form" method="GET" id="addPost" class="col-md-2 offset-md-7">
        <button type="submit" class="btn btn-outline-primary">
            +
        </button>
    </form>
    
    <p id="searchPostsCon"></p>

    <!-- Display all posts -->
    <div id="container"> 
        <div id="postsCon">
            <!-- @foreach(App\Post::all() as $post) -->
                <div class="post" style="background:url({{ $post->image }})">
                    <!-- <img class="postImg" src="{{ $post->image }}"> -->
                    <h1 class="postTitle">{{ $post->title }} </h1>
                    <p class="postText">{{ $post->text }} </p>
                </div>
            <!-- @endforeach -->
        </div>  
    </div>
@endsection
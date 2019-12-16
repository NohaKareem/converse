@extends('layouts.app')

@section('content')
    <p id="searchPostsCon"></p>

    <!-- Display all posts using axios-->
    <div id="container"> 
        <form action="/post_form" method="GET" id="addPost" class="col-md-2">
            <button type="submit" class="btn btn-outline-primary btn-block">
                New Post
            </button>
        </form>
    </div>
@endsection
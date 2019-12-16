@extends('layouts.app')

@section('content')
    
    <!-- display errors if any -->
    <div class="card-body">
        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Something's missing!</strong>
                <br/>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>
                            {{ $error }}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    <!-- redirect to posts page after submitting form (adding new post) -->
    <form action="/posts" method="POST" action="{{ route('post.create') }}" enctype="multipart/form-data">
        @csrf
        <div class="container">
            <div class="form-group inputForm">
                <label for="title" class="control-label sr-only">Post Title</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Post title">
                
                <label for="text" class="control-label sr-only">Post text</label>
                <textarea rows="10" name="text" id="text" class="form-control textRow" placeholder="text"></textarea>                    
                
                <label for="image" class="control-label sr-only">Image</label>
                <input type="file" name="image" id="image" class="form-control" placeholder="image">
            </div>
            
            <div class="form-group buttonCon">
                <button type="submit" class="btn btn-outline-primary btn-blocks">
                   Add Post
                </button>
            </div>
       </div>
    </form>
@endsection
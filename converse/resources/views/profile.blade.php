@extends('layouts.app')

@section('content')
    <div class="container">
           <div class="profileCon">
                <div class="profileImageAndMenu">
                </div>
                <div class="profileInfo">
                    <p class="userName">{{ $user->first_name.' '.$user->last_name }}</p>
                    <p>{{ $user->email }}</p>

                    <h2>{{ $user->first_name.' '.$user->last_name  }}'s posts</h2>
                    @foreach($user->posts as $post) 
                        <p class="postLink"><a href="/posts/{{$post->id}}"> {{ App\Post::find($post->id)->title }} </a> </p>
                        @if(auth()->id() == $user->id)
                            <form action="/posts/{{ $post->id }}" method="POST">
                                @method('DELETE')
                                @csrf
                            <button class="btn btn-outline-danger btn-sm inlineButton" type="submit">delete post</button>
                            </form>
                        @endif
                   
                    @endforeach
                </div>
           </div>
    </div>
@endsection
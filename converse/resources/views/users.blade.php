@extends('layouts.app')

@section('content')
    <!-- Display each user's data -->
    <div id="container"> 
            @foreach(App\User::all() as $user) 
                <div class="col-md-3 userCon"> 
                    <div class="userInfo">
                        <p class="userName">{{ $user->first_name.' '.$user->last_name }} </p>
                        <p>{{ $user->email }} </p>
                        <form action="/users/{{$user->id}}" method="GET">
                            @csrf
                            <button class="btn btn-outline-primary btn-sm usersViewButton" type="submit">view</button>
                        </form>
                    </div>
                </div>
            @endforeach

            <form action="/posts" method="GET" class="col-md-2">
                <button type="submit" class="btn btn-outline-primary btn-block">
                    View All Posts
                </button>
          </form>
        </div>
@endsection
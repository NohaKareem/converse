@extends('layouts.app')

@section('content')
    <!-- Display each user's data -->
    <div id="container"> 
            @foreach(App\User::all() as $user) 
                <div class="col-md-3 userCon"> 
                    <!-- ~ -->
                    <!-- <img src="{{ asset('images/'.$user->avatar_name.'-th.png') }}" alt="{{$user->first_name.' '.$user->last_name.'\'s thumbnail'}}"> -->
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
        </div>
@endsection
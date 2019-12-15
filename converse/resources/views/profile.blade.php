@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- display all users with given search results ~(or one user sent as an array from UserControler@show) -->
        <!-- @foreach($users as $user)  -->
           <div class="profileCon">
                <div class="profileImageAndMenu">
                    <!-- <img src="{{ asset('images/'.$user->avatar_name.'.png') }}" alt="{{$user->first_name.' '.$user->last_name.'\'s thumbnail'}}"> -->
                </div>
                    
                <div class="profileInfo">
                    <p class="userName">{{ $user->first_name.' '.$user->last_name }}</p>
                    <p>{{ $user->email }}</p>
                </div>
           </div>
        <!-- @endforeach -->
    </div>
@endsection
@extends('layouts.app')

@section('content')
    <div class="container">
           <div class="profileCon">
                <div class="profileImageAndMenu">
                </div>
                <div class="profileInfo">
                    <p class="userName">{{ $user->first_name.' '.$user->last_name }}</p>
                    <p>{{ $user->email }}</p>
                </div>
           </div>
    </div>
@endsection
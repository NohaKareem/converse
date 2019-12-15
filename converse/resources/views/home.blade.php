@extends('layouts.app')
@extends('layouts.header')

@section('content')
<div class="container">
    
    <!-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in {{Auth::user()->first_name}} {{Auth::user()->last_name}} !
                </div>
            </div>
        </div>
    </div> -->
    <div id="feedView">
        <div id="messageView">
            messageView
            <form action="" id="searchCon">
                @csrf
                <input id="search" type="text" name="search" placeholder="Search messages" autofocus>
            </form>
        </div>

        <div id="friendsView">
            friendsView
        </div>
    </div>
</div>

@endsection

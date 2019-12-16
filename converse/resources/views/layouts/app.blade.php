<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Converse') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/reset.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Converse') }}
                </a>

                <!-- search feature -->
                <!-- bootstrap navbar search styling https://getbootstrap.com/docs/4.0/components/navbar/ -->
                <div class="nav justify-content-end">
                    <form action="/api/get-posts" method="POST">
                        @csrf
                        <li id="searchInNav">
                            <div class="form-inline">
                                <label for="search" class="control-label sr-only"></label>
                                <input type="text" name="search" id="navSearchBar" class="form-control mr-sm-2" placeholder="Search for post topic" onkeyup="liveSearch(event);">
                            </div>
                        </li>
                    </form>
                </div>
                
                <div class="navLinks"><a href="/posts"> Posts </a></div>
                <div class="navLinks"><a href="/users"> Users </a></div>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}  <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    
    <script>
    
    // live search using fetch API
    function liveSearch(e){
        var searchStr = e.currentTarget.value;
        fetch('/api/get-posts/?searchStr=' + searchStr)
			.then(function(response){
				return response.json();
			})
			.then(function(searchResults){
                const postsCon = document.querySelector('#searchPostsCon');
                postsCon.innerHTML = ''; 
                
                for(let i = 0; i < searchResults.length; i++) {
                    const postItem  = 
                    '<a href="/posts/' + searchResults[i]['id'] + '">' +
                        '<div>' + 
                            '<div class="searchResultImage" style="background:url(' + searchResults[i]['imageUri'] + ')"></div>' +
                                '<p>' + searchResults[i]['title'] + '</p>' +
                        '</div>' + 
                    '</a>';
                    postsCon.innerHTML += postItem;
                }
			})
		.catch(function(err){
			console.log(err);
		});
    }
    </script>

</body>
</html>

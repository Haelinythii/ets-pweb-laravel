<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Beware! Tasks') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
    .navbar-custom{
        background-color: #6B7D99;
    }

    #logotextnavbar{
        color: white;
    }

    #logoimgnavbar{
        background-color: white;
        border-radius: 200px;
        height: 40px;
        width: 40px;
    }

    #logoimgnavbar:hover{
        background-color:#fff568;
        border-radius: 200px;
        height: 40px;
        width: 40px;
    }

    #linknavbar{
        color: white;
    }

    #linknavbar:hover{
        color: #fff568;
    }

    .card-header{
        background-color: #fff568;
        border-bottom: 0px;
        font-weight: bold;
    }

    .card{
        border: 0px;
        background-color: #acc3e8;
    }

    #btnsubmit{
        background-color: #6B7D99;
        border-color: #6B7D99;
    }

    #btnsubmit:hover, #btnview:hover, #btndel:hover, #btnarch:hover{
        color: #fff568;
    }

    #tasktitle{
        font-weight: bold;
        color: #ff8559;
    }

    #btnview {
        background-color: #ff8559 ;
        border: 0px;
    }

    #headtable{
        background-color: #ff8559 ;
        border-radius: 10px;
        
    }

    #bodytable{
        background-color: white;
    }

    #btndrop:hover{
        background-color: #ff8559 ;
        color: #fff568;
    }
    

   

    #taglist{
        color: #6B7D99;
        width: 200px;
        height: 33px;
    }

    #avtaglist{
        background-color: #acc3e8 ;
        margin-top: 45px;
        padding:0px;
    }
    
   


    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm navbar-custom">
            <div class="container">
                <a class="navbar-brand d-flex" href="{{ url('/') }}">
                    <div id="logoimgnavbar"><img src="images/Logo.png" style="height: 40px; " class="pr-3"></div>
                    <div class="pl-3 pt-1" id="logotextnavbar">Beware Tasks</div>
                </a>
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
                            <li class="nav-item" >
                                <a id="linknavbar" class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item" >
                                    <a id="linknavbar" class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="linknavbar" id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div  class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a  class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>

                                    <a href="{{ route('edit_Profile') }}" class="dropdown-item">
                                        Edit Profile
                                    </a>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4" >
            @yield('content')
        </main>
    </div>
</body>
</html>

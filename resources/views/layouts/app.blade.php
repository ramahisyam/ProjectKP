<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/super.css') }}" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{ asset('/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>
<body>
    <div>
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
                <div class="container">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <a class="navbar-brand" href="{{ url('/') }}">
                        RWS
                    </a>
    
                    <div class="" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
    
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ms-auto">
                            <!-- Authentication Links -->
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif
                                @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                            @else
                                {{-- Notification --}}
                                @can('backroom')
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            <ion-icon name="notifications-outline"></ion-icon>
                                            @if (auth()->user()->unreadNotifications->count())
                                                <span class="badge rounded-pill bg-danger">{{ auth()->user()->unreadNotifications->count() }}</span>
                                            @endif
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item text-success" href="{{ route('markAllAsRead') }}">Mark all as Read</a>
                                            <hr style="margin: 0%;">
                                            @foreach (auth()->user()->unreadNotifications as $notification)
                                                <a class="dropdown-item bg-warning bg-opacity-25" href="{{ route('markAsRead', $notification->id) }}">
                                                    Terdapat Task baru dari <br>
                                                    <span class="text-primary">{{ $notification->data['name'] }}</span><br>
                                                    dengan business key : <span class="text-primary">{{ $notification->data['businessKey'] }}</span>
                                                </a>
                                                <hr style="margin: 0%;">
                                            @endforeach
                                            
                                            @foreach (auth()->user()->readNotifications as $notification)
                                                {{-- <a class="dropdown-item" href="{{ url('/backroom/task?search=' . $notification->data['businessKey']) }}"> --}}
                                                <a class="dropdown-item" href="{{ url('/backroom/task?search=' . $notification->data['businessKey']) }}">
                                                    Terdapat Task baru dari <br>
                                                    <span class="text-primary">{{ $notification->data['name'] }}</span><br>
                                                    dengan business key : <span class="text-primary">{{ $notification->data['businessKey'] }}</span>
                                                </a>
                                                <hr style="margin: 0%;">
                                            @endforeach
                                        </div>
                                    </li>
                                @endcan
                                
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <ion-icon name="person-circle-outline"></ion-icon>
                                        {{ Auth::user()->name }}
                                    </a>
    
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        @if (!Auth::user()->hasRole('superAdmin'))
                                            <a class="dropdown-item" href="{{ route('user.settings.edit') }}">
                                                Edit Profile
                                            </a>
                                            <a class="dropdown-item" href="{{ route('user.settings.changePassword') }}">
                                                Ubah password
                                            </a>
                                        @endif
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }} <ion-icon name="log-out-outline"></ion-icon>
                                        </a>
    
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <main style="margin-top: 58px" class="py-4">
            @include('layouts.partials._alerts')
            @yield('content')
        </main>
    
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>
    <script>
        var clipboard = new ClipboardJS('.btn');
  
        clipboard.on('success', function (e) {
          console.log(e);
        });
  
        clipboard.on('error', function (e) {
          console.log(e);
        });
    </script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
    <script>
        $(document).ready(function(){
	        $('[data-toggle="popover"]').popover({
                //trigger: 'focus',
		        //trigger: 'hover',
                html: true,
                content: function () {
				return '<img class="img-fluid" src="'+$(this).data('img') + '" />';
                },
                //title: 'Toolbox'
            }) 
        });
    </script>
</body>
</html>

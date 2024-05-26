<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Cathering Online</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/v4-shims.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>
    <link href="{{ asset(elixir('css/app.css')) }}" rel="stylesheet">

    <style>
        body {
            font-family: 'Lato';
        }
        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-inverse navbar-static-top">
        <div class="container">
            <div class="navbar-header navbar-right">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    Cathering Online
                <i class="fas fa-btn fa-store animated infinite flip delay-5s slower"></i>
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-left">
                    @if(Auth::check())
                    <li><a href="{{ url('/') }}"><i class="fas fa-btn fa-store-alt animated infinite pulse delay-5s"></i>Home</a></li>
                    @can('admin-access')
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <i class="fas fa-btn fa-tasks animated infinite pulse delay-5s"></i>
                            Manage <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ route('categories.index')}}"><i class="fa fa-btn fa-tags"></i>Categories</a></li>
                            <li><a href="{{ route('products.index')}}"><i class="fas fa-btn fa-utensils"></i>Menu</a></li>
                            <li><a href="{{ route('orders.index') }}"><i class="fas fa-btn fa-clipboard-list"></i>Orders</a></li>
                        </ul>
                    </li>
                        @endcan
                    @endif
                </ul>

                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}"><i class="fa fa-btn fa-user animated infinite pulse delay-5s"></i>Masuk</a></li>
                        <li><a href="{{ url('/register') }}"><i class="fa fa-btn fa-users animated infinite pulse delay-5s"></i>Daftar</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <i class="fas fa-btn fa-user-circle animated infinite pulse delay-5s"></i>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                @if(Auth::check())
                                @can('admin-access')
                                <li><a href="{{url('profile/edit') }}"><i class="fa fa-btn fa-user-md"></i>Profile</a></li>
                                @endcan
                                @endif
                                <li><a href="{{ url('/logout') }}"><i class="fas fa-btn fa-sign-out-alt"></i>Keluar</a></li>
                            </ul>
                        </li>
                        @include('layouts._customer-feature', ['partial_view'=>'layouts._cart-menu-bar'])
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @if(session()->has('flash_notification.message'))
        <div class="container">
            <div class="alert alert-{{session()->get('flash_notification.level')}}">
                <button type="button" class="close" data-dismis="alert" aria-hidden="true">&times;</button>
                {{session()->get('flash_notification.message')}}
            </div>
        </div>
    @endif

    @yield('content')
    <script src="{{ asset(elixir('js/all.js')) }}"></script>

    @if(Session::has('flash_product_name'))
        @include('catalogs._product-added', ['product_name'=> 'flash_product_name'])
    @endif

</body>
</html>

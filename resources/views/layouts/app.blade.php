<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Course Recommender') }}</title>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}" >
        <!-- Icon -->
        <link rel="stylesheet" href="{{asset('assets/fonts/line-icons.css')}}">
    
        <!-- Animate -->
        <link rel="stylesheet" href="{{asset('assets/css/animate.css')}}">
        <!-- Main Style -->
        <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
        <!-- Responsive Style -->
        <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">



    </head>
    <body>

        
        <!-- Header Area wrapper Starts -->
        <header id="header-wrap">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand-md bg-inverse fixed-top scrolling-navbar" id="nav-white">
                <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a href="{{ url('/') }}" class="navbar-brand"><img src="assets/img/logo1.png" alt=""></a>       
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="lni-menu"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav mr-auto w-100 justify-content-start clearfix">
                        @yield('links')
                    
                    </ul>
                </div>

                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav mr-auto w-100 justify-content-end clearfix">
                        @yield('auth-links')
                        
                    </ul>
                </div>
                </div>
            </nav>
            <!-- Navbar End -->

            <!-- Hero Area Start -->
            <div id="hero-area" class="hero-area-bg">
                <div class="container">      
                    <div class="row">
                        @yield('hero-area')
                        
                    </div> 
                </div> 
            </div>
            <!-- Hero Area End -->

        </header>
        <!-- Header Area wrapper End -->

        @yield('body')
        
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="{{asset('assets/js/jquery-min.js')}}"></script>
        <script src="{{asset('assets/js/popper.min.js')}}"></script>
        <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/js/wow.js')}}"></script>
        <script src="{{asset('assets/js/jquery.nav.js')}}"></script>
        <script src="{{asset('assets/js/scrolling-nav.js')}}"></script>
        <script src="{{asset('assets/js/jquery.easing.min.js')}}"></script>  
        <script src="{{asset('assets/js/main.js')}}"></script>
        
  </body>
</html>


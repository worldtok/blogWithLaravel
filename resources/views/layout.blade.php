<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Building a Bloq</title>

        <!-- Fonts --
         <link href="{{ asset('css/app.css') }}" rel="stylesheet">-->
       <link  rel="stylesheet" href="{{ asset('css/bootstrap.css') }}"/>
        <!-- Styles -->

    </head>
    <body>
            <div class="content">
                <div class="title m-b-md">

            </div>
        </div>


        <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="class main">
            <div class="panel panel-default">
            @yield('header')

            </div>
            </div>
<div class="main">
        @yield('content')
</div>

        @yield('footer')
    </body>
</html>

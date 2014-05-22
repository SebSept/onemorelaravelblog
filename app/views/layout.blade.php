<!DOCTYPE html>
<html lang="{{ Config::get('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ Config::get('blog.title') }}</title>

        <!-- Bootstrap -->
        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('css/mine.css')}}" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div id="header-wrapper">
            <header class="container">
                <h1>{{ link_to_route('home', Config::get('blog.title')) }}</h1>
            </header>
        </div>

        @if(Session::has('message'))
        <div id="message-wrapper">
            <div class="container bg-success message">
                {{ Session::get('message') }}
            </div>
        </div>
        @endif
        
        <div id="main-wrapper">
            @yield('content')
        </div>

        <div id="footer-wrapper">
        @section('layout.footer')
            <footer class="container">
                    <p>Powered by OneMoreLaravelBlog</p>
            </footer>
        @stop
        @includesafe('override.layout.footer')
        @yield('layout.footer')
        </div>
        
        
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <!-- <script src="js/bootstrap.min.js"></script> -->
    </body>
</html>
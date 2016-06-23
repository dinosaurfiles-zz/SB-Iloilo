<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Santa Barbara Project Page - @yield('title')</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{!! URL::asset('css/bootstrap.min.css') !!}">
    <link rel="stylesheet" href="{!! URL::asset('css/project.css') !!}">
    <link rel="stylesheet" href="{!! URL::asset('fonts/font-awesome.min.css') !!}">
    {{-- <link rel="stylesheet" href="{!! URL::asset('css/bootstrap-theme.min.css') !!}"> --}}
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/home') }}">
                    Santa Barbara Project DB
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if(Auth::user())

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Project<span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ action('ProjectsController@index') }}"><i class="fa fa-btn fa-home"></i>Project Home</a></li>
                            <li><a href="{{ action('ProjectsController@create') }}"><i class="fa fa-btn fa-plus"></i>New Project</a></li>
                        </ul>
                    </li>
                    <li>
                        {!! Form::open(array('action' => array('ProjectsController@search'), 'method' => 'POST', 'class' => 'navbar-form', 'role' => 'search')) !!}
                            <div class="input-group">
                                {!! Form::text('search', null ,array('class' => 'form-control', 'placeholder' => 'Search For..')) !!}
                                <span class="input-group-btn">
                                    {!! Form::submit('Search!', array('class' => 'btn btn-default')) !!}
                                </span>
                            </div><!-- /input-group -->
                        {!! Form::close() !!}
                    </li>
                    @endif

                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->username }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <div class="container-fluid" style="margin-top: 80px; padding: 0px !important; display: flex; background-color: #444B55; height: 250px; text-align: center; color: white">
            <div class="col-md-4">
                <h3>Brought to you by: <a href="https://github.com/dinosaurfiles">dinosaurfiles</a></h3>
                <br>
                <h4>We need help in designing the website! Follow the project <span class="fa fa-arrow-down"></span></h4>
                <a href="https://github.com/dinosaurfiles/SB-Iloilo"><h1><span class="fa fa-github"></span> SB-Iloilo Project</h1></a>
            </div>
            <div class="col-md-4">
                <h4>Contact us through our official media links!</h4>
                <a href=""><h3><span class="fa fa-facebook-square"></span> Santa Barbara Iloilo</h3></a>
                <a href=""><h3><span class="fa fa-youtube-square"></span> ExploreSantaBarbara</h3></a>
                <a href=""><h3><span class="fa fa-twitter-square"></span> @sb-iloilo</h3></a>
            </div>
            <div class="col-md-4">
                <iframe
                    width="400"
                    height="240"
                    frameborder="0" style="border:0"
                    src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDkm875PwOcQaP4My0LtHjqDVSGS904MTU
                    &q=Santa+Barbara+Municipal+Hall" allowfullscreen>
                </iframe>
            </div>
        </footer>

    </div>
    <!-- JavaScripts -->
    <script type="text/javascript" src="{!! URL::asset('js/jquery-2.2.4.min.js') !!}"></script>
    <script type="text/javascript" src="{!! URL::asset('js/bootstrap.min.js') !!}"></script>

    @yield('scripts')
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>

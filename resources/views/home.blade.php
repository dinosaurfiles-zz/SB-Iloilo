@extends('layouts.app')

@section('content')
<div class="container-fluid container-fluid-home">
    <div class="center-div home-center-div">
        <h1>Santa Barbara Project Database</h1>
        <img src="../images/logo.png">
        <h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua.
        <br>Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat.
        <br>Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur.
        <br>Excepteur sint occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</h4>


        <a href="/project" class="btn btn-default btn-lg home-center-down-button">View Projects</a>
        <h1><span class="fa fa-arrow-down"></span></h1>

    </div>
</div>

<div class="container" style="margin-top: 60px">
    <div class="col-md-4">
        <div class="card">
            <img class="card-img-top img-responsive" src="{!! URL::asset('images/projects/project-1.jpeg') !!}">
            <div class="card-block">
                <h4 class="card-title">Cafe De Santa Barbara & Shopping Spree</h4>
                <p class="card-text"><small class="text-muted">January 20, 2013</small></p>
            </div>
        </div> 
    </div>
    <div class="col-md-4">
        <div class="card">
            <img class="card-img-top img-responsive" src="{!! URL::asset('images/projects/project-2.jpeg') !!}">
            <div class="card-block">
                <h4 class="card-title">Hexo Coworking Space, located besides Blue Fields Supermarket</h4>
                <p class="card-text"><small class="text-muted">January 20, 2013</small></p>
            </div>
        </div> 
    </div>
    <div class="col-md-4">
        <div class="card">
            <img class="card-img-top img-responsive" src="{!! URL::asset('images/projects/project-3.jpeg') !!}">
            <div class="card-block">
                <h4 class="card-title">Santa Barbara Cyber Center Extreme</h4>
                <p class="card-text"><small class="text-muted">January 20, 2013</small></p>
            </div>
        </div> 
    </div>
</div>

<div class="container-fluid" style="margin-top: 80px; padding: 0px !important; display: flex; background-color: #444B55; height: 250px; text-align: center; color: white">
        <div class="col-md-4">
            <h3>Brought to you by: <a href="https://github.com/dinosaurfiles">dinosaurfiles</a></h3>
            <br>
            <h4>We need help in designing the website! Follow the project <span class="fa fa-arrow-down"></span></h4>
            <a href="https://github.com/dinosaurfiles/SB-Iloilo"><h1><span class="fa fa-github"></span> SB-Iloilo Project</h1></a>
        </div>
        <div class="col-md-4">
            <h4 style="margin-top: 25px">Contact us through our official media links!</h4>
            <a href=""><h3><span class="fa fa-facebook-square"></span> Santa Barbara Iloilo</h3></a>
            <a href=""><h3><span class="fa fa-youtube-square"></span> ExploreSantaBarbara</h3></a>
            <a href=""><h3><span class="fa fa-twitter-square"></span> @sb-iloilo</h3></a>
        </div>
        <div class="col-md-4">
        <div style="margin: 10px 0px 0px 0px ">
            <iframe
                width="420"
                height="230"
                frameborder="0" style="border:0"
                src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDkm875PwOcQaP4My0LtHjqDVSGS904MTU
                &q=Santa+Barbara+Municipal+Hall" allowfullscreen>
            </iframe>
        </div>
        </div>
    </div>
@endsection

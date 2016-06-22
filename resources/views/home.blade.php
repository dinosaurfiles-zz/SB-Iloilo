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
@endsection

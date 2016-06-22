@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
{{-- http://themes.3rdwavemedia.com/devstudio/blog.html --}}

<div class="container" style="margin-top: 60px">
    <div class="col-md-10">
        @foreach ($projects as $project)
    	<div class="row">
            <h1 class="col-md-10 col-md-push-3 project-title"><a href="{!! action('ProjectsController@show', ['project' => $project->id]) !!}">{!! $project->title !!}</a></h1>
            <div class="clearfix"></div>
            <div class="col-md-3 text-right">
                <ul class="list-unstyled">
                	<li class="project-date-submitted">
                	    <span class="date-day">{!! date('j',strtotime($project->created_at)) !!}</span>
                        <span class="date-month">{!! date('F',strtotime($project->created_at)) !!}</span>
                    </li>
                	<li class="project-author"><a href="{!! action('ProfilesController@show', ['profile' => $project->user['username']]) !!}"><span class="fa fa-user"></span>  {!! $project->user['username'] !!}</a></li>
            	</ul>
            </div><!--//meta-list-->                    

            <div class="content-wrapper col-md-9 project-details">

                <ul class="list-inline">
                    <li><span class="fa fa-info"></span> Status: {!! $project->status !!}</li>
                    <li><span class="fa fa-clock-o"></span> Duration: {!! date('F j, Y',strtotime($project->start_date)) . " - " . date('F j, Y',strtotime($project->end_date))!!}</li>
                </ul>

                @if($project->image)
                    <figure class="figure project-image">
                        <a href="{!! action('ProjectsController@show', ['project' => $project->id]) !!}"><img class="img-responsive" src="{!! URL::asset('images/projects/' . $project->image ) !!}" alt=""></a>
                    </figure>
                @endif
                <div>
                    <div>
                        <p>{!! nl2br(e(substr($project->description, 0, 200))) . ' ...' !!}</p>
                        <a class="read-more" href="#">Read more <i class="fa fa-long-arrow-right"></i></a>
                    </div><!--//desc-->
                </div><!--//content-->
            </div><!--//content-wrapper-->   
        </div>

        @endforeach
    </div>
</div>
@endsection

@extends('layouts.app')
@section('title', 'Search')

@section('content')
<div class="container" style="margin-top: 60px">
	<div class="col-md-9 col-md-offset-1">
		<h1 style="text-align: center">You searched for: <span style="text-decoration: underline;">{!! $search_string !!}</span></h1>
		@foreach($search_results as $search_result)
		<div style="border-bottom: 2px #CCCCCC solid; margin-bottom: 40px">
			<h2><a href="{!! action('ProjectsController@show', ['project' => $search_result->id]) !!}" class="project-title" >{!! $search_result->title !!}</a></h2>
			<p>{!! nl2br(e(substr($search_result->description, 0, 200))) . ' ...' !!}</p>
		</div>
		@endforeach
	</div>
</div>
@endsection
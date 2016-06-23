@extends('layouts.app')
@section('title', 'Search')

@section('content')
<div class="container" style="margin-top: 60px">
	<div class="col-md-9 col-md-offset-1">
		<h1 class="search-project-title project-title">You searched for: <span>{!! $search_string !!}</span></h1>
		@if (count($search_results) <= 0)
			<h1 class="search-project-title project-title">Empty!</h1>
		@else
			@foreach($search_results as $search_result)
			<div class="search-results">
				<h2><a href="{!! action('ProjectsController@show', ['project' => $search_result->id]) !!}" class="project-title" >{!! $search_result->title !!}</a></h2>
				<p>{!! nl2br(e(substr($search_result->description, 0, 200))) . ' ...' !!}</p>
			</div>
			@endforeach
		@endif
	</div>
</div>
@endsection
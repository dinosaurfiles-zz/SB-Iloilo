@extends('layouts.app')
@section('title', 'Profile')

@section('content')
	<div class="container" style="margin-top: 60px">
		<div class="col-md-10 col-md-offset-1">
			<div class="row">
				<div class="profile-div">
          			<div class="center-block">
						<img src="{!! URL::asset('images/avatar.jpg') !!}" alt="..." class="img-circle img-responsive profile-image">
						{{-- {!! Form::open(array('action' => array('ProfilesController@update'), 'method' => 'POST', 'enctype' => 'multipart/form-data')) !!}
							<div class="form-group">
								{!! Form::label('image', 'Update Profile Picture') !!}
								{!! Form::file('image', array('files' => true)) !!}
							</div>
								{!! Form::submit('Update!', array('class' => 'btn btn-default')) !!}
						{!! Form::close() !!} --}}
						<h1 class="profile-username project-title">{!! $user_profile->username !!}</h1>
          			</div>
				</div>
			</div>
			<div class="row">
				<h1 class="project-title">Submitted Projects:</h1>
				
				@foreach($user_projects as $project)
				<h2 class="project-title"><a href="{!! action('ProjectsController@show', ['project' => $project->id]) !!}">{!! $project->title !!}</a></h2>
				<div class="row">
					<div class="col-md-3">
						<img class="img-responsive" src="{!! URL::asset('images/projects/' . $project->image ) !!}" alt="">
					</div>
					<div class="col-md-9 project-details">
						<p>{!! nl2br(e(substr($project->description, 0, 400))) . '...' !!}</p>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
@endsection
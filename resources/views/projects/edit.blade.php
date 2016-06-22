@extends('layouts.app')
@section('title', 'Edit')

@section('content')
<div class="container" style="margin-top: 40px">
	<h1 style="text-align: center">Edit Project #{!! $project->id !!}</h1>
	<div class="col-md-9 col-md-offset-1">
		{!! Form::open(array('action' => array('ProjectsController@update', $project->id), 'method' => 'PATCH', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data')) !!}

			<div class="form-group">
				{!! Form::label('title', 'Title', array('class' => 'col-md-3 control-label')) !!}
				<div class="col-md-9">
					{!! Form::text('title', $project->title ,array('class' => 'form-control', 'placeholder' => 'Project Title')) !!}
				</div>
			</div>

			<div class="form-group">
				{!! Form::label('description', 'Description', array('class' => 'col-md-3 control-label')) !!}
				<div class="col-md-9">
					{!! Form::textarea('description', $project->description , array('class' => 'form-control', 'placeholder' => 'Project Description')) !!}
				</div>
			</div>

			<div class="form-group">
				{!! Form::label('status', 'Status', array('class' => 'col-md-3 control-label')) !!}
				<div class="col-md-9">
					{!! Form::select('status', array('new' => 'New', 'ongoing' => 'Ongoing'), $project->status, array('class' => 'form-control')) !!}
				</div>
			</div>

			<div class="form-group">
				{!! Form::label('date', 'Duration', array('class' => 'col-md-3 control-label')) !!}
				<div class="col-md-9">
					<div class="row">
						<div class="col-md-6">
							{!! Form::label('start_date', 'Start Date', array('class' => 'control-label')) !!}
							{!! Form::date('start_date', $project->start_date, array('class' => 'form-control')) !!}
						</div>
						<div class="col-md-6">
							{!! Form::label('end_date', 'End Date', array('class' => 'control-label')) !!}
							{!! Form::date('end_date', $project->end_date, array('class' => 'form-control')) !!}
						</div>
					</div>
				</div>
			</div>

			<div class="form-group">
				{!! Form::label('image', 'Cover Photo', array('class' => 'col-md-3 control-label')) !!}
				<div class="col-md-9">
					{!! Form::file('image', array('style' => 'padding-top: 6px', 'files' => true)) !!}
				</div>
			</div>

			<div class="form-group">
				<div class="col-md-offset-3 col-md-9">
					{!! Form::submit('Update', array('class' => 'btn btn-primary')) !!}
				</div>
			</div>

		{!! Form::close() !!}
	</div>
</div>
@endsection
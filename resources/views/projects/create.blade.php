@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
<div class="container" style="margin-top: 40px">
	<h1 style="text-align: center">New Project</h1>
	<div class="col-md-9 col-md-offset-1">
		{!! Form::open(array('action' => array('ProjectsController@store'), 'method' => 'POST', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data')) !!}

			<div class="form-group">
				{!! Form::label('title', 'Title', array('class' => 'col-md-3 control-label')) !!}
				<div class="col-md-9">
					{!! Form::text('title', null ,array('class' => 'form-control', 'placeholder' => 'Project Title')) !!}
				<span class="help-block has-error-span">
		            <strong>{!! $errors->first('title') !!}</strong>
		        </span>
				</div>
			</div>

			<div class="form-group">
				{!! Form::label('description', 'Description', array('class' => 'col-md-3 control-label')) !!}
				<div class="col-md-9">
					{!! Form::textarea('description', null , array('class' => 'form-control', 'placeholder' => 'Project Description')) !!}
				<span class="help-block has-error-span">
		            <strong>{{ $errors->first('description') }}</strong>
		        </span>
				</div>
			</div>

			<div class="form-group">
				{!! Form::label('status', 'Status', array('class' => 'col-md-3 control-label')) !!}
				<div class="col-md-9">
					{!! Form::select('status', array('new' => 'New', 'ongoing' => 'Ongoing', 'complete' => 'Complete'), 'New', array('class' => 'form-control')) !!}
				<span class="help-block has-error-span">
		            <strong>{{ $errors->first('status') }}</strong>
		        </span>
				</div>
			</div>

			<div class="form-group">
				{!! Form::label('date', 'Duration', array('class' => 'col-md-3 control-label')) !!}
				<div class="col-md-9">
					<div class="row">
						<div class="col-md-6">
							{!! Form::label('start_date', 'Start Date', array('class' => 'control-label')) !!}
							{!! Form::date('start_date', \Carbon\Carbon::now(), array('class' => 'form-control')) !!}
							<span class="help-block has-error-span">
					            <strong>{{ $errors->first('start_date') }}</strong>
					        </span>
						</div>
						<div class="col-md-6">
							{!! Form::label('end_date', 'End Date', array('class' => 'control-label')) !!}
							{!! Form::date('end_date', \Carbon\Carbon::now(), array('class' => 'form-control')) !!}
							<span class="help-block has-error-span">
					            <strong>{{ $errors->first('end_date') }}</strong>
					        </span>
						</div>
					</div>
				</div>
			</div>

			<div class="form-group">
				{!! Form::label('image', 'Cover Photo', array('class' => 'col-md-3 control-label')) !!}
				<div class="col-md-9">
					{!! Form::file('image', array('style' => 'padding-top: 6px', 'files' => true)) !!}
					<span class="help-block has-error-span">
			            <strong>{{ $errors->first('image') }}</strong>
			        </span>
				</div>
			</div>

			<div class="form-group">
				<div class="col-md-offset-3 col-md-9">
					{!! Form::submit('Submit!', array('class' => 'btn btn-primary')) !!}
				</div>
			</div>

		{!! Form::close() !!}
	</div>
</div>
@endsection
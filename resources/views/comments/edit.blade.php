@extends('layouts.app')
@section('title', 'Edit')

@section('content')
<div class="container" style="margin-top: 40px">
		<div class="col-md-6 col-md-offset-3">
			<h1 style="text-align: center">Edit Comment</h1>
            {!! Form::open(array('action' => array('CommentsController@update', $project->id, $comment->id), 'method' => 'PATCH' )) !!}
            <div class="form-group">
            	{!! Form::label('content', 'Content') !!}
				{!! Form::textarea('content', $comment->content , array('class' => 'form-control', 'placeholder' => 'Comment Content', 'rows' => '3')) !!}
            </div>
				{!! Form::submit('Update', array('class' => 'btn btn-primary pull-right')) !!}
			{!! Form::close() !!}
		</div>
</div>
@endsection
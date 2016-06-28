@extends('layouts.app')
@section('title', 'View')

@section('content')
<div class="container" style="margin-top: 60px">
	<div class="col-md-10 col-md-offset-1">
	<h1 style="text-align: center">Admin Dashboard</h1>
	@foreach ($users as $user)
	<div class="col-md-4 add-member-users">
		<img class="img-circle" src="{!! URL::asset('images/avatar.jpg') !!}" alt="...">
		@if ($user->hasRole('admin'))
		<div>
			<h4>{!! $user->first_name . ' ' . $user->last_name !!} <small>{!! $user->username!!}</small></h4>
			{!! Form::open(array('action' => array('AdminController@revokeAdmin'), 'method' => 'DELETE')) !!}
				<input name="id" value="{!! $user->id !!}" hidden>
				<button class="btn btn-danger" type="submit"><span class="fa fa-minus"></span> Revoke Admin Role</button>
			{!! Form::close() !!}
		</div>
		@else
		<div>
			<h4>{!! $user->first_name . ' ' . $user->last_name !!} <small>{!! $user->username!!}</small></h4>
			{!! Form::open(array('action' => array('AdminController@addAdmin'), 'method' => 'POST')) !!}
				<input name="id" value="{!! $user->id !!}" hidden>
				<button class="btn btn-primary" type="submit"><span class="fa fa-plus"></span> Make as Admin</button>
			{!! Form::close() !!}
		</div>
		@endif
	</div>
	@endforeach
	</div>
</div>
@endsection
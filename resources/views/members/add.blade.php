@extends('layouts.app')
@section('title', 'Add Members')

@section('content')
	<div class="container" style="margin-top: 60px">
		<div class="col-md-10 col-md-offset-1">
			<h1 class="add-member-title">Add New Project Members</h1>
			{!! Form::open(array('action' => array('MembersController@search', $project->id), 'method' => 'POST', 'class' => 'form-inline col-md-offset-1')) !!}
				<div class="input-group add-member-input-group">
					@if(! empty($search_string))
					{!! Form::text('search', $search_string , array('class' => 'form-control', 'placeholder' => 'Search for members')) !!}
					@else
					{!! Form::text('search', null , array('class' => 'form-control', 'placeholder' => 'Search for members')) !!}
					@endif					
					<span class="input-group-btn">
	                    {!! Form::submit('Search!', array('class' => 'btn btn-default')) !!}
	                </span>
				</div>
			{!! Form::close() !!}


			@if(! empty($users))
			@foreach ($users as $user)
			<div class="col-md-4 add-member-users">
				<img class="img-circle" src="{!! URL::asset('images/avatar.jpg') !!}" alt="...">
                    <div>
	                    <h4>{!! $user->first_name . ' ' . $user->last_name !!} <small>{!! $user->username!!}</small></h4>
	                    <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#new-member" user-id="{!! $user->id !!}"  name="add-member-button"><span class="fa fa-plus"></span> Add to Project</button>
                    </div>
				
			</div>
			@endforeach
			@endif
		</div>
	</div>
	
	<div class="modal fade" id="new-member" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	    <div class="modal-dialog" role="document">
	        <div class="modal-content">
	            <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                <h4 class="modal-title" id="myModalLabel">Add member role to project</h4>
	            </div>
	            {!! Form::open(array('action' => array('MembersController@store', $project->id), 'method' => 'POST')) !!}
	            <div class="modal-body">
	            	<input id="memberId" name="memberId" hidden>
	                {!! Form::select('role', array('ProjectLeader' => 'Project Leader', 'Secretary' => 'Secretary', 'Assistant' => 'Assistant'), 'Project Leader', array('class' => 'form-control')) !!}
	            </div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	                {!! Form::submit('Add', array('class' => 'btn btn-primary')) !!}
	            </div>
                {!! Form::close() !!}
	        </div>
	    </div>
	</div>
@endsection

@section('scripts')
	<script type="text/javascript">
		$('[name=add-member-button]').click(function(){
            var memberId = $(this).attr("user-id");

            $("#memberId").val(memberId);
            console.log($("#memberId").val());
        });

	</script>
@endsection
@extends('layouts.app')
@section('title', 'View')

@section('content')
{{-- http://themes.3rdwavemedia.com/devstudio/blog.html --}}

<div class="container" style="margin-top: 60px">
    @if ($errors->has('content'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Warning!</strong> {!! $errors->first('content') !!}
    </div>
    @endif

    <div class="col-md-9">
        <h1 class="project-title">{!! $project->title !!}</h1>
        <ul class="list-inline project-details">
            <li><i class="fa fa-calendar"></i> {!! date('F j, Y',strtotime($project->created_at)) !!}</li>
            <li><a href="{!! action('ProfilesController@show', ['profile' => $project->user['username']]) !!}"><span class="fa fa-user"></span>  {!! $project->user['username'] !!}</a></li>
            <li><i class="fa fa-info"></i> Status: {!! $project->status !!}</li>
            <li><i class="fa fa-clock-o"></i> Duration: {!! date('F j, Y',strtotime($project->start_date)) . " - " . date('F j, Y',strtotime($project->end_date)) !!}</li>

            @if ( $project->user_id == Auth::id())
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> <i class="fa fa-cog"></i> Options <span class="caret"></span></a>
                <ul class="dropdown-menu dropdown-menu-right" role="menu">
                    <li><a href="{!! action('ProjectsController@edit', ['project' => $project->id]) !!}" ><i class="fa fa-btn fa-pencil-square-o"></i>Edit Project</a></li>
                    <li>
                        {!! Form::open(array('action' => array('ProjectsController@destroy', 'project' => $project->id), 'method' => 'DELETE')) !!}
                            <button class="btn-link" role="button" type="submit"><i class="fa fa-btn fa-trash-o"></i>Delete Project</button>
                        {!! Form::close() !!}
                    </li>
                    {{-- <li><a href="#"><i class="fa fa-btn fa-trash-o"></i>Delete Project</a></li> --}}
                </ul>
            </li>
            @endif
        </ul>
        <img class="img-responsive project-image" src="{!! URL::asset('images/projects/' . $project->image ) !!}" alt="">
        <div class="view-details">
            <p class="project-details">
                {!! strip_tags(nl2br(e($project->description))) !!}
            </p>
        </div>

        <div class="comment-div">
        <h3>Comments:</h3>
            {!! Form::open(array('action' => array('CommentsController@store', $project->id), 'method' => 'POST' , 'class' => 'comment-box')) !!}
                <div class="form-group">
                    {!! Form::textarea('content', null, array('class' => 'form-control', 'rows' => '3')) !!}
                    {{-- <textarea class="form-control" rows="3"></textarea> --}}
                </div>
                
                <div class="form-group">
                    <button type="submit" class="btn btn-primary pull-right comment-btn">Comment</button>
                </div>
                <div class="clearfix"></div>
            {!! Form::close() !!}

            @foreach ($project->comments as $comment)

            <div class="media">
                <div class="media-left">
                    <a href="#">
                        <img class="media-object" src="{!! URL::asset('images/avatar.jpg') !!}" alt="..." style="height: 48px">
                    </a>
                </div>
                <div class="media-body">
                    <h4 class="media-heading">{!! $comment->user['username'] !!} <small>{!! date('F j',strtotime($comment->created_at)) !!}
                        @if($comment->user_id == Auth::id() || Auth::user()->user_type == 0)
                        <ul class="list-inline pull-right">

                            @if($comment->user_id == Auth::id())
                            <li><a href="{!! action('CommentsController@edit', ['project' => $project->id, 'announcement' => $comment->id]) !!}"><i class="fa fa-pencil-square-o"></i> Edit</a>
                            </li>
                            @endif

                            <li>
                                {!! Form::open(array('action' => array('CommentsController@destroy', 'project' => $project->id, 'comment' => $comment->id), 'method' => 'DELETE')) !!}
                                    <button class="btn-link btn-link-comment" role="button" type="submit"><i class="fa fa-trash-o"></i> Delete</button>
                                {!! Form::close() !!}
                            </li>
                        </ul>
                        @endif
                    </small>

                    </h4>
                    {!! strip_tags($comment->content) !!}
                </div>
            </div>

            @endforeach
        </div>

    </div>

    <div class="col-md-3 announcement">
    <div class="announcement-div">
        <div class="panel panel-primary" >
            <div class="panel-heading announcement-heading">
                Announcements
            </div>
            <ul class="list-group announcement-list">
                @if (Auth::user()->user_type == 0 && $project->user_id == Auth::id())
                <li class="list-group-item announcement-new">
                <a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-btn fa-plus-square-o"></i>New Announcement</a>
                </li>
                @endif
                @if (count($project->announcements) > 0)
                    @foreach($project->announcements as $announcement)
                        <li class="list-group-item">

                        @if (Auth::id() == $project->user_id )
                        <div class="dropdown announcement-dropdown">
                            <a href="#" class="dropdown-toggle pull-right" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right announcement-dropdown-menu" role="menu">
                                <li>
                                    <a href="{!! action('AnnouncementsController@edit', ['project' => $project->id, 'announcement' => $announcement->id]) !!}"><i class="fa fa-btn fa-pencil-square-o"></i>Edit Announcement</a>
                                </li>
                                <li>
                                    {!! Form::open(array('action' => array('AnnouncementsController@destroy', 'project' => $project->id, 'announcement' => $announcement->id), 'method' => 'DELETE')) !!}
                                        <button class="btn btn-link" role="button" type="submit"><i class="fa fa-btn fa-trash-o"></i>Delete Announcement</button>
                                    {!! Form::close() !!}
                                </li>
                            </ul>
                        </div>
                        @endif
                        {!! date('F j',strtotime($announcement->created_at)) . ' - ' . strip_tags($announcement->content) !!}</li>
                    @endforeach
                @else
                    <li class="list-group-item">Empty</li>                            
                @endif
            </ul>
        </div>
        </div>


        <div class="project-members-div">
            <h3 class="project-members">Project Members: </h3>
            <ul class="list-unstyled">

            @if (count($project->members) > 0)
            @foreach ($project->members as $member)
                <li class="project-members-member" >
                    <img class="img-circle" src="{!! URL::asset('images/avatar.jpg') !!}" alt="..." style="height: 48px">
                    <div>
                    <h4>{!! $member->user['first_name'] . ' ' . $member->user['last_name'] !!} <small>{!! $member->user['username'] !!}</small></h4>
                    <p>{!! $member->role !!}</p>

                    @if ($project->user_id == Auth::id())
                    {!! Form::open(array('action' => array('MembersController@destroy', 'project' => $project, 'member' => $member), 'method' => 'DELETE')) !!}
                        <button class="btn btn-danger btn-xs"><i class="fa fa-btn fa-trash-o"></i>Remove Member</button>
                    {!! Form::close() !!}
                    </div>
                    @endif
                </li>
            @endforeach
            @else
                <li><h4 style="text-align: center">Empty</h4></li>
            @endif
                @if ($project->user_id == Auth::id())
                <li class="project-members-option-list">
                    {!! Form::open(array('action' => array('MembersController@search', $project->id), 'method' => 'POST', 'class' => 'form-inline col-md-offset-1')) !!}

                        <button class="btn btn-primary"><i class="fa fa-btn fa-plus-square-o"></i>Add New Project Member</button>
                    {!! Form::close() !!}
                </li>
                @endif

            </ul>
        </div>
    </div>
    @if (Auth::user()->user_type == 0)
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            {!! Form::open(array('action' => array('AnnouncementsController@store', $project->id), 'method' => 'POST' )) !!}
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add New Announcement</h4>
                </div>
                <div class="modal-body">
                        <div class="form-group">
                        {!! Form::textarea('content', null , array('class' => 'form-control', 'placeholder' => 'Announcement Content', 'rows' => '3')) !!}
                        </div>
                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    @endif
</div>
@endsection

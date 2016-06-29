<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

	protected $fillable = ['project_id', 'user_id', 'content'];

	public function user ()
	{
		return $this->belongsTo('App\User', 'user_id');
	}

	public function projects()
	{
		return $this->belongsTo('App\Project', 'project_id');
	}
}

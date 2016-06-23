<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{

    protected $fillable = ['member_id', 'project_id', 'role'];

    public function user ()
    {
    	return $this->hasOne('App\User', 'id','member_id');
    }
}

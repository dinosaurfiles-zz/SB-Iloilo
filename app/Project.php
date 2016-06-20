<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['title', 'user_id', 'description', 'status', 'start_date', 'end_date', 'image'];

    public function announcements (){
    	return $this->hasMany('App\Announcement');
    }

    public function comments (){
    	return $this->hasMany('App\Comment');
    }


}

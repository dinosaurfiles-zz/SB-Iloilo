<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['title', 'user_id', 'description', 'status', 'start_date', 'end_date', 'image'];

    public function announcements ()
    {
    	return $this->hasMany('App\Announcement');
    }

    public function comments ()
    {
    	return $this->hasMany('App\Comment');
    }

    public function user ()
    {
    	return $this->belongsTo('App\User', 'user_id');
    }

    public function members ()
    {
        return 
        // return $this->hasMany('App\Member', 'project_id', 'id');

        //select `users`.*, `members`.`project_id` from `users` inner join `members` on `members`.`member_id` = `users`.`id` where `members`.`project_id` = 1
    }


}

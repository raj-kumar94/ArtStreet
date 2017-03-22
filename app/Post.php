<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //we want post to be eagerly loaded with user
    public $with = ['user','likes'];

    protected $fillable = ['content','user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function likes()
    {
        return $this->hasMany('App\Like');
    }

}

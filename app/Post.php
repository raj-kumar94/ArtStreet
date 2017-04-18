<?php

namespace App;
use Storage;
use Laravel\Scout\Searchable;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Searchable;
    //we want post to be eagerly loaded with user and likes
    public $with = ['user','likes','comments'];

    protected $fillable = ['content','user_id','image'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function likes()
    {
        return $this->hasMany('App\Like');
    }

    //pass the field as argument for the accessor
    public function getImageAttribute($image)
    {
        //getting full path to post image, make sure to import Storage facade too
        return asset(Storage::url($image));
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
   
}

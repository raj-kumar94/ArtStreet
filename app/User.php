<?php

namespace App;

use App\Traits\Friendable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Cmgmyr\Messenger\Traits\Messagable;
use Storage;
use Laravel\Scout\Searchable;

class User extends Authenticatable
{
    use Notifiable;
    use Friendable;
    use Messagable;
    use Searchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','slug','gender','avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function profile()
    {
        return $this->hasOne('App\Profile');
    }

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function getAvatarAttribute($avatar)
    {
        //getting full path to user's avatar
        //use it as $user->avatar to get its full path
        return asset(Storage::url($avatar));
    }

    
}

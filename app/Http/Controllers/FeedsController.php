<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use Auth;

class FeedsController extends Controller
{
    public function feed()
    {
        $friends = Auth::user()->friends();
        $feed = array();

        foreach($friends as $friend):
            foreach($friend->posts as $post):
                array_push($feed, $post);
            endforeach;
        endforeach;

        return $feed;
    }
}

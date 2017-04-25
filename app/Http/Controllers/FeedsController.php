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

        $myid = Auth::user();
        foreach($myid->posts as $mypost):
                array_push($feed, $mypost);
        endforeach;

        usort($feed, function($pos1, $post2){
            return $pos1->id < $post2->id;
        });

        return $feed;
        
    }

    public function photos(){
        $photos = Post::orderBy('created_at', 'desc')->paginate(9);
        return view('photos', compact('photos'));
        // return $photos;
    }

    public function guest_photos(){
        $photos = Post::orderBy('created_at', 'desc')->paginate(9);
        return view('guest_photos', compact('photos'));
        // return $photos;
    }

    public function similar($slug){
        return $slug;
    }
}

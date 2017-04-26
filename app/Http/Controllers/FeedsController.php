<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use Auth;
use TCG\Voyager\Models\Category;

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

    public function photos(Request $request){
        $photos = Post::orderBy('created_at', 'desc')->paginate(9);
        $categ = Category::all();

        
        if($request['query']){
             $photos = Post::search($request['query'])->orderBy('created_at', 'desc')->paginate(9);
            return view('photos', compact('photos','categ'));
        }


        return view('photos', compact('photos','categ'));
        // return $photos;
    }

    public function guest_photos(){
        $photos = Post::orderBy('created_at', 'desc')->paginate(9);
        return view('guest_photos', compact('photos'));
        // return $photos;
    }

    // searching similar photos
    public function similar($slug){
        $currentPost = Post::where('id',$slug)->first();
        
        $similarPhotos = array();

        $hashtags = $currentPost->meta_keywords;
        $kwdrs = preg_split("/[\s]+/", $hashtags, -1, PREG_SPLIT_NO_EMPTY);
// return $kwdrs;
        foreach($kwdrs as $keys){
        //    $x = Post::search($keys)->get();
        $x = Post::where('meta_keywords','like','%'.$keys.'%')->get();
// return $x;
           foreach($x as $xx){
               if (!in_array($xx, $similarPhotos)) {
                    array_push($similarPhotos,$xx);
                }
               
           }
        }

        $photos = $similarPhotos;
        $categ = Category::all();
        // return $photos;

        //return to different route similar to photos
        return view('similar', compact('photos','categ'));

    }

    //search by category
    public function categories($slug){
        $c = Category::where('slug', $slug)->first();
        $photos = Post::where('category_id',$c->id)->paginate(9);

        $categ = Category::all();

        return view('photos', compact('photos','categ'));
    }
}

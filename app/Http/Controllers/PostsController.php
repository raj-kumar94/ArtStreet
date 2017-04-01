<?php

namespace App\Http\Controllers;

use Auth;
use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function store(Request $request)
    {

		$dirName = Auth::user()->slug;    	
        if($request->hasFile('photo'))
        {
            Post::create([
            	'user_id' => Auth::id(),
            	'content' => $request['content'],
              	'image' => $request->photo->store('public/posts/'.$dirName.'')
            ]);

            return redirect()->back();
        }

        else{
        	Post::create([
            	'user_id' => Auth::id(),
            	'content' => $request['content']
            ]);

            return redirect()->back();
        }
    }
}

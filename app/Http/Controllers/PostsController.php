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

        //do like this
        $meta_keywords = '';
        $price = 0;
        $category_id = 1;
        $title = '';
        $content = $request['content'];

        if($request['price']){
            $price=$request['price'];
        }
        

        if($request['meta_keywords']){
            $meta_keywords = $request['meta_keywords'];
        }

        if($request['category_id']){
            $category_id = $request['category_id'];
        }

        if($request['title']){
            $title = $request['title'];
        }
        

        if($request->hasFile('image1'))
        {
            Post::create([
            	'user_id' => Auth::id(),
            	'content' => $content,
              	'image' => $request->image1->store('public/posts/'.$dirName.''),
                'price' => $price,
                'meta_keywords' =>$meta_keywords,
                'title' => $title,
                'category_id' => $category_id
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

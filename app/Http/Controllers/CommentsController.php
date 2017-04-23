<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;
use Auth;

class CommentsController extends Controller
{
    public function postcomment(Request $request,$id)
    {
         $post = Post::find($id);

         $comment = Comment::create([
             'user_id' => Auth::id(),
             'post_id' => $post->id,
             'comment' =>'nice post'
         ]);
         return Comment::find($comment->id);
        // return 'hello';
    }
}

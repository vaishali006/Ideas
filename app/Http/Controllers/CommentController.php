<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store($id)
    {
      $idea = Post::where('id',$id)->first();
      request()->validate([
            "comment" => 'required',
          ]);
        
            $comment = new Comment();
            $comment->post_id = $idea->id;
            $comment->user_id = auth()->id();
            $comment->comment = request()->get('comment');
            $comment->save();
            return redirect('/')->with('success','Comment created Successfully'); 
    }

    public function show()
    {
        
    }

    public function update()
    {
        
    }
}

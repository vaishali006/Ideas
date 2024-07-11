<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class LikePostController extends Controller
{
    public function like(Post $post)
    {
        $liker = auth()->user();
        $liker->likes()->attach($post);
  
         return redirect(route('dashboard'))->with('success','Post Liked Successfully');   
    }

    public function unlike(Post $post)
    {
        $liker = auth()->user();

         $liker->likes()->detach($post);
  
         return redirect(route('dashboard'))->with('success','Post UnLiked Successfully');   
    }
}

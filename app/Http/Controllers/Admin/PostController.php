<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $ideas = Post::paginate(4); 
        return view('admin.posts.postlist', ['ideas' => $ideas]);
    }
}

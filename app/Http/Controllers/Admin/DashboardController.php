<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function index()
    {
        //one way
        // if (!Gate::allows('admin')) {
        //     abort(403);
        // }

        //second way
        //This line checks if the authenticated user (retrieved automatically from the request) passes the gate named 'admin'. 
        //If the user fails the gate check, Laravel will automatically throw an AuthorizationException.
        //$this->authorize('admin');

        $user = User::count(); 
        $post = Post::count(); 
        $comment = Comment::count(); 

        return view('admin.dashboard',compact('user','post','comment'));
    }
}

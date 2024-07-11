<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        //with('user','comments.user') is called eager loading where the laravel debugger reduces 
        // our duplicate queries in a page by using defined relationship in tables.--REFER Model
        $ideas = Post::orderBy('created_at','DESC');

      
        if( request()->get('search'))
        $ideas = $ideas->search(request()->get('search'));


        return view('dashboard', ['ideas' => $ideas->paginate(2)]);
    }
}

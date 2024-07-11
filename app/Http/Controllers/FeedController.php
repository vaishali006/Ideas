<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $user = auth()->user();

        $followingIds = $user->followings()->pluck('user_id');
 
        $ideas = Post::whereIn('user_id', $followingIds)->latest();
        if( request()->get('search')) $ideas = $ideas->search(request()->get('search'));
        return view('dashboard', ['ideas' => $ideas->paginate(2)]);    
    }
}

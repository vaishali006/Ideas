<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::paginate(4);
        return view('admin.posts.commentlist', ['comments' => $comments]);
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();
        return redirect(route('admin.comments'))->with('success', 'Comment deleted Successfully');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store()
    {
        request()->validate([
            "content" => 'required',
          ]);
        
            $post = new Post();
            $post->content = request()->get('content');
            $post->user_id = auth()->id();
            $post->save();
            return redirect('/')->with('success','Post created Successfully');   
    }

    public function show($id)
    {
        //this is called route model binding where you can directly access the table in route from model name
        $idea = Post::where('id',$id)->first();
        // $idea = $id;
        return view('posts.idea', compact('idea'));
    }

    public function edit($id)
    {
        $idea = Post::where('id',$id)->first();
        $this->authorize('edit-post',$idea);
        $editing = true;
        return view('posts.idea', compact('idea','editing'));
       
    }

    public function update(Post $id)
    {   
        $idea = $id;
        $this->authorize('edit-post',$idea);
                
        $idea->content = request()->get('content');
        $idea->user_id=  auth()->id() ;
        $idea->save();
        return redirect(route('posts.show',$idea->id))->with('success','Post updated Successfully');   
    }

    public function destroy(Post $id)
    {        
        $idea = $id;
        $this->authorize('delete-post',$idea);
        $post = $idea->firstOrFail()->delete();
        return redirect('/')->with('success','Post deleted Successfully'); 
       // return redirect('/')->with('error',"Can't delete this post");   
    }
}

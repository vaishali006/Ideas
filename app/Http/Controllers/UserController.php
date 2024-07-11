<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
   

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::where('id',$id)->first();
        return view('user.profile',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         $user = User::findOrFail($id);

        $this->authorize('update',$user);
        $loggedInUser = Auth::user(); 
        if(Gate::denies('edit-profile', [$loggedInUser, $user]))
        {
            abort(403);
        }
        $editing = true;
        return view('user.edit',compact('user','editing','loggedInUser'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $id)
    {
        $user = User::where('id',$id)->first();

        $this->authorize('update',$user);

        // $loggedInUser = Auth::user(); 

        // if(Gate::denies('edit-profile', [$loggedInUser, $user]))
        // {
        //     abort(403);
        // }

        if(request()->has('image'))
        {
            $imagePath = request()->file('image')->store('profile','public');
            // return $imagePath;
        }
        $user->name = request()->get('username') ??   $user->name ;
        $user->bio = request()->get('bio') ?? $user->name ;
        $user->image = $imagePath ?? null;
        $user->save();
        return redirect(route('profiles.show',$user->id))->with('success','Profile updated Successfully');   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

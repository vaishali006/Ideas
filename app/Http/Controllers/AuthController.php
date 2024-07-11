<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function store()
    {
        $validated = request()->validate([
            "name" => 'required',
            "email" => 'required|email|unique:users,email',
            "password" => 'required|confirmed',
          ]);

          $user = User::create(
            [
                'name' =>  $validated['name'],
                'email' =>  $validated['email'],
                'password' => Hash::make ($validated['password']),
            ]
          );

          Mail::to($user->email)->send(new WelcomeMail($user));
          return redirect('/login')->with('success','Registration Succesful');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function authenticate()
    {
        $validated = request()->validate([
            "email" => 'required|email',
            "password" => 'required',
          ]);

          if(auth()->attempt($validated)){
            request()->session()->regenerate();
            return redirect('/')->with('success','Logged In Succesfully');
          }
          return redirect('/login')->withErrors(['email' => 'No matching email found']);
    }

    public function logout()
    {
        auth()->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/')->with('success','Logged Out Succesfully');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function login(Request $request){
        $fields = $request->validate([
            'email' => ['required', 'min:8', 'email'],
            'password' => ['required', 'min:8'],
        ]);

        if(Auth::attempt($fields, $request->remember_me)){
            return redirect()->route('home');
        }else{
            return back()->withErrors(['Failed' => 'Your credentials are incorrect.']);
        }

    }

    public function register(Request $request){
        
        $field = $request->validate([
            'fullname' => ['required', 'max:100'],
            'email' => ['required', 'email', 'max:100', 'unique:users'],
            'password' => ['required', 'min:8', 'confirmed']
        ]);

        User::create($field);

        return redirect()->route('register')->with('Success', 'Registration Successful! You can now login.');
    }
}

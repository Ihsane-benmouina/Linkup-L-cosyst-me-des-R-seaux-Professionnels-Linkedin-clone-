<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function showRegister()
    {
        return view('auth.register');
    }
    public function login(Request $request)
    {
            $validated=$request->validate([
            'email'=>'required | email',
            'password'=>'required'
        ]);
            if(Auth::attempt($validated)) 
              {
                return redirect()->route('feed');
              }
    }

    public function register(Request $request)
    {       
         $validated=$request->validate([
            'name'=>'required|max:20',
            'email'=>'required|email|unique:users' ,
            'password'=>'required|string|confirmed',
        ]);
        $validated['password'] = Hash::make($validated['password']);
        $validated['headline'] = "role";

        $user=User::create($validated);
        Auth::login($user);
        return to_route("feed");

    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        return redirect()->route('/');
    }





}
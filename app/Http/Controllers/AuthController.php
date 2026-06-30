<?php

namespace App\Http\Controllers;

use Illuminate\Container\Attributes\Auth as AttributesAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use app\Models\User;

class AuthController extends Controller
{
    public function showRegister(){
        return view('auth.register');

    }
    public function showLogin(){
        return view('auth.login');
        
    }
    public function login(Request $request){
        $validated=$request->validate([
            'email'=>'required | email',
            'password'=>'required'
        ]);
        if(Auth::attempt($validated)){
            return redirect()->route('feed');
        }        
    }
    public function register(Request $request){
         $validated=$request->validate([
            'name'=>'required | max:20',
            'email'=>'required | email | unique:users' ,
            'password'=>'required | string | min:8',
            'headline'=>'required | confirmed'
        ]);
        $user=User::create( $validated);

        Auth::login($user);
        return redirect()->route('feed');
        
    }



}

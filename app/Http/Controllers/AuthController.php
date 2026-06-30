<?php

namespace App\Http\Controllers;

use Illuminate\Container\Attributes\Auth as AttributesAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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



}

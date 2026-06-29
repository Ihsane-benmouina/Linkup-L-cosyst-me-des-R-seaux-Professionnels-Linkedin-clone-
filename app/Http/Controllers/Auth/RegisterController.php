<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    public function show(){
        return view('auth.register');
    }
    public function store(Request $request){
        $request->validate([
            'name'=>['required', 'string', 'max:255'],
            'email'=>['required', 'string', 'email', 'max:255', 'unique:users'],
            'headline' =>['required', 'string', 'max:255'],
            'password'=>['required', 'string', 'min:8', 'confirmed'],
        ]);
        $user=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'headline'=>$request->headline,
            'password'=>Hash::make($request->password),

        ]);
        Auth::login($user);
    }
}

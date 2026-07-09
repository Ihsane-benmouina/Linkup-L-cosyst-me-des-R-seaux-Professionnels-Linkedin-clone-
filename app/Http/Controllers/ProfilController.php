<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    //
    public function show(User $user){
        $posts= $user->posts()->with(['user', 'comment.user','likes'])->latest()->get();
        return view('profile.edit', compact('user','posts'));

    }
}

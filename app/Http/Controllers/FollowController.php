<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class FollowController extends Controller
{
    //
    public function toggle(User $user)
    {
        $me = Auth::user();

        if ($me->id === $user->id) {
            return back()->with('error', "Vous cannot follow yourself.");
        }

$me->followings()->toggle($user->id); 
        return back();
    }
}

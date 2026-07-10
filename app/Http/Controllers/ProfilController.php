<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    //
  public function show(User $user)
{
    $posts = $user->posts()->with(['user', 'comments.user', 'likes'])->latest()->get();
    
    return view('profile.show', compact('user', 'posts'));
}
    public function edit(){
        $user=Auth::user();
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request,User $user){
       
        $validated=$request->validate([
            'headline'=>'nullable|string|max:255',
            'company'=>'nullable|string|max:255',
            'avatar'=>'nullable|url|max:255',
        ]);
        $user->update($validated);
        return redirect()->route('feed')->with('success','votre profil a été mis à jour avec succès!');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        // Mengambil user yang sedang login beserta role-nya
        $user = Auth::user()->load('roles');
        return view('components.profile.user-profile', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $attributes = $request->validate([
            'email' => 'required|email|unique:users,email,'.$user->id,
            'name' => 'required',
        ]);

        $user->update($attributes);
        return back()->withStatus('Profil telah diperbarui.');
    }
}

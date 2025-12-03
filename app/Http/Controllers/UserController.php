<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('pages.profil.index', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'nullable|min:6',
            'profil_pic' => 'nullable|image|max:2048'
        ]);

        // foto profil
        if ($request->hasFile('profil_pic')) {
            $file = $request->file('profil_pic');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('profile'), $filename);
            $user->profil_pic = $filename;
        }

        // update data
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->password != null) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return back()->with('success', 'Profile updated successfully!');
    }
}

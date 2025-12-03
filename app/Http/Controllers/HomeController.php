<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Mapel, User};

class HomeController extends Controller
{
    //
    public function index(){
        // $user = User::where('role','!=','admin')->count();

        return view('beranda');
    }
    public function login(){
        return view('auth.login');
    }
    public function reg(){
        return view('auth.register');
    }
public function dashboard()
{
    $user = auth()->user();
    $courses = $user->courses;

    return view('pages.dashboard', [
        'courses' => $courses,
    ]);
}

}
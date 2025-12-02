<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Mapel, User};
class HomeController extends Controller
{
    //
    public function index(){
        $user = User::where('role','!=','admin')->count();

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

    return view('pages.dashboard', [
        'user' => $user,
        'progress' => 75,
        'totalHours' => 250,
        'mapels' => [
            (object)[ 'name' => 'Matematika', 'color' => '#4DA3FF', 'progress' => 10 ],
            (object)[ 'name' => 'Bahasa Inggris', 'color' => '#9B59FF', 'progress' => 10 ],
        ],
    ]);
}
}
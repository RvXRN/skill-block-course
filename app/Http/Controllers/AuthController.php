<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, Hash, Storage};
use App\Models\User;

class AuthController extends Controller
{
     public function index(){
        // $user = User::where('role','!=','admin')->count();

        return view('beranda');
    }
    // Tampilkan Form Register
    public function showRegister()
    {
        return view('auth.register');
    }

    // Proses Register
    public function register(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'tgl_lahir' => 'required|date', 
            'kelas' => 'required|string|max:2',
        ]);

        // Upload Foto

        // Simpan User
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'tgl_lahir' => $request->tgl_lahir,
            'role' => 'students',
            'kelas' => $request->kelas,
            'profil_pic' => 'logon.png',
        ]);

        // Login otomatis setelah register (opsional)
        // Auth::attempt(['email' => $request->email, 'password' => $request->password]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    // Tampilkan Form Login
    public function showLogin()
    {
        return view('auth.login');
    }

    // Proses Login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Fitur Ingat Saya (Remember Me)
        // Jika checkbox dicentang, nilainya true via $request->boolean('remember')
        $remember = $request->boolean('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    // Proses Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
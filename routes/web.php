<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index']);
// Route::get('/login', [HomeController::class, 'login']);
// Route::get('/register', [HomeController::class, 'reg']);
// Route::get('/dashboard', [HomeController::class, 'dashboard']);
// Route::get('/test', function (){
//     return view('templates.template');
// });

Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.process');
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.process');
}); 

// Authenticated Routes (Hanya bisa diakses jika sudah login)
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    // Contoh Dashboard Sederhana
    Route::get('/dashboard', function () {
        return view('pages.dashboard');
    })->name('dashboard');
});
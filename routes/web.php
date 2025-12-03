<?php

use Illuminate\Support\Facades\{Auth, Route};
use App\Http\Controllers\{AuthController, MapelController, UserController};
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
    Route::get('/profile', [UserController::class, 'index'])->name('profile.index');
    Route::post('/profile/update', [UserController::class, 'update'])->name('profile.update');
    
    // Contoh Dashboard Sederhana
    Route::get('/dashboard', function () {
        return view('pages.dashboard', [
        $user = Auth::user()->name,
        'user' => $user,
        'progress' => 75,
        'totalHours' => 250,
        'mapels' => [
            (object)[ 'name' => 'Matematika', 'color' => '#4DA3FF', 'progress' => 10 ],
            (object)[ 'name' => 'Bahasa Inggris', 'color' => '#9B59FF', 'progress' => 10 ],
        ],
    ]);
    })->name('dashboard');
});
Route::middleware(['auth', 'checkrole:admin,teachers'])->group(function () {
    Route::get('/mapels', [MapelController::class, 'index'])->name('mapels.index');          // List Mapel
    Route::get('/mapels/create', [MapelController::class, 'create'])->name('mapels.create'); // Form Add
    Route::post('/mapels', [MapelController::class, 'store'])->name('mapels.store');         // Save Data
    Route::get('/mapels/{mapel}/edit', [MapelController::class, 'edit'])->name('mapels.edit'); // Form Edit
    Route::put('/mapels/{mapel}', [MapelController::class, 'update'])->name('mapels.update'); // Update
    Route::delete('/mapels/{mapel}', [MapelController::class, 'destroy'])->name('mapels.destroy'); // Delete
});
Route::middleware(['auth', 'checkrole:admin,teachers,student'])->group(function () {
    Route::get('/mapel', [MapelController::class, 'index'])->name('mapels.student.index');
});
Route::middleware(['auth', 'checkrole:admin'])->group(function () {
    Route::get('/admin', function() {
        return "Hello Admin";
    });
});
Route::middleware(['auth', 'checkrole:admin,teachers'])->group(function () {
    Route::get('/admint', function() {
        return "Admin & Teacher Only";
    });
});
Route::get('/test-role', function () {
    return auth()->user()->role;
});

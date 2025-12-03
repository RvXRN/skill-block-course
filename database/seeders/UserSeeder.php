<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Admin
        User::create([
            'name' => 'Administrator Utama',
            'email' => 'admin@sekolah.com',
            'email_verified_at' => now(), // Menandakan email sudah diverifikasi
            'password' => Hash::make('password123'),
            'tgl_lahir' => '1990-01-01',
            'role' => 'admin',
            'kelas' => 'AD', 
            'profil_pic' => 'logon.png',
        ]);

        // 2. Guru (Sesuai typo di schema: 'tearchers')
        User::create([
            'name' => 'Pak Budi Santoso',
            'email' => 'guru@sekolah.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'tgl_lahir' => '1985-05-20',
            'role' => 'teachers', 
            'kelas' => 'GR',
            'profil_pic' => 'logon.png',
        ]);

        // 3. Siswa
        User::create([
            'name' => 'Andi Pratama',
            'email' => 'siswa@sekolah.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'tgl_lahir' => '2006-08-17',
            'role' => 'students',
            'kelas' => '1A',
            'profil_pic' => 'logon.png',
        ]);
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        \App\Models\User::factory()->create([
            'name' => 'Administrator',
            'email' => 'admin@mail.com',
            'password' => Hash::make('admin431'),
            'tgl_lahir' => date('03-November-2023'),
            'role' => 'admin',
            'kelas' => '-'
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Siswa',
            'email' => 'siswa@mail.com',
            'password' => Hash::make('siswa431'),
            'tgl_lahir' => date('04-November-2023'),
            'role' => 'students',
            'kelas' => '3B'
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Guru',
            'email' => 'guru@mail.com',
            'password' => Hash::make('guru431'),
            'tgl_lahir' => date('05-November-2023'),
            'role' => 'teachers',
            'kelas' => '-'
        ]);
    }
}

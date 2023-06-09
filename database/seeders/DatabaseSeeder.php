<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'nama' => 'Angga Wahyu',
            'email' => 'superadmin@gmail.com',
            'status_verifikasi' => 'terverifikasi',
            'email_verified_at' => now(),
            'password' => bcrypt(12345678),
            'level' => 'superadmin',
            'status_aktif' => 'aktif',
        ]);
    }
}

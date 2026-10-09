<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Akun Admin BKPSDM
        User::create([
            'name' => 'Admin BKPSDM',
            'email' => 'admin@bkpsdm.go.id',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        // Akun Peserta Testing
        User::create([
            'name' => 'Peserta Test',
            'email' => 'peserta@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'peserta',
        ]);
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        Admin::create([
            'id' => '1',
            'name' => 'Super Admin',
            'email' => 'admin@piecebarber.com',
            'password' => Hash::make('password123'),
            'role' => 'superadmin',
        ]);

        Admin::create([
            'id' => '2',
            'name' => 'Admin Barbershop',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);
    }
}
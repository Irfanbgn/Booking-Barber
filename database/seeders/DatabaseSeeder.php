<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Pastikan tidak double call
        // $this->call(AdminSeeder::class);  // Hanya sekali
        
        // Atau jika butuh, panggil sekali saja
        $this->call(AdminSeeder::class);
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class barberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Barber::create([
        'name' => 'Budi Haircut',
        'specialist' => 'Fade & Pompadour',
        'bio' => 'Pengalaman 5 tahun di industri barber.'
    ]);
    }
}

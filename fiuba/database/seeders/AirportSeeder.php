<?php

namespace Database\Seeders;

use App\Models\Airport;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AirportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $airports = [
            'EZE',
            'AEP',
            'OTRO'
        ];

        foreach ($airports as $airport) {
            Airport::create(['name' => $airport, 'description' => '']);
        }
    }
}

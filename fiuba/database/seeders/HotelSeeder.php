<?php

namespace Database\Seeders;

use App\Models\Hotel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hotels = [
            ['name' => 'NO', 'description' => '', 'city_id' => 1],
            ['name' => 'YAMANAS', 'description' => '', 'city_id' => 2],
            ['name' => 'FUEGUINO', 'description' => '', 'city_id' => 2],
            ['name' => 'ALTO ANDINO', 'description' => '', 'city_id' => 2],
            ['name' => 'ALTOS DE USHUAIA', 'description' => '', 'city_id' => 2],
            ['name' => 'WYNDHAM', 'description' => '', 'city_id' => 2],
            ['name' => 'ARAKUR', 'description' => '', 'city_id' => 2],
            ['name' => 'LAS HAYAS', 'description' => '', 'city_id' => 2],
            ['name' => 'CAUQUENES', 'description' => '', 'city_id' => 2],
            ['name' => 'LOS ÑIRES', 'description' => '', 'city_id' => 2],
            ['name' => 'GRANDE HOTEL', 'description' => '', 'city_id' => 2],
            ['name' => 'HOSTAL DEL BOSQUE', 'description' => '', 'city_id' => 2],
            ['name' => 'CANAL BEAGLE', 'description' => '', 'city_id' => 2],
            ['name' => 'LOS ACEBOS', 'description' => '', 'city_id' => 2],
            ['name' => 'HOTEL TDF', 'description' => '', 'city_id' => 2],
            ['name' => 'LODGE 54', 'description' => '', 'city_id' => 2],
            ['name' => 'TOLKEYEN', 'description' => '', 'city_id' => 2],
            ['name' => 'LENNOX USH', 'description' => '', 'city_id' => 2],
            ['name' => 'HOLIDAY INN', 'description' => '', 'city_id' => 3],
            ['name' => 'POSADA DE LAS AGUILAS', 'description' => '', 'city_id' => 3],
            ['name' => 'LENNOX B.A', 'description' => '', 'city_id' => 3],
            ['name' => 'CANNING DESIGN', 'description' => '', 'city_id' => 3],
            ['name' => 'SCALA HOTEL', 'description' => '', 'city_id' => 3]
        ];

        foreach ($hotels as $hotel) {
            Hotel::create($hotel);
        }
    }
}

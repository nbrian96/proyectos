<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rooms = [
            'NO',
            'SGL',
            'DBL TWIN',
            'DBL MAT',
            'TPL TWIN'
        ];

        foreach ($rooms as $room) {
            Room::create(['name' => $room, 'description' => '']);
        }
    }
}

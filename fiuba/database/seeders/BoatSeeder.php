<?php

namespace Database\Seeders;

use App\Models\Boat;
use Illuminate\Database\Seeder;

class BoatSeeder extends Seeder
{
    public function run()
    {
        Boat::create([
            'name' => 'Sea Explorer',
            'flag' => 'Flag Value',
            'registration' => 'Registration Number',
            'call_sign' => 'Call Sign',
            'owner' => 'Owner Name',
            'total_length' => 100.00, 
            'gross_tonnage' => 200.00,
            'net_tonnage' => 150.00, 
            'beam' => 10.00, 
            'passenger_capacity' => 100, 
            'crew_capacity' => 20, 
            'status' => '1', 
        ]);
    }
}

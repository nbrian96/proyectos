<?php

namespace Database\Seeders;

use App\Models\EarlyLateType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EarlyLateTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            'NO',
            'ECI+FAP',
            'ECI+MAP',
            'ECI',
            'LCO',
            'LCO+MAP',
            'LCO+FAP',
            'ECI+FAP+LCO',
            'ECI+LCO S/MEAL'
        ];

        foreach ($types as $type) {
            EarlyLateType::create(['name' => $type, 'description' => '']);
        }
    }
}

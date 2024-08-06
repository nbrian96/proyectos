<?php

namespace Database\Seeders;

use App\Models\Tranfer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TranferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tranfers = [
            ['name' => 'NO', 'description' => '', 'type' => 1],
            ['name' => 'EZE-AEP', 'description' => '', 'type' => 2],
            ['name' => 'ASSIST EZE', 'description' => '', 'type' => 2],
            ['name' => 'ASSIST AEP', 'description' => '', 'type' => 2],
            ['name' => 'EZE-HTL-EZE', 'description' => '', 'type' => 2],
            ['name' => 'EZE-HTL-AEP', 'description' => '', 'type' => 2],
            ['name' => 'AEP-HTL-EZE', 'description' => '', 'type' => 2],
            ['name' => 'AEP-HTL-AEP', 'description' => '', 'type' => 2],
            ['name' => 'ATO-HTL-VSL', 'description' => '', 'type' => 3],
            ['name' => 'ATO-VSL', 'description' => '', 'type' => 3],
            ['name' => 'VSL-ATO', 'description' => '', 'type' => 4],
            ['name' => 'VSL-HTL', 'description' => '', 'type' => 4],
            ['name' => 'VSL-VSL', 'description' => '', 'type' => 4],
            ['name' => 'VSL-HTL-ATO', 'description' => '', 'type' => 4]
        ];

        foreach ($tranfers as $tranfer) {
            Tranfer::create($tranfer);
        }
    }
}

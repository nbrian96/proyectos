<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TypeProcedure;

class TypeProcedureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $procedures = [
            ['name' => 'Ninguno', 'description' => ''],
            ['name' => 'LOI', 'description' => 'Letter of invitation'],
            ['name' => 'OKTB', 'description' => 'OK to board letter'],
            ['name' => 'GUEST', 'description' => ''],
            ['name' => 'ARS', 'description' => 'Son tripulantes Argentinos: no requieren ningun tramite especial']
        ];

        foreach ($procedures as $procedure) {
            TypeProcedure::create($procedure);
        }
    }
}

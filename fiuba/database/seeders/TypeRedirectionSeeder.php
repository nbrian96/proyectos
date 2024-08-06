<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TypeRedirection;

class TypeRedirectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            'None',
            'RECON',
            'TURISTA',
            'ARG',
            'TRANSHIPPING',
            'MEDIBARC/RECON',
            'DESEMB MALVINAS'
        ];

        foreach ($types as $type) {
            TypeRedirection::create(['name' => $type, 'description' => '']);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(BoatSeeder::class);
        $this->call(TypeProcedureSeeder::class);
        $this->call(TypeRedirectionSeeder::class);
        $this->call(RankSeeder::class);
        $this->call(TranferSeeder::class);
        $this->call(HotelSeeder::class);
        $this->call(EarlyLateTypeSeeder::class);
        $this->call(RoomSeeder::class);
        $this->call(AirportSeeder::class);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        function createUser($name, $email, $password, $roles = [])
        {
            $user = User::create([
                'name' => $name,
                'email' => $email,
                'password' => bcrypt($password),
            ]);

            if (!empty($roles)) {
                $user->roles()->sync($roles);
            }

            return $user;
        }

        createUser('Mr Brian', 'nbrian.avila96@gmail.com', '123456789', ["1", "2"]);
        createUser('Edrian Castillo', 'edriancc@gmail.com', '123456789', ["1", "2"]);
        createUser('Marcelo Maldonado', 'marcelo@ushuaiashipping.com', '123456789', ["1", "2"]);
        createUser('Valentina Gianotti', 'valentina@ushuaiashipping.com', '123456789');

        //User::factory()->count(5)->create();
    }
}

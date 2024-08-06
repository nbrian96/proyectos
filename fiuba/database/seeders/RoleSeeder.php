<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'User']);

        $permission = Permission::create(['name' => 'home'])->syncRoles([$role1,$role2]);

        $permission = Permission::create(['name' => 'users.index'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'users.create'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'users.edit'])->syncRoles([$role1]);

        $permission = Permission::create(['name' => 'roles.index'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'roles.create'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'roles.edit'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'roles.show'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'roles.destroy'])->syncRoles([$role1]);
            
    }
}

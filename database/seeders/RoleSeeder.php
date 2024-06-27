<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run()
    {
        // Buat permissions
        Permission::create(['name' => 'manage users']);
        Permission::create(['name' => 'manage posts']);

        // Buat roles dan assign permissions
        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo(['manage users', 'manage posts']);

        $mayarakatRole = Role::create(['name' => 'mayarakat']);

        $pegawaiDinasRole = Role::create(['name' => 'pegawai dinas']);
        $pegawaiIndividuRole = Role::create(['name' => 'pegawai individu']);
    }
}

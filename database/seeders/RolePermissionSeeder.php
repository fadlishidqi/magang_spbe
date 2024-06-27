<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        // Buat permissions
        Permission::create(['name' => 'manage users']);
        Permission::create(['name' => 'manage posts']);
        Permission::create(['name' => 'bikin laporan']);

        // Buat roles dan assign permissions
        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo(['manage users', 'manage posts']);

        $masyarakatRole = Role::create(['name' => 'masyarakat']);
        $masyarakatRole->givePermissionTo('bikin laporan');

        $pegawaiDinasRole = Role::create(['name' => 'pegawai dinas']);
        $pegawaiIndividuRole = Role::create(['name' => 'pegawai individu']);
    }
}


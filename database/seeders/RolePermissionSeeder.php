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
        Permission::create(['name' => 'punya admin']);
        Permission::create(['name' => 'punya masyarakat']);
        Permission::create(['name' => 'punya dinas']);
        Permission::create(['name' => 'punya individu']);

        // Buat roles dan assign permissions
        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo(['punya admin']);

        $masyarakatRole = Role::create(['name' => 'masyarakat']);
        $masyarakatRole->givePermissionTo('punya masyarakat');

        $pegawaiDinasRole = Role::create(['name' => 'pegawai dinas']);
        $pegawaiDinasRole->givePermissionTo('punya dinas');

        $pegawaiIndividuRole = Role::create(['name' => 'pegawai individu']);
        $pegawaiIndividuRole->givePermissionTo('punya individu');
    }
}


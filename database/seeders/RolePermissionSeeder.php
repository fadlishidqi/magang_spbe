<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        // Buat permissions
        $permissions = [
            'mengedit faq',
            'melihat faq',
            'mengedit layanan',
            'membuat layanan dinas',
            'membuat layanan individu',
            'mengedit laporan',
            'membuat laporan',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Buat roles
        $masyarakatRole = Role::firstOrCreate(['name' => 'masyarakat']);
        $masyarakatPermissions = [
            'melihat faq',
            'membuat laporan',
        ];
        $masyarakatRole->syncPermissions($masyarakatPermissions);

        $pegawaiDinasRole = Role::firstOrCreate(['name' => 'pegawai_dinas']);
        $pegawaiDinasPermissions = [
            'melihat faq',
            'membuat laporan',
            'membuat layanan dinas',
        ];
        $pegawaiDinasRole->syncPermissions($pegawaiDinasPermissions);

        $pegawaiIndividuRole = Role::firstOrCreate(['name' => 'pegawai_individu']);
        $pegawaiIndividuPermissions = [
            'melihat faq',
            'membuat laporan',
            'membuat layanan individu',
        ];
        $pegawaiIndividuRole->syncPermissions($pegawaiIndividuPermissions);

        $superAdminRole = Role::firstOrCreate(['name' => 'super_admin']);

        $user = User::create([
            'name' => 'Super Admin',
            'username' => 'admin',
            'password' => bcrypt('rahasia'),
            'email' => 'admin@gmail.com',
            'status' => 'approved'
        ]);
        $user->assignRole($superAdminRole);
    }
}

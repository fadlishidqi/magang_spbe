<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::findByName('admin', 'web');
        $masyarakatRole = Role::findByName('masyarakat', 'web');

        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@spbe.com',
            'password' => bcrypt('admin'),
        ]);
        $admin->assignRole('admin');

        $dinas = User::create([
            'name' => 'Jon',
            'email' => 'jon@din.com',
            'password' => bcrypt('jon'),
        ]);
        $dinas->assignRole('pegawai dinas');

        $masyarakat = User::create([
            'name' => 'Kiki',
            'email' => 'kiki@mas.com',
            'password' => bcrypt('kiki'),
        ]);
        $masyarakat->assignRole('masyarakat');

        $individu = User::create([
            'name' => 'Riezqi',
            'email' => 'riez@indi.com',
            'password' => bcrypt('riez'),
        ]);
        $individu->assignRole('pegawai individu');
    }
}
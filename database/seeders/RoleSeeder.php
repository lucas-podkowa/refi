<?php

namespace Database\Seeders;

use App\Models\User;
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
        $admin = Role::create(['name' => 'Administrador']);
        $docente = Role::create(['name' => 'Docente']);
        $visitante = Role::create(['name' => 'Visitante']);

        Permission::create(['name' => 'asignaturas'])->assignRole($admin);;
        Permission::create(['name' => 'eventos'])->syncRoles([$admin, $docente]);
        Permission::create(['name' => 'carreras'])->assignRole($admin);
        Permission::create(['name' => 'dictadosComunes'])->assignRole($admin);

        User::factory()->create([
            'name' => 'Usuario Docente',
            'email' => 'profe@profe.com',
            'password' => bcrypt('hh1y32gg')
        ])->assignRole('Docente');

        User::factory()->create([
            'name' => 'Usuario Administrador',
            'email' => 'mail@mail.com',
            'password' => bcrypt('hh1y32gg')
        ])->assignRole('Administrador');

    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
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
        $funcional = Role::create(['name' => 'Funcional']);

        Permission::create(['name' => 'asignaturas'])->syncRoles($admin, $funcional);
        Permission::create(['name' => 'eventos'])->syncRoles([$admin, $docente]);
        Permission::create(['name' => 'carreras'])->syncRoles($admin, $funcional);
        Permission::create(['name' => 'dictadosComunes'])->syncRoles($admin, $funcional);
        Permission::create(['name' => 'usuarios'])->syncRoles($admin);

        User::factory()->create([
            'name' => 'Usuario Docente',
            'email' => 'docente@mail.com',
            'password' => bcrypt('hh1y32gg')
        ])->assignRole('Docente');

        User::factory()->create([
            'name' => 'Usuario Administrador',
            'email' => 'mail@mail.com',
            'password' => bcrypt('hh1y32gg')
        ])->assignRole('Administrador');

        User::factory()->create([
            'name' => 'Usuario Funcional',
            'email' => 'funcional@mail.com',
            'password' => bcrypt('hh1y32gg')
        ])->assignRole('Funcional');
    }
}

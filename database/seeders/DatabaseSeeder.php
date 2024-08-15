<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        

        DB::table('actividad')->insert([
            ['nombre' => 'Examen Final', 'codigo' => 'EF'],
            ['nombre' => 'Examen Parcial', 'codigo' => 'EP'],
            ['nombre' => 'Presentación', 'codigo' => 'PRES']
        ]);

        DB::table('dictado')->insert([
            ['nombre' => 'Anual'],
            ['nombre' => '1º C.'],
            ['nombre' => '2º C.']
        ]);

        DB::table('turno')->insert([
            ['nombre' => 'Mañana'],
            ['nombre' => 'Tarde']
        ]);

        DB::table('carrera')->insert(
            [
                ['codigo' => 'CI', 'nombre' => 'Ingeniería Civil'], //1
                ['codigo' => 'EM', 'nombre' => 'Ingeniería Electromecánica'], //2
                ['codigo' => 'ET', 'nombre' => 'Ingeniería Electrónica'], //3
                ['codigo' => 'IN', 'nombre' => 'Ingeniería Industrial'], //4
                ['codigo' => 'IC', 'nombre' => 'Ingeniería en Computación'], //5
                ['codigo' => 'IM', 'nombre' => 'Ingeniería Mecatrónica'], //6
                ['codigo' => 'LHyST', 'nombre' => 'Licenciatura en Higiene y Seguridad en el Trabajo'], //7
            ]
        );

        $this->call(RoleSeeder::class);
        $this->call(AsignaturaSeeder::class);
        $this->call(EquivalenciaSeeder::class);

 
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Carrera;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Carrera>
 */
class CarreraFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     
    protected $model = Carrera::class;
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->name(),
            'codigo' => substr($this->faker->word(), 0, 8)
        ];
    }
}

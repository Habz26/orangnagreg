<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ruangan>
 */
class RuanganFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_ruangan' => $this->faker->word(),
            'kode_ruangan' => $this->faker->unique()->bothify('RNG-###'),
            'bangunan_id' => \App\Models\Bangunan::factory(), // relasi otomatis
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bangunan>
 */
class BangunanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_bangunan' => $this->faker->word(),
            'kode_bangunan' => $this->faker->unique()->bothify('BGN-###'),
            'tanah_id' => \App\Models\Tanah::factory(), // relasi otomatis
        ];
    }
}

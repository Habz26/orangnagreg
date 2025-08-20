<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Barang>
 */
class BarangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
    'nama_barang' => fake()->word(),
    'kode_inventaris' => fake()->unique()->bothify('INV-###'),
    'kategori_id' => \App\Models\Kategori::factory(), // auto bikin kategori dan ambil id
    'ruangan_id' => \App\Models\Ruangan::factory(),   // auto bikin ruangan dan ambil id
    'tahun_pengadaan' => fake()->year(),
    'sumber_dana' => fake()->randomElement(['APBD', 'Donasi', 'BOS', 'Rakyat']),
    'kondisi' => fake()->randomElement(['Baik', 'Rusak Ringan', 'Rusak Berat']),
    ];

    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class MasukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ket_pemasukan' => fake()->randomElements(['Daftar Kursus Komputer', 'Daftar Kursus Mengemudi', 'Daftar Kursus Digital Marketing', 'Daftar Kursus Pemrograman', 'Daftar Kursus Desain Grafis'])[0],
            'jumlah_pemasukan' => fake()->randomElements(['200000', '300000', '400000', '500000'])[0]
        ];
    }
}

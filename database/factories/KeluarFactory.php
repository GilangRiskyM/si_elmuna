<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Keluar>
 */
class KeluarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ket_pengeluaran' => fake()->firstName(),
            'jumlah_pengeluaran' => fake()->randomElements(['1500', '2500'])[0]
        ];
    }
}

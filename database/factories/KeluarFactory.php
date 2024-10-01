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
            'ket_pengeluaran' => fake()->randomElements(['ATK', 'Air', 'WiFi', 'Kertas', 'Tinta', 'Listrik'])[0],
            'jumlah_pengeluaran' => fake()->randomElements(['1500', '2000', '2500', '5000', '300000'])[0]
        ];
    }
}

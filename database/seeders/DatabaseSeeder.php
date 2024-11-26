<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Masuk;
use App\Models\Keluar;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::factory()->create([
            'name' => 'Admin[Demo]',
            'email' => 'admin@demo.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$anCyVyyvzSw5DF4aycNXluTyhnOJmx8TYIGU7ldC391rZ0bdbvvc.', // password
        ]);


        //fake data hari ini
        Masuk::factory(10)->create([
            'created_at' => Carbon::today()
        ]);
        Keluar::factory(10)->create([
            'created_at' => Carbon::today()
        ]);

        //fake data kemarin
        Masuk::factory(10)->create([
            'created_at' => Carbon::yesterday()
        ]);
        Keluar::factory(10)->create([
            'created_at' => Carbon::yesterday()
        ]);

        //fake data minggu ini
        Masuk::factory(10)->create([
            'created_at' => Carbon::now()->startOfWeek()
        ])->each(function ($post) {
            $post->created_at = $post->created_at->addMinutes(rand(1, 1440 * 6));
            $post->save();
        });
        Keluar::factory(10)->create([
            'created_at' => Carbon::now()->startOfWeek()
        ])->each(function ($post) {
            $post->created_at = $post->created_at->addMinutes(rand(1, 1440 * 6));
            $post->save();
        });

        //fake data minggu lalu
        Masuk::factory(10)->create([
            'created_at' => Carbon::now()->subWeek()->startOfWeek()
        ])->each(function ($post) {
            $post->created_at = $post->created_at->addMinutes(rand(1, 1440 * 6));
            $post->save();
        });
        Keluar::factory(10)->create([
            'created_at' => Carbon::now()->subWeek()->startOfWeek()
        ])->each(function ($post) {
            $post->created_at = $post->created_at->addMinutes(rand(1, 1440 * 6));
            $post->save();
        });

        //fake data bulan ini
        Masuk::factory(10)->create([
            'created_at' => Carbon::now()->startOfMonth()
        ])->each(function ($post) {
            $post->created_at = $post->created_at->addMinutes(rand(1, 1440 * 30));
            $post->save();
        });
        Keluar::factory(10)->create([
            'created_at' => Carbon::now()->startOfMonth()
        ])->each(function ($post) {
            $post->created_at = $post->created_at->addMinutes(rand(1, 1440 * 30));
            $post->save();
        });

        //fake data bulan lalu
        Masuk::factory(10)->create([
            'created_at' => Carbon::now()->subMonth()->startOfMonth()
        ])->each(function ($post) {
            $post->created_at = $post->created_at->addMinutes(rand(1, 1440 * 30));
            $post->save();
        });
        Keluar::factory(10)->create([
            'created_at' => Carbon::now()->subMonth()->startOfMonth()
        ])->each(function ($post) {
            $post->created_at = $post->created_at->addMinutes(rand(1, 1440 * 30));
            $post->save();
        });

        //fake data tahun ini
        Masuk::factory(10)->create([
            'created_at' => Carbon::now()->startOfYear()
        ])->each(function ($post) {
            $post->created_at = $post->created_at->addMinutes(rand(1, 1440 * 365));
            $post->save();
        });
        Keluar::factory(10)->create([
            'created_at' => Carbon::now()->startOfYear()
        ])->each(function ($post) {
            $post->created_at = $post->created_at->addMinutes(rand(1, 1440 * 365));
            $post->save();
        });

        //fake data tahun lalu
        Masuk::factory(10)->create([
            'created_at' => Carbon::now()->subYear()->startOfYear()
        ])->each(function ($post) {
            $post->created_at = $post->created_at->addMinutes(rand(1, 1440 * 365));
            $post->save();
        });
        Keluar::factory(10)->create([
            'created_at' => Carbon::now()->subYear()->startOfYear()
        ])->each(function ($post) {
            $post->created_at = $post->created_at->addMinutes(rand(1, 1440 * 365));
            $post->save();
        });
    }
}

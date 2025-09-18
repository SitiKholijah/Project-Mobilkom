<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Panggil AssetSeeder yang sudah kita buat
        $this->call([
            AssetSeeder::class,
        ]);
    }
}
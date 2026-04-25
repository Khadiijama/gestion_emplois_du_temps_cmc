<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            FiliereSeeder::class,
            SalleSeeder::class,
            FormateurSeeder::class,
            GroupeSeeder::class,
            SeanceSeeder::class
        ]);
    }
}

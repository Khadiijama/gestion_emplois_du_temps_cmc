<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            FiliereSeeder::class,
            SalleSeeder::class,
            UserSeeder::class,
            GroupeSeeder::class,
            // FormateurGroupeSeeder désactivé car la table n'existe pas
            SeanceSeeder::class,
        ]);
    }
}

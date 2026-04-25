<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Salle;

class SalleSeeder extends Seeder
{
    public function run(): void
    {
        $salles = [
            ['code' => 'SC-01', 'type' => 'SC', 'capacite' => 30],
            ['code' => 'SC-02', 'type' => 'SC', 'capacite' => 30],
            ['code' => 'SC-03', 'type' => 'SC', 'capacite' => 30],
            ['code' => 'SC-04', 'type' => 'SC', 'capacite' => 30],
            ['code' => 'SC-05', 'type' => 'SC', 'capacite' => 30],
            ['code' => 'SC-06', 'type' => 'SC', 'capacite' => 30],
            ['code' => 'SM-01', 'type' => 'SM', 'capacite' => 25],
            ['code' => 'SM-02', 'type' => 'SM', 'capacite' => 25],
            ['code' => 'SM-03', 'type' => 'SM', 'capacite' => 25],
            ['code' => 'SM-04', 'type' => 'SM', 'capacite' => 25],
            ['code' => 'SM-05', 'type' => 'SM', 'capacite' => 25],
            ['code' => 'SM-06', 'type' => 'SM', 'capacite' => 25],
            ['code' => 'SM-07', 'type' => 'SM', 'capacite' => 25],
            ['code' => 'SM-08', 'type' => 'SM', 'capacite' => 20],
            ['code' => 'SM-09', 'type' => 'SM', 'capacite' => 20],
            ['code' => 'SM-10', 'type' => 'SM', 'capacite' => 20],
        ];

        foreach ($salles as $salle) {
            Salle::create($salle);
        }

        $this->command->info('✅ Salles créées : ' . count($salles));
    }
}

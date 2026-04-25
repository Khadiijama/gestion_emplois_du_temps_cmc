<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Salle;

class SalleSeeder extends Seeder
{
    public function run(): void
    {
        // 6 Salles de Cours (SC) - selon le CDC
        $sallesCours = [
            ['code' => 'SC-01', 'type' => 'Salle de Cours', 'capacite' => 30],
            ['code' => 'SC-02', 'type' => 'Salle de Cours', 'capacite' => 30],
            ['code' => 'SC-03', 'type' => 'Salle de Cours', 'capacite' => 30],
            ['code' => 'SC-04', 'type' => 'Salle de Cours', 'capacite' => 30],
            ['code' => 'SC-05', 'type' => 'Salle de Cours', 'capacite' => 30],
            ['code' => 'SC-06', 'type' => 'Salle de Cours', 'capacite' => 30],
        ];

        // 10 Salles Multimédia (SM) - selon le CDC
        $sallesMultimedia = [
            ['code' => 'SM-01', 'type' => 'Salle Multimédia', 'capacite' => 25],
            ['code' => 'SM-02', 'type' => 'Salle Multimédia', 'capacite' => 25],
            ['code' => 'SM-03', 'type' => 'Salle Multimédia', 'capacite' => 25],
            ['code' => 'SM-04', 'type' => 'Salle Multimédia', 'capacite' => 25],
            ['code' => 'SM-05', 'type' => 'Salle Multimédia', 'capacite' => 25],
            ['code' => 'SM-06', 'type' => 'Salle Multimédia', 'capacite' => 25],
            ['code' => 'SM-07', 'type' => 'Salle Multimédia', 'capacite' => 25],
            ['code' => 'SM-08', 'type' => 'Salle Multimédia', 'capacite' => 25],
            ['code' => 'SM-09', 'type' => 'Salle Multimédia', 'capacite' => 25],
            ['code' => 'SM-10', 'type' => 'Salle Multimédia', 'capacite' => 25],
        ];

        foreach (array_merge($sallesCours, $sallesMultimedia) as $salle) {
            Salle::create($salle);
        }
    }
}

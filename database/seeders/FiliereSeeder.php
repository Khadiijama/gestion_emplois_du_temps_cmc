<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Filiere;

class FiliereSeeder extends Seeder
{
    public function run(): void
    {
        $filieres = [
            // ─── 1ère année ───────────────────────
            ['nom' => 'Digital Design', 'option' => null, 'niveau' => '1ère année'],
            ['nom' => 'Développement Digital', 'option' => null, 'niveau' => '1ère année'],
            ['nom' => 'Intelligence Artificielle', 'option' => null, 'niveau' => '1ère année'],
            ['nom' => 'Infrastructure Digitale', 'option' => null, 'niveau' => '1ère année'],

            // ─── 2ème année ───────────────────
            ['nom' => 'Digital Design', 'option' => 'UI Designer', 'niveau' => '2ème année'],
            ['nom' => 'Digital Design', 'option' => 'UX Designer', 'niveau' => '2ème année'],
            ['nom' => 'Développement Digital', 'option' => 'Applications Mobiles', 'niveau' => '2ème année'],
            ['nom' => 'Développement Digital', 'option' => 'Web Full Stack', 'niveau' => '2ème année'],
            ['nom' => 'Intelligence Artificielle', 'option' => 'Assistant Data Analyst', 'niveau' => '2ème année'],
            ['nom' => 'Intelligence Artificielle', 'option' => 'Développeur Chatbots', 'niveau' => '2ème année'],
            ['nom' => 'Infrastructure Digitale', 'option' => 'Cyber Sécurité', 'niveau' => '2ème année'],
            ['nom' => 'Infrastructure Digitale', 'option' => 'Systèmes et Réseaux', 'niveau' => '2ème année'],
        ];

        foreach ($filieres as $filiere) {
            Filiere::create($filiere);
        }

        $this->command->info('✅ Filières créées : ' . count($filieres));
    }
}

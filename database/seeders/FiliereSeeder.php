<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Filiere;

class FiliereSeeder extends Seeder
{
    public function run(): void
    {
        // Filières exactement conformes au Cahier des Charges
        // 1ère année
        $filieres = [
            // ── Digital Design ──
            ['niveau' => '1ère année', 'nom' => 'Digital Design', 'option' => 'UI Designer'],
            ['niveau' => '1ère année', 'nom' => 'Digital Design', 'option' => 'UX Designer'],

            // ── Développement Digital ──
            ['niveau' => '1ère année', 'nom' => 'Développement Digital', 'option' => 'Web Full Stack'],
            ['niveau' => '1ère année', 'nom' => 'Développement Digital', 'option' => 'Applications Mobiles'],

            // ── Intelligence Artificielle ──
            ['niveau' => '1ère année', 'nom' => 'Intelligence Artificielle', 'option' => null],

            // ── Infrastructure Digitale ──
            ['niveau' => '1ère année', 'nom' => 'Infrastructure Digitale', 'option' => 'Cyber sécurité'],
            ['niveau' => '1ère année', 'nom' => 'Infrastructure Digitale', 'option' => 'Systèmes et Réseaux'],

            // 2ème année
            // ── Digital Design ──
            ['niveau' => '2ème année', 'nom' => 'Digital Design', 'option' => 'UI Designer'],
            ['niveau' => '2ème année', 'nom' => 'Digital Design', 'option' => 'UX Designer'],

            // ── Développement Digital ──
            ['niveau' => '2ème année', 'nom' => 'Développement Digital', 'option' => 'Web Full Stack'],
            ['niveau' => '2ème année', 'nom' => 'Développement Digital', 'option' => 'Applications Mobiles'],

            // ── Intelligence Artificielle ──
            ['niveau' => '2ème année', 'nom' => 'Intelligence Artificielle', 'option' => 'Assistant Data Analyst'],
            ['niveau' => '2ème année', 'nom' => 'Intelligence Artificielle', 'option' => 'Développeur Chatbots'],

            // ── Infrastructure Digitale ──
            ['niveau' => '2ème année', 'nom' => 'Infrastructure Digitale', 'option' => 'Cyber sécurité'],
            ['niveau' => '2ème année', 'nom' => 'Infrastructure Digitale', 'option' => 'Systèmes et Réseaux'],
        ];

        foreach ($filieres as $f) {
            Filiere::create($f);
        }
    }
}

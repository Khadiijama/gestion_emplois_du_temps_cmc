<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Groupe;
use App\Models\Filiere;
use App\Models\User;

class GroupeSeeder extends Seeder
{
    public function run(): void
    {
        // Groupes pour 1ère année
        $groupes1 = [
            // Digital Design
            ['code' => 'DD-UI-101', 'filiere' => ['nom' => 'Digital Design', 'option' => 'UI Designer',      'niveau' => '1ère année'], 'annee' => '2025/2026'],
            ['code' => 'DD-UX-101', 'filiere' => ['nom' => 'Digital Design', 'option' => 'UX Designer',      'niveau' => '1ère année'], 'annee' => '2025/2026'],

            // Développement Digital
            ['code' => 'DEVWFS101', 'filiere' => ['nom' => 'Développement Digital', 'option' => 'Web Full Stack',        'niveau' => '1ère année'], 'annee' => '2025/2026'],
            ['code' => 'DEVMOB101', 'filiere' => ['nom' => 'Développement Digital', 'option' => 'Applications Mobiles', 'niveau' => '1ère année'], 'annee' => '2025/2026'],

            // Intelligence Artificielle
            ['code' => 'IA-101',    'filiere' => ['nom' => 'Intelligence Artificielle', 'option' => null, 'niveau' => '1ère année'], 'annee' => '2025/2026'],

            // Infrastructure Digitale
            ['code' => 'CYBER-101', 'filiere' => ['nom' => 'Infrastructure Digitale', 'option' => 'Cyber sécurité',       'niveau' => '1ère année'], 'annee' => '2025/2026'],
            ['code' => 'SR-101',    'filiere' => ['nom' => 'Infrastructure Digitale', 'option' => 'Systèmes et Réseaux',  'niveau' => '1ère année'], 'annee' => '2025/2026'],
        ];

        // Groupes pour 2ème année
        $groupes2 = [
            // Digital Design
            ['code' => 'DD-UI-201', 'filiere' => ['nom' => 'Digital Design', 'option' => 'UI Designer',      'niveau' => '2ème année'], 'annee' => '2025/2026'],
            ['code' => 'DD-UX-201', 'filiere' => ['nom' => 'Digital Design', 'option' => 'UX Designer',      'niveau' => '2ème année'], 'annee' => '2025/2026'],

            // Développement Digital
            ['code' => 'DEVWFS201', 'filiere' => ['nom' => 'Développement Digital', 'option' => 'Web Full Stack',        'niveau' => '2ème année'], 'annee' => '2025/2026'],
            ['code' => 'DEVMOB201', 'filiere' => ['nom' => 'Développement Digital', 'option' => 'Applications Mobiles', 'niveau' => '2ème année'], 'annee' => '2025/2026'],

            // Intelligence Artificielle
            ['code' => 'IA-DA-201', 'filiere' => ['nom' => 'Intelligence Artificielle', 'option' => 'Assistant Data Analyst',  'niveau' => '2ème année'], 'annee' => '2025/2026'],
            ['code' => 'IA-CB-201', 'filiere' => ['nom' => 'Intelligence Artificielle', 'option' => 'Développeur Chatbots',    'niveau' => '2ème année'], 'annee' => '2025/2026'],

            // Infrastructure Digitale
            ['code' => 'CYBER-201', 'filiere' => ['nom' => 'Infrastructure Digitale', 'option' => 'Cyber sécurité',       'niveau' => '2ème année'], 'annee' => '2025/2026'],
            ['code' => 'SR-201',    'filiere' => ['nom' => 'Infrastructure Digitale', 'option' => 'Systèmes et Réseaux',  'niveau' => '2ème année'], 'annee' => '2025/2026'],
        ];

        $allGroupes = array_merge($groupes1, $groupes2);

        foreach ($allGroupes as $g) {
            $filiere = Filiere::where('nom', $g['filiere']['nom'])
                ->where('niveau', $g['filiere']['niveau'])
                ->where('option', $g['filiere']['option'])
                ->first();

            if ($filiere) {
                $groupe = Groupe::create([
                    'code'       => $g['code'],
                    'filiere_id' => $filiere->id,
                    'annee'      => $g['annee'],
                ]);

                // Create a stagiaire user for each group
                User::create([
                    'name'      => 'Stagiaire ' . $g['code'],
                    'email'     => strtolower($g['code']) . '@cmc.ma',
                    'password'  => bcrypt('password'),
                    'role'      => 'stagiaire',
                    'groupe_id' => $groupe->id,
                ]);
            }
        }
    }
}

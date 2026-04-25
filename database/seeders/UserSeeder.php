<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Formateur;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // ─── Administrateur ──────────────────────────────────────────
        User::create([
            'name'     => 'Administrateur CMC',
            'email'    => 'admin@cmc-rsk.ma',
            'password' => Hash::make('Admin@2025'),
            'role'     => 'admin',
        ]);

        // ─── Formateurs ──────────────────────────────────────────────
        $formateurs = [
            [
                'name'       => 'FRITET IMANE',
                'nom'        => 'FRITET',
                'prenom'     => 'IMANE',
                'email'      => 'imane.fritet@cmc-rsk.ma',
                'matricule'  => 'FOR001',
                'specialite' => 'Web Full Stack / Laravel',
                'telephone'  => '0600000001',
            ],
            [
                'name'       => 'GUELSA MOUNA',
                'nom'        => 'GUELSA',
                'prenom'     => 'MOUNA',
                'email'      => 'mouna.guelsa@cmc-rsk.ma',
                'matricule'  => 'FOR002',
                'specialite' => 'Développement Web / Frontend',
                'telephone'  => '0600000002',
            ],
            [
                'name'       => 'BENALI KARIM',
                'nom'        => 'BENALI',
                'prenom'     => 'KARIM',
                'email'      => 'karim.benali@cmc-rsk.ma',
                'matricule'  => 'FOR003',
                'specialite' => 'Intelligence Artificielle / Python',
                'telephone'  => '0600000003',
            ],
            [
                'name'       => 'RACHIDI SARA',
                'nom'        => 'RACHIDI',
                'prenom'     => 'SARA',
                'email'      => 'sara.rachidi@cmc-rsk.ma',
                'matricule'  => 'FOR004',
                'specialite' => 'Développement Mobile',
                'telephone'  => '0600000004',
            ],
            [
                'name'       => 'TAHIRI YOUSSEF',
                'nom'        => 'TAHIRI',
                'prenom'     => 'YOUSSEF',
                'email'      => 'youssef.tahiri@cmc-rsk.ma',
                'matricule'  => 'FOR005',
                'specialite' => 'Cyber Sécurité',
                'telephone'  => '0600000005',
            ],
            [
                'name'       => 'ALAOUI NADIA',
                'nom'        => 'ALAOUI',
                'prenom'     => 'NADIA',
                'email'      => 'nadia.alaoui@cmc-rsk.ma',
                'matricule'  => 'FOR006',
                'specialite' => 'Data Science',
                'telephone'  => '0600000006',
            ],
            [
                'name'       => 'BERRADA OMAR',
                'nom'        => 'BERRADA',
                'prenom'     => 'OMAR',
                'email'      => 'omar.berrada@cmc-rsk.ma',
                'matricule'  => 'FOR007',
                'specialite' => 'DevOps / Cloud',
                'telephone'  => '0600000007',
            ],
            [
                'name'       => 'LAMRANI HIND',
                'nom'        => 'LAMRANI',
                'prenom'     => 'HIND',
                'email'      => 'hind.lamrani@cmc-rsk.ma',
                'matricule'  => 'FOR008',
                'specialite' => 'UI/UX Design',
                'telephone'  => '0600000008',
            ],
        ];

        foreach ($formateurs as $f) {
            $formateur = Formateur::create([
                'matricule'  => $f['matricule'],
                'nom'        => $f['nom'],
                'prenom'     => $f['prenom'],
                'email'      => $f['email'],
                'specialite' => $f['specialite'],
                'telephone'  => $f['telephone'],
            ]);

            User::create([
                'name'         => $f['name'],
                'email'        => $f['email'],
                'password'     => Hash::make('Formateur@2025'),
                'role'         => 'formateur',
                'formateur_id' => $formateur->id,
            ]);
        }

        // ─── Stagiaires ──────────────────────────────────────────────
        $stagiaires = [
            ['name' => 'MAAZ KHADIJA', 'email' => 'khadija.maaz@cmc-rsk.ma'],
            ['name' => 'IDRISSI YASSINE', 'email' => 'yassine.idrissi@cmc-rsk.ma'],
            ['name' => 'STAGIAIRE TEST', 'email' => 'stagiaire@cmc-rsk.ma'],
        ];

        foreach ($stagiaires as $s) {
            User::create([
                'name'     => $s['name'],
                'email'    => $s['email'],
                'password' => Hash::make('Stagiaire@2025'),
                'role'     => 'stagiaire',
            ]);
        }

        $this->command->info('✅ Users et Formateurs créés.');
    }
}

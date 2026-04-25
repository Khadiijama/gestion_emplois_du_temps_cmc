<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Formateur;
use App\Models\User;

class FormateurSeeder extends Seeder
{
    public function run(): void
    {
        $formateurs = [
            // Formateurs Développement Digital / Web
            ['matricule' => 'F001', 'nom' => 'FRITET',    'prenom' => 'IMANE',    'email' => 'imane.fritet@ofppt.ma',    'telephone' => '0600000001', 'specialite' => 'Développement Web Full Stack'],
            ['matricule' => 'F002', 'nom' => 'GUELSA',    'prenom' => 'MOUNA',    'email' => 'mouna.guelsa@ofppt.ma',    'telephone' => '0600000002', 'specialite' => 'Bases de données'],
            ['matricule' => 'F003', 'nom' => 'BENNANI',   'prenom' => 'YOUSSEF',  'email' => 'youssef.bennani@ofppt.ma', 'telephone' => '0600000003', 'specialite' => 'Développement Mobile'],
            ['matricule' => 'F004', 'nom' => 'ALAOUI',    'prenom' => 'SARA',     'email' => 'sara.alaoui@ofppt.ma',     'telephone' => '0600000004', 'specialite' => 'UI/UX Design'],
            ['matricule' => 'F005', 'nom' => 'TAZI',      'prenom' => 'HAMID',    'email' => 'hamid.tazi@ofppt.ma',      'telephone' => '0600000005', 'specialite' => 'Intelligence Artificielle'],
            ['matricule' => 'F006', 'nom' => 'FASSI',     'prenom' => 'NADIA',    'email' => 'nadia.fassi@ofppt.ma',     'telephone' => '0600000006', 'specialite' => 'Data Science & Machine Learning'],
            ['matricule' => 'F007', 'nom' => 'CHRAIBI',   'prenom' => 'OMAR',     'email' => 'omar.chraibi@ofppt.ma',    'telephone' => '0600000007', 'specialite' => 'Cyber sécurité'],
            ['matricule' => 'F008', 'nom' => 'LAZRAK',    'prenom' => 'FATIMA',   'email' => 'fatima.lazrak@ofppt.ma',   'telephone' => '0600000008', 'specialite' => 'Réseaux et Systèmes'],
            ['matricule' => 'F009', 'nom' => 'KETTANI',   'prenom' => 'KHALID',   'email' => 'khalid.kettani@ofppt.ma',  'telephone' => '0600000009', 'specialite' => 'Digital Design Graphique'],
            ['matricule' => 'F010', 'nom' => 'BERRADA',   'prenom' => 'LATIFA',   'email' => 'latifa.berrada@ofppt.ma',  'telephone' => '0600000010', 'specialite' => 'DevOps & Cloud'],
        ];

        foreach ($formateurs as $info) {
            $f = Formateur::create($info);
            User::create([
                'name'         => $f->nom . ' ' . $f->prenom,
                'email'        => $f->email,
                'password'     => bcrypt('password'),
                'role'         => 'formateur',
                'formateur_id' => $f->id,
            ]);
        }

        // Compte administrateur
        User::create([
            'name'     => 'Administrateur',
            'email'    => 'admin@cmc.ma',
            'password' => bcrypt('password'),
            'role'     => 'admin',
        ]);
    }
}

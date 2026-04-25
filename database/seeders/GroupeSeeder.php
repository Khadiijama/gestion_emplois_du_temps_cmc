<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Filiere;
use App\Models\Groupe;
use App\Models\User;

class GroupeSeeder extends Seeder
{
    public function run(): void
    {
        // Helper pour trouver une filière par nom et option
        $findFiliere = function($nom, $option = null) {
            return Filiere::where('nom', $nom)->where('option', $option)->first();
        };

        $devowfs = $findFiliere('Développement Digital', 'Web Full Stack');
        $devoam  = $findFiliere('Développement Digital', 'Applications Mobiles');
        $devd    = $findFiliere('Développement Digital', null);
        $digd    = $findFiliere('Digital Design', null);
        $digdui  = $findFiliere('Digital Design', 'UI Designer');
        $digdux  = $findFiliere('Digital Design', 'UX Designer');
        $ia      = $findFiliere('Intelligence Artificielle', null);
        $iaad    = $findFiliere('Intelligence Artificielle', 'Assistant Data Analyst');
        $iadc    = $findFiliere('Intelligence Artificielle', 'Développeur Chatbots');
        $idcs    = $findFiliere('Infrastructure Digitale', 'Cyber Sécurité');
        $idsr    = $findFiliere('Infrastructure Digitale', 'Systèmes et Réseaux');
        $infrd   = $findFiliere('Infrastructure Digitale', null);

        $groupes = [
            ['code' => 'DEVOWFS201', 'filiere_id' => $devowfs->id, 'annee' => '2ème année'],
            ['code' => 'DEVOWFS202', 'filiere_id' => $devowfs->id, 'annee' => '2ème année'],
            ['code' => 'DEVOWFS203', 'filiere_id' => $devowfs->id, 'annee' => '2ème année'],
            ['code' => 'DEVOWFS204', 'filiere_id' => $devowfs->id, 'annee' => '2ème année'],
            ['code' => 'DEVOAM201', 'filiere_id' => $devoam->id, 'annee' => '2ème année'],
            ['code' => 'DEVOAM202', 'filiere_id' => $devoam->id, 'annee' => '2ème année'],
            ['code' => 'DEVD101', 'filiere_id' => $devd->id, 'annee' => '1ère année'],
            ['code' => 'DEVD102', 'filiere_id' => $devd->id, 'annee' => '1ère année'],
            ['code' => 'DEVD103', 'filiere_id' => $devd->id, 'annee' => '1ère année'],
            ['code' => 'DIGD101', 'filiere_id' => $digd->id, 'annee' => '1ère année'],
            ['code' => 'DIGD102', 'filiere_id' => $digd->id, 'annee' => '1ère année'],
            ['code' => 'DIGDUI201', 'filiere_id' => $digdui->id, 'annee' => '2ème année'],
            ['code' => 'DIGDUX201', 'filiere_id' => $digdux->id, 'annee' => '2ème année'],
            ['code' => 'IA101', 'filiere_id' => $ia->id, 'annee' => '1ère année'],
            ['code' => 'IA102', 'filiere_id' => $ia->id, 'annee' => '1ère année'],
            ['code' => 'IAAD201', 'filiere_id' => $iaad->id, 'annee' => '2ème année'],
            ['code' => 'IADC201', 'filiere_id' => $iadc->id, 'annee' => '2ème année'],
            ['code' => 'IDCS201', 'filiere_id' => $idcs->id, 'annee' => '2ème année'],
            ['code' => 'IDSR201', 'filiere_id' => $idsr->id, 'annee' => '2ème année'],
            ['code' => 'INFRD101', 'filiere_id' => $infrd->id, 'annee' => '1ère année'],
            ['code' => 'INFRD102', 'filiere_id' => $infrd->id, 'annee' => '1ère année'],
        ];

        foreach ($groupes as $groupe) {
            Groupe::create($groupe);
        }

        // Rattacher les stagiaires au groupe DEVOWFS202
        $groupe202 = Groupe::where('code', 'DEVOWFS202')->first();
        User::where('role', 'stagiaire')->update(['groupe_id' => $groupe202->id]);

        $this->command->info('✅ Groupes créés.');
    }
}

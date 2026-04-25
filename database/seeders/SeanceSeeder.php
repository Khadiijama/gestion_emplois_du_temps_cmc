<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Seance;
use App\Models\Groupe;
use App\Models\Formateur;
use App\Models\Salle;

class SeanceSeeder extends Seeder
{
    public function run(): void
    {
        // Récupération des ressources
        $groupes   = Groupe::all()->keyBy('code');
        $formateurs = Formateur::all()->keyBy('matricule');
        $salles    = Salle::all()->keyBy('code');

        // Planning exemple pour le groupe DEVWFS201 (2e année Web Full Stack)
        $this->seederGroupe($groupes, $formateurs, $salles, 'DEVWFS201', [
            ['jour' => 'Lundi',    'creneau' => 1, 'formateur' => 'F001', 'salle' => 'SM-01'],
            ['jour' => 'Lundi',    'creneau' => 2, 'formateur' => 'F001', 'salle' => 'SM-01'],
            ['jour' => 'Lundi',    'creneau' => 3, 'formateur' => 'F002', 'salle' => 'SM-02'],
            ['jour' => 'Mardi',    'creneau' => 1, 'formateur' => 'F002', 'salle' => 'SM-02'],
            ['jour' => 'Mardi',    'creneau' => 2, 'formateur' => 'F001', 'salle' => 'SM-01'],
            ['jour' => 'Mercredi', 'creneau' => 1, 'formateur' => 'F001', 'salle' => 'SM-01'],
            ['jour' => 'Mercredi', 'creneau' => 2, 'formateur' => 'F002', 'salle' => 'SM-02'],
            ['jour' => 'Jeudi',    'creneau' => 1, 'formateur' => 'F001', 'salle' => 'SM-01'],
            ['jour' => 'Jeudi',    'creneau' => 3, 'formateur' => 'F002', 'salle' => 'SM-02'],
            ['jour' => 'Vendredi', 'creneau' => 2, 'formateur' => 'F001', 'salle' => 'SM-01'],
            ['jour' => 'Vendredi', 'creneau' => 4, 'formateur' => 'F002', 'salle' => 'SM-02'],
            ['jour' => 'Samedi',   'creneau' => 1, 'formateur' => 'F001', 'salle' => 'SM-01'],
        ]);

        // Planning exemple pour le groupe DEVWFS101 (1ère année Web Full Stack)
        $this->seederGroupe($groupes, $formateurs, $salles, 'DEVWFS101', [
            ['jour' => 'Lundi',    'creneau' => 1, 'formateur' => 'F003', 'salle' => 'SM-03'],
            ['jour' => 'Lundi',    'creneau' => 2, 'formateur' => 'F002', 'salle' => 'SM-04'],
            ['jour' => 'Mardi',    'creneau' => 1, 'formateur' => 'F003', 'salle' => 'SM-03'],
            ['jour' => 'Mardi',    'creneau' => 3, 'formateur' => 'F002', 'salle' => 'SM-04'],
            ['jour' => 'Mercredi', 'creneau' => 2, 'formateur' => 'F003', 'salle' => 'SM-03'],
            ['jour' => 'Jeudi',    'creneau' => 1, 'formateur' => 'F002', 'salle' => 'SM-04'],
            ['jour' => 'Vendredi', 'creneau' => 1, 'formateur' => 'F003', 'salle' => 'SM-03'],
            ['jour' => 'Samedi',   'creneau' => 2, 'formateur' => 'F002', 'salle' => 'SM-04'],
        ]);

        // Planning exemple pour le groupe IA-101 (1ère année IA)
        $this->seederGroupe($groupes, $formateurs, $salles, 'IA-101', [
            ['jour' => 'Lundi',    'creneau' => 1, 'formateur' => 'F005', 'salle' => 'SM-05'],
            ['jour' => 'Lundi',    'creneau' => 2, 'formateur' => 'F006', 'salle' => 'SM-06'],
            ['jour' => 'Mardi',    'creneau' => 1, 'formateur' => 'F005', 'salle' => 'SM-05'],
            ['jour' => 'Mercredi', 'creneau' => 3, 'formateur' => 'F006', 'salle' => 'SM-06'],
            ['jour' => 'Jeudi',    'creneau' => 2, 'formateur' => 'F005', 'salle' => 'SM-05'],
            ['jour' => 'Vendredi', 'creneau' => 1, 'formateur' => 'F006', 'salle' => 'SM-06'],
        ]);

        // Planning exemple pour le groupe CYBER-201
        $this->seederGroupe($groupes, $formateurs, $salles, 'CYBER-201', [
            ['jour' => 'Lundi',    'creneau' => 1, 'formateur' => 'F007', 'salle' => 'SC-01'],
            ['jour' => 'Lundi',    'creneau' => 2, 'formateur' => 'F008', 'salle' => 'SC-02'],
            ['jour' => 'Mardi',    'creneau' => 1, 'formateur' => 'F007', 'salle' => 'SC-01'],
            ['jour' => 'Mercredi', 'creneau' => 2, 'formateur' => 'F007', 'salle' => 'SC-01'],
            ['jour' => 'Jeudi',    'creneau' => 3, 'formateur' => 'F008', 'salle' => 'SC-02'],
            ['jour' => 'Samedi',   'creneau' => 1, 'formateur' => 'F008', 'salle' => 'SC-02'],
        ]);

        // Planning exemple pour DD-UI-201
        $this->seederGroupe($groupes, $formateurs, $salles, 'DD-UI-201', [
            ['jour' => 'Lundi',    'creneau' => 2, 'formateur' => 'F004', 'salle' => 'SM-07'],
            ['jour' => 'Mardi',    'creneau' => 1, 'formateur' => 'F009', 'salle' => 'SC-03'],
            ['jour' => 'Mercredi', 'creneau' => 1, 'formateur' => 'F004', 'salle' => 'SM-07'],
            ['jour' => 'Jeudi',    'creneau' => 2, 'formateur' => 'F009', 'salle' => 'SC-03'],
            ['jour' => 'Vendredi', 'creneau' => 3, 'formateur' => 'F004', 'salle' => 'SM-07'],
        ]);
    }

    private function seederGroupe($groupes, $formateurs, $salles, $code, $seances): void
    {
        $groupe = $groupes->get($code);
        if (!$groupe) return;

        foreach ($seances as $s) {
            $formateur = $formateurs->get($s['formateur']);
            $salle     = $salles->get($s['salle']);
            if (!$formateur || !$salle) continue;

            // Vérification des conflits avant insertion
            $conflit = Seance::where('jour', $s['jour'])
                ->where('creneau', $s['creneau'])
                ->where(function($q) use ($s, $groupe, $formateur, $salle) {
                    $q->where('groupe_id', $groupe->id)
                      ->orWhere('formateur_id', $formateur->id)
                      ->orWhere('salle_id', $salle->id);
                })->exists();

            if (!$conflit) {
                Seance::create([
                    'groupe_id'    => $groupe->id,
                    'formateur_id' => $formateur->id,
                    'salle_id'     => $salle->id,
                    'jour'         => $s['jour'],
                    'creneau'      => $s['creneau'],
                ]);
            }
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Seance;
use App\Models\Groupe;
use App\Models\Salle;
use App\Models\Formateur;

class SeanceSeeder extends Seeder
{
    private function seance(
        Groupe $groupe,
        Formateur $formateur,
        Salle  $salle,
        string $jour,
        string $creneau
    ): void {
        Seance::create([
            'groupe_id'    => $groupe->id,
            'formateur_id' => $formateur->id,
            'salle_id'     => $salle->id,
            'jour'         => $jour,
            'creneau'      => $creneau,
            // heure_debut, heure_fin et matiere ne sont pas dans la table actuelle
        ]);
    }

    public function run(): void
    {
        // Récupérer les formateurs par matricule
        $fritet  = Formateur::where('matricule', 'FOR001')->first();
        $guelsa  = Formateur::where('matricule', 'FOR002')->first();
        $benali  = Formateur::where('matricule', 'FOR003')->first();
        $rachidi = Formateur::where('matricule', 'FOR004')->first();
        $tahiri  = Formateur::where('matricule', 'FOR005')->first();
        $alaoui  = Formateur::where('matricule', 'FOR006')->first();
        $berrada = Formateur::where('matricule', 'FOR007')->first();
        $lamrani = Formateur::where('matricule', 'FOR008')->first();

        // Récupérer les groupes
        $wfs201 = Groupe::where('code', 'DEVOWFS201')->first();
        $wfs202 = Groupe::where('code', 'DEVOWFS202')->first();
        $wfs203 = Groupe::where('code', 'DEVOWFS203')->first();
        $wfs204 = Groupe::where('code', 'DEVOWFS204')->first();
        $am201  = Groupe::where('code', 'DEVOAM201')->first();
        $am202  = Groupe::where('code', 'DEVOAM202')->first();
        $ia101  = Groupe::where('code', 'IA101')->first();
        $ia102  = Groupe::where('code', 'IA102')->first();
        $iaad   = Groupe::where('code', 'IAAD201')->first();
        $iadc   = Groupe::where('code', 'IADC201')->first();
        $idcs   = Groupe::where('code', 'IDCS201')->first();
        $idsr   = Groupe::where('code', 'IDSR201')->first();
        $ui201  = Groupe::where('code', 'DIGDUI201')->first();
        $ux201  = Groupe::where('code', 'DIGDUX201')->first();

        // Récupérer les salles
        $sm01 = Salle::where('code', 'SM-01')->first();
        $sm02 = Salle::where('code', 'SM-02')->first();
        $sm03 = Salle::where('code', 'SM-03')->first();
        $sm04 = Salle::where('code', 'SM-04')->first();
        $sm05 = Salle::where('code', 'SM-05')->first();
        $sm06 = Salle::where('code', 'SM-06')->first();
        $sm07 = Salle::where('code', 'SM-07')->first();
        $sc01 = Salle::where('code', 'SC-01')->first();
        $sc02 = Salle::where('code', 'SC-02')->first();
        $sc03 = Salle::where('code', 'SC-03')->first();
        $sc04 = Salle::where('code', 'SC-04')->first();

        // ═════════════════════════════════════════════════════════════
        // GROUPE DEVOWFS202
        // ═════════════════════════════════════════════════════════════
        $this->seance($wfs202, $guelsa, $sm03, 'Lundi', '1');
        $this->seance($wfs202, $guelsa, $sm03, 'Lundi', '2');
        $this->seance($wfs202, $fritet, $sm03, 'Mardi', '3');
        $this->seance($wfs202, $fritet, $sm03, 'Mardi', '4');
        $this->seance($wfs202, $fritet, $sm03, 'Mercredi', '1');
        $this->seance($wfs202, $fritet, $sm03, 'Mercredi', '2');
        $this->seance($wfs202, $fritet, $sm03, 'Jeudi', '1');
        $this->seance($wfs202, $fritet, $sm03, 'Jeudi', '2');
        $this->seance($wfs202, $guelsa, $sm03, 'Vendredi', '3');
        $this->seance($wfs202, $guelsa, $sm03, 'Vendredi', '4');
        $this->seance($wfs202, $guelsa, $sm03, 'Samedi', '1');
        $this->seance($wfs202, $guelsa, $sm03, 'Samedi', '2');

        // ═════════════════════════════════════════════════════════════
        // GROUPE DEVOWFS204
        // ═════════════════════════════════════════════════════════════
        $this->seance($wfs204, $fritet, $sm03, 'Mercredi', '3');
        $this->seance($wfs204, $fritet, $sm03, 'Mercredi', '4');
        $this->seance($wfs204, $fritet, $sm03, 'Jeudi', '3');
        $this->seance($wfs204, $fritet, $sm03, 'Jeudi', '4');
        $this->seance($wfs204, $fritet, $sm03, 'Vendredi', '1');
        $this->seance($wfs204, $fritet, $sm03, 'Vendredi', '2');
        $this->seance($wfs204, $guelsa, $sm03, 'Samedi', '3');
        $this->seance($wfs204, $guelsa, $sm03, 'Samedi', '4');

        // ═════════════════════════════════════════════════════════════
        // GROUPE DEVOWFS201
        // ═════════════════════════════════════════════════════════════
        $this->seance($wfs201, $guelsa, $sm01, 'Lundi',    '3');
        $this->seance($wfs201, $guelsa, $sm01, 'Lundi',    '4');
        $this->seance($wfs201, $fritet, $sm01, 'Mardi',    '1');
        $this->seance($wfs201, $fritet, $sm01, 'Mardi',    '2');
        $this->seance($wfs201, $guelsa, $sm01, 'Mercredi', '3');
        $this->seance($wfs201, $guelsa, $sm01, 'Mercredi', '4');
        $this->seance($wfs201, $fritet, $sm01, 'Jeudi',    '1');
        $this->seance($wfs201, $fritet, $sm01, 'Jeudi',    '2');
        $this->seance($wfs201, $guelsa, $sm01, 'Vendredi', '1');
        $this->seance($wfs201, $guelsa, $sm01, 'Vendredi', '2');
        $this->seance($wfs201, $fritet, $sm01, 'Samedi',   '3');
        $this->seance($wfs201, $fritet, $sm01, 'Samedi',   '4');

        // ═════════════════════════════════════════════════════════════
        // GROUPE DEVOWFS203
        // ═════════════════════════════════════════════════════════════
        $this->seance($wfs203, $fritet, $sm02, 'Lundi',    '1');
        $this->seance($wfs203, $fritet, $sm02, 'Lundi',    '2');
        $this->seance($wfs203, $guelsa, $sm02, 'Mardi',    '1');
        $this->seance($wfs203, $guelsa, $sm02, 'Mardi',    '2');
        $this->seance($wfs203, $fritet, $sm02, 'Jeudi',    '3');
        $this->seance($wfs203, $fritet, $sm02, 'Jeudi',    '4');
        $this->seance($wfs203, $guelsa, $sm02, 'Vendredi', '3');
        $this->seance($wfs203, $guelsa, $sm02, 'Vendredi', '4');
        $this->seance($wfs203, $fritet, $sm02, 'Samedi',   '1');
        $this->seance($wfs203, $fritet, $sm02, 'Samedi',   '2');
        $this->seance($wfs203, $guelsa, $sm02, 'Samedi',   '3');

        // ═════════════════════════════════════════════════════════════
        // GROUPE DEVOAM201
        // ═════════════════════════════════════════════════════════════
        $this->seance($am201, $rachidi, $sm04, 'Lundi',    '1');
        $this->seance($am201, $rachidi, $sm04, 'Lundi',    '2');
        $this->seance($am201, $rachidi, $sm04, 'Mercredi', '1');
        $this->seance($am201, $rachidi, $sm04, 'Mercredi', '2');
        $this->seance($am201, $rachidi, $sm04, 'Jeudi',    '3');
        $this->seance($am201, $rachidi, $sm04, 'Jeudi',    '4');
        $this->seance($am201, $rachidi, $sm04, 'Vendredi', '1');
        $this->seance($am201, $rachidi, $sm04, 'Vendredi', '2');
        $this->seance($am201, $rachidi, $sm04, 'Samedi',   '1');
        $this->seance($am201, $rachidi, $sm04, 'Samedi',   '2');

        // ═════════════════════════════════════════════════════════════
        // IA
        // ═════════════════════════════════════════════════════════════
        $this->seance($ia101, $benali, $sm06, 'Lundi',    '1');
        $this->seance($ia101, $benali, $sm06, 'Lundi',    '2');
        $this->seance($ia102, $benali, $sm07, 'Mardi',    '1');
        $this->seance($ia102, $benali, $sm07, 'Mardi',    '2');
        $this->seance($iaad,  $alaoui, $sc01, 'Lundi',    '3');
        $this->seance($iaad,  $alaoui, $sc01, 'Lundi',    '4');
        $this->seance($iadc,  $alaoui, $sc02, 'Mardi',    '3');
        $this->seance($iadc,  $alaoui, $sc02, 'Mardi',    '4');

        $total = Seance::count();
        $this->command->info("✅ Séances créées : {$total} au total");
    }
}

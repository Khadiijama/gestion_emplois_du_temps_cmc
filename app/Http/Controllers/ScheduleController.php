<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Groupe;
use App\Models\Filiere;

class ScheduleController extends Controller
{
    public function index(Request $request)
    {
        // Get all filieres with their groups for the dependent dropdowns
        $filieres = Filiere::with('groupes')->get();

        $groupe = null;
        $matrix = [];
        $jours = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'];

        // Initialize matrix
        foreach ($jours as $jour) {
            for ($c = 1; $c <= 4; $c++) {
                $matrix[$jour][$c] = null;
            }
        }

        // If a specific group is requested
        if ($request->has('groupe_id')) {
            $groupe = Groupe::with(['filiere', 'seances.formateur', 'seances.salle'])
                ->find($request->groupe_id);

            if ($groupe) {
                foreach ($groupe->seances as $seance) {
                    $matrix[$seance->jour][$seance->creneau] = $seance;
                }
            }
        }

        return view('schedule.index', compact('filieres', 'groupe', 'matrix', 'jours'));
    }
}

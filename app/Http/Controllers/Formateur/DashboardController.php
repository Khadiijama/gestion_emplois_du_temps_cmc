<?php

namespace App\Http\Controllers\Formateur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Seance;
use App\Models\Groupe;
use App\Models\Filiere;
use App\Models\Formateur;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        
        if (!$user->formateur_id) {
            return redirect()->route('schedule.index')->with('error', 'Vous n\'êtes pas associé à un formateur.');
        }

        $formateur = Formateur::with(['seances.groupe', 'seances.salle'])->find($user->formateur_id);
        $jours = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'];
        
        // personal matrix
        $personalMatrix = [];
        foreach ($jours as $jour) {
            for ($c = 1; $c <= 4; $c++) {
                $personalMatrix[$jour][$c] = null;
            }
        }

        foreach ($formateur->seances as $seance) {
            $personalMatrix[$seance->jour][$seance->creneau] = $seance;
        }

        // Search functionality
        $filieres = Filiere::with('groupes')->get();
        $selectedGroupe = null;
        $searchMatrix = [];

        if ($request->has('groupe_id')) {
            $selectedGroupe = Groupe::with(['filiere', 'seances.formateur', 'seances.salle'])
                ->find($request->groupe_id);

            if ($selectedGroupe) {
                // Initialize search matrix
                foreach ($jours as $jour) {
                    for ($c = 1; $c <= 4; $c++) {
                        $searchMatrix[$jour][$c] = null;
                    }
                }
                foreach ($selectedGroupe->seances as $seance) {
                    $searchMatrix[$seance->jour][$seance->creneau] = $seance;
                }
            }
        }

        return view('formateur.dashboard', compact(
            'formateur', 
            'personalMatrix', 
            'jours', 
            'filieres', 
            'selectedGroupe', 
            'searchMatrix'
        ));
    }
}

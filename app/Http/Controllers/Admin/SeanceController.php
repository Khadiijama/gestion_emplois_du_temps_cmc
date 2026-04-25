<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Seance;
use App\Models\Groupe;
use App\Models\Formateur;
use App\Models\Salle;

class SeanceController extends Controller
{
    public function index()
    {
        $seances = Seance::with(['groupe', 'formateur', 'salle'])->get();
        return view('admin.seances.index', compact('seances'));
    }

    public function create()
    {
        $groupes = Groupe::all();
        $formateurs = Formateur::all();
        $salles = Salle::all();
        return view('admin.seances.create', compact('groupes', 'formateurs', 'salles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'groupe_id' => 'required|exists:groupes,id',
            'formateur_id' => 'required|exists:formateurs,id',
            'salle_id' => 'required|exists:salles,id',
            'jour' => 'required|string',
            'creneau' => 'required|integer|min:1|max:4',
        ]);

        // Vérification des conflits (très important selon le CDC)
        $conflitGroupe = Seance::where('groupe_id', $request->groupe_id)
            ->where('jour', $request->jour)
            ->where('creneau', $request->creneau)
            ->exists();
            
        $conflitFormateur = Seance::where('formateur_id', $request->formateur_id)
            ->where('jour', $request->jour)
            ->where('creneau', $request->creneau)
            ->exists();
            
        $conflitSalle = Seance::where('salle_id', $request->salle_id)
            ->where('jour', $request->jour)
            ->where('creneau', $request->creneau)
            ->exists();

        if ($conflitGroupe) {
            return back()->with('error', 'Le groupe a déjà une séance prévue sur ce créneau.');
        }
        if ($conflitFormateur) {
            return back()->with('error', 'Le formateur animera déjà une séance sur ce créneau.');
        }
        if ($conflitSalle) {
            return back()->with('error', 'La salle est déjà occupée sur ce créneau.');
        }

        Seance::create($request->all());

        return redirect()->route('admin.seances.index')->with('success', 'Séance planifiée avec succès.');
    }

    public function destroy(Seance $seance)
    {
        $seance->delete();
        return redirect()->route('admin.seances.index')->with('success', 'Séance supprimée.');
    }
}

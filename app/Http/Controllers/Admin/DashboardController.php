<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Groupe;
use App\Models\Formateur;
use App\Models\Salle;
use App\Models\Seance;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'groupes' => Groupe::count(),
            'formateurs' => Formateur::count(),
            'salles' => Salle::count(),
            'seances' => Seance::count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}

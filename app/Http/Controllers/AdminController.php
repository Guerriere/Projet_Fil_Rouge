<?php

namespace App\Http\Controllers;

use App\Models\Agence;
use App\Models\Partner;
use App\Models\User;
use App\Models\Destination;
use App\Models\Voyage;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Récupérer les données nécessaires pour le tableau de bord admin
        $totalUsers = User::count();
        $totalPartners = User::where('role', 'partenaire')->count();
        $totalClients = User::where('role', 'client')->count();
        //$pendingPartners = Agence::where('terms_accepted', false)->count();

        $totalDestinations = Destination::count();
        $destinationsActives = Destination::count();

        $totalVols = Voyage::count();
        $volsPlanifies = 0;

        return view('administration.gestionnaire.dashboard', compact(
            'totalUsers',
            'totalPartners',
            'totalClients',
            //'pendingPartners',
            'totalDestinations',
            'destinationsActives',
            'totalVols',
            'volsPlanifies'
        ));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function dashboard()
    {
        // Récupérer les données nécessaires pour le tableau de bord partenaire
        $partner = auth()->user()->partner;
        
        // Ici, vous récupérerez les données spécifiques au partenaire
        // comme ses offres, réservations, etc.

        return view('partner.dashboard', compact('partner'));
    }
}

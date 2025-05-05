<?php

namespace App\Http\Controllers;

use App\Models\Agence;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    /**
     * Affiche le tableau de bord du partenaire.
     */
    public function dashboard()
    {
        // Récupérer l'utilisateur connecté
        $user = Auth::user();

        // Récupérer les informations de l'agence associée
        $agence = Agence::where('user_id', $user->id)->first();

        // Vérifiez si l'agence existe
        if (!$agence) {
            return redirect()->route('dashboard')->with('error', 'Aucune agence associée trouvée.');
        }

        // Passer les données à la vue
        return view('partner.dashboard', compact('agence'));
    }
}

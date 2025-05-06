<?php

namespace App\Http\Controllers;

use App\Models\Agence;
use Illuminate\Support\Facades\Auth;

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
            return redirect()->route('home')->with('error', 'Aucune agence associée trouvée.');
        }

        // Exemple de statistiques dynamiques
        $totalReservations = 120; // Exemple : récupérer depuis la base de données
        $totalRevenus = 15000; // Exemple : récupérer depuis la base de données
        $servicesActifs = 8; // Exemple : récupérer depuis la base de données
        $reservationsEnAttente = 5; // Exemple : récupérer depuis la base de données
        $totalClients = 80; // Exemple : récupérer depuis la base de données
        $servicesPlanifies = 3; // Exemple : récupérer depuis la base de données
        $paiementsRecus = 14000; // Exemple : récupérer depuis la base de données
        $evaluationMoyenne = 4.5; // Exemple : récupérer depuis la base de données

        // Passer les données à la vue
        return view('Dashboard.partner.dashboard', compact(
            'agence',
            'totalReservations',
            'totalRevenus',
            'servicesActifs',
            'reservationsEnAttente',
            'totalClients',
            'servicesPlanifies',
            'paiementsRecus',
            'evaluationMoyenne'
        ));
    }
}
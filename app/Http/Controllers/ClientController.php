<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservation;
use App\Models\Voyage;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    /**
     * Affiche le tableau de bord du client.
     */
    public function dashboard()
    {
        // Récupérer l'utilisateur connecté
        $user = Auth::user();

        // Récupérer les réservations du client
        $reservations = Reservation::where('user_id', $user->id)
                                  ->orderBy('created_at', 'desc')
                                  ->take(5)
                                  ->get();

        // Statistiques pour le client
        $totalReservations = Reservation::where('user_id', $user->id)->count();
        $reservationsEnCours = Reservation::where('user_id', $user->id)
                                         ->where('statut', 'en_cours')
                                         ->count();
        $reservationsTerminees = Reservation::where('user_id', $user->id)
                                           ->where('statut', 'terminee')
                                           ->count();
        $montantTotal = Reservation::where('user_id', $user->id)
                                  ->sum('montant_total');

        // Passer les données à la vue
        return view('Dashboard.client.dashboard', compact(
            'user',
            'reservations',
            'totalReservations',
            'reservationsEnCours',
            'reservationsTerminees',
            'montantTotal'
        ));
    }

    /**
     * Affiche le formulaire d'ajout de réservation.
     */
    public function addReservation(Request $request)
{
    $voyageId = $request->input('voyage_id');
    
    if (!$voyageId) {
        return redirect()->route('client.dashboard')->with('error', 'Aucun voyage sélectionné.');
    }
    
    $voyage = Voyage::findOrFail($voyageId);
    
    
    // Vérifier si le voyage est disponible
    if ($voyage->nbre_place <= 0 || $voyage->statut !== 'active') {
        return redirect()->route('agence.show', $voyage->agence_id)->with('error', 'Ce voyage n\'est plus disponible.');
    }
    
    // Assurez-vous que la vue existe et est correctement configurée
    return view('Dashboard.client.reservation-add', compact('voyage'));
}

    


    /**
     * Affiche la liste des réservations du client.
     */
    public function listReservations()
    {
        $user = Auth::user();
        $reservations = Reservation::where('user_id', $user->id)
                                  ->orderBy('created_at', 'desc')
                                  ->paginate(10);
        
        return view('Dashboard.client.mes-reservations', compact('reservations'));
    }

    /**
     * Affiche les détails d'une réservation.
     */
    public function showReservation($id)
    {
        $user = Auth::user();
        $reservation = Reservation::where('id', $id)
                                 ->where('user_id', $user->id)
                                 ->firstOrFail();
        
        return view('Dashboard.client.reservation-details', compact('reservation'));
    }

    /**
     * Affiche le profil du client.
     */
    public function profile()
    {
        $user = Auth::user();
        return view('Dashboard.client.profile', compact('user'));
    }

    /**
     * Affiche le formulaire d'édition du profil client.
     */
    public function editProfile()
    {
        $user = Auth::user();
        return view('Dashboard.client.edit-profile', compact('user'));
    }

    /**
     * Met à jour le profil du client.
     */
    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'telephone' => 'required|string|max:20',
            'adresse' => 'required|string|max:255',
            'password' => 'nullable|string|min:8|confirmed',
        ]);
        
        $user->name = $request->name;
        $user->email = $request->email;
        $user->telephone = $request->telephone;
        $user->adresse = $request->adresse;
        
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        
        $user->save();
        
        return redirect()->route('client.profile')->with('success', 'Profil mis à jour avec succès.');
    }

    /**
     * Annule une réservation.
     */
    public function cancelReservation($id)
    {
        $user = Auth::user();
        $reservation = Reservation::where('id', $id)
                                 ->where('user_id', $user->id)
                                 ->where('statut', 'en_attente')
                                 ->firstOrFail();
        
        $reservation->statut = 'annulee';
        $reservation->save();
        
        // Mettre à jour le nombre de places disponibles pour le voyage
        $voyage = $reservation->voyage;
        $voyage->nbre_place += $reservation->nombre_places;
        $voyage->save();
        
        return redirect()->route('client.reservations.list')->with('success', 'Réservation annulée avec succès.');
    }

    /**
     * Affiche la page de confirmation de réservation.
     */
    public function confirmationReservation($id)
    {
        $user = Auth::user();
        $reservation = Reservation::where('id', $id)
                                 ->where('user_id', $user->id)
                                 ->firstOrFail();
        
        return view('Dashboard.client.reservation-confirmation', compact('reservation'));
    }
}

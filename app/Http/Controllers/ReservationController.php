<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Voyage;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ReservationController extends Controller
{
    

    
    /**
     * Affiche la liste des réservations de l'utilisateur connecté
     */
    public function index()
    {
        $reservations = Reservation::where('user_id', Auth::id())
                                  ->orderBy('created_at', 'desc')
                                  ->paginate(10);
        
        return view('Dashboard.client.mes-reservations', compact('reservations'));
    }
    
    /**
     * Affiche le formulaire de réservation pour les utilisateurs non authentifiés
     */
    public function create(Request $request)
    {
        $voyageId = $request->input('voyage_id');
        
        if (!$voyageId) {
            return redirect()->route('accueil')->with('error', 'Aucun voyage sélectionné.');
        }
        
        $voyage = Voyage::findOrFail($voyageId);
        
        // Vérifier si le voyage est disponible
        if ($voyage->nbre_place <= 0 || $voyage->statut !== 'active') {
            return redirect()->route('agence.show', $voyage->agence_id)->with('error', 'Ce voyage n\'est plus disponible.');
        }
        
        return view('page.reservation-create', compact('voyage'));
    }
    
    
    /**
     * Enregistre une nouvelle réservation pour un utilisateur authentifié
     */
    public function store(Request $request)
{
    // Validation des données
    $request->validate([
        'voyage_id' => 'required|exists:voyages,id',
        'nombre_places' => 'required|integer|min:1',
        'conditions' => 'required|accepted',
    ]);

    // Récupérer le voyage
    $voyage = Voyage::findOrFail($request->voyage_id);
    
    // Vérifier la disponibilité
    if ($voyage->nbre_place < $request->nombre_places) {
        return back()->with('error', 'Le nombre de places demandées n\'est pas disponible.');
    }
    
    // Récupérer l'utilisateur connecté
    $user = Auth::user();
    
    // Créer la réservation
    $reservation = new Reservation();
    $reservation->user_id = $user->id;
    $reservation->voyage_id = $voyage->id;
    $reservation->nombre_places = $request->nombre_places;
    $reservation->montant_total = $voyage->montant * $request->nombre_places;
    $reservation->statut = 'en_attente';
    $reservation->nom = $user->name;
    $reservation->email = $user->email;
    $reservation->telephone = $user->telephone;
    $reservation->save();
    
    // Mettre à jour le nombre de places disponibles
    $voyage->nbre_place -= $request->nombre_places;
    
    // Si le nombre de places atteint 0, mettre à jour le statut du voyage à "inactif"
    if ($voyage->nbre_place <= 0) {
        $voyage->statut = 'inactive';
    }
    
    $voyage->save();
    
    return redirect()->route('client.reservations.show', $reservation->id)
                 ->with('success', 'Votre réservation a été effectuée avec succès.');
}

    
    
    /**
     * Affiche la page de confirmation de réservation pour les utilisateurs authentifiés
     */
    public function confirmation($id)
    {
        $reservation = Reservation::findOrFail($id);
        
        // Vérifier si l'utilisateur a le droit de voir cette réservation
        if (Auth::id() !== $reservation->user_id && !Auth::user()->isAdmin() && !(Auth::user()->role === 'partenaire')) {
            abort(403, 'Vous n\'êtes pas autorisé à voir cette réservation.');
        }
        
        return view('page.reservation-confirmation', compact('reservation'));
    }
    
    /**
     * Annule une réservation
     */
    public function cancel(Request $request, $id)
    {
        $reservation = Reservation::findOrFail($id);
        
        // Vérifier si l'utilisateur a le droit d'annuler cette réservation
        if (Auth::id() !== $reservation->user_id && !Auth::user()->isAdmin() && !(Auth::user()->role === 'partenaire')) {
            abort(403, 'Vous n\'êtes pas autorisé à annuler cette réservation.');
        }
        
        // Vérifier si la réservation peut être annulée (pas déjà annulée et pas déjà passée)
        if ($reservation->statut === 'annulee') {
            return back()->with('error', 'Cette réservation a déjà été annulée.');
        }
        
        // Vérifier si la date de départ n'est pas dépassée
        if (Carbon::parse($reservation->voyage->date_depart)->isPast()) {
            return back()->with('error', 'Vous ne pouvez pas annuler une réservation pour un voyage déjà passé.');
        }
        
        // Mettre à jour le statut de la réservation
        $reservation->statut = 'annulee';
        $reservation->save();
        
        // Remettre à jour le nombre de places disponibles
        $voyage = $reservation->voyage;
        $voyage->nbre_place += $reservation->nombre_places;
        
        // Si le voyage était inactif (complet), le remettre en actif
        if ($voyage->statut === 'inactive') {
            $voyage->statut = 'active';
        }
        
        $voyage->save();
        
        return back()->with('success', 'Votre réservation a été annulée avec succès.');
    }
    
    /**
     * Affiche les détails d'une réservation
     */
    public function show(Reservation $reservation)
    {
        // Vérifier si l'utilisateur a le droit de voir cette réservation
        if (Auth::id() !== $reservation->user_id && !Auth::user()->isAdmin() && !(Auth::user()->role === 'partenaire')) {
            abort(403, 'Vous n\'êtes pas autorisé à voir cette réservation.');
        }
        
        return view('page.reservation-details', compact('reservation'));
    }
}
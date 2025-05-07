<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agence;
use App\Models\Voyage;
use App\Models\Destination;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AgenceController extends Controller
{
    /**
     * Affiche la liste des agences avec filtrage par destination
     */
    public function index(Request $request)
    {
        $destination = $request->input('destination');
        
        // Query builder pour les agences
        $query = Agence::query();
        
        // Ne récupérer que les agences qui ont une photo
        $query->whereNotNull('agency_photo');
        
        // Si une destination est spécifiée, filtrer les agences
        if ($destination) {
            // Récupérer les agences qui ont des voyages actifs vers cette destination
            $query->whereHas('voyages', function ($q) use ($destination) {
                $q->where('statut', 'active')
                  ->whereHas('destinationArrive', function ($q2) use ($destination) {
                      $q2->where('ville', 'like', '%' . $destination . '%');
                  });
            });
        }
        
        // Récupérer les agences avec pagination
        $agences = $query->with('user')->paginate(9);
        
        // Récupérer les villes disponibles pour l'autocomplétion
        $villes = Destination::select('ville')->distinct()->orderBy('ville')->pluck('ville');
        
        return view('page.agence', compact('agences', 'villes'));
    }
    
    /**
     * Affiche les détails d'une agence spécifique avec filtrage des voyages
     */
    public function show(Request $request, $id)
    {
        $agence = Agence::with('user')->findOrFail($id);
        
        // Vérifier si l'agence a une photo
        if (!$agence->agency_photo) {
            return redirect()->route('agence.index')->with('error', 'Cette agence n\'est pas disponible pour le moment.');
        }
        
        // Récupérer les paramètres de filtrage
        $dateDepart = $request->input('date_depart');
        $departId = $request->input('depart');
        $arriveId = $request->input('arrive');
        
        // Query builder pour les voyages
        $query = Voyage::where('agence_id', $id)
                       ->where('statut', 'active')
                       ->with(['destinationDepart', 'destinationArrive']);
        
        // Appliquer les filtres si présents
        if ($dateDepart) {
            $query->whereDate('date_depart', Carbon::parse($dateDepart)->format('Y-m-d'));
        }
        
        if ($departId) {
            $query->where('destination_depart_id', $departId);
        }
        
        if ($arriveId) {
            $query->where('destination_arrive_id', $arriveId);
        }
        
        // Récupérer les voyages filtrés
        $voyages = $query->orderBy('date_depart')
                         ->orderBy('heure_depart')
                         ->get();
        
        // Récupérer toutes les destinations pour les menus déroulants
        $destinations = Destination::orderBy('ville')->get();
        
        // Récupérer les destinations spécifiques à cette agence pour les filtres
        $departsDisponibles = Voyage::where('agence_id', $id)
                                   ->where('statut', 'active')
                                   ->with('destinationDepart')
                                   ->select('destination_depart_id')
                                   ->distinct()
                                   ->get()
                                   ->pluck('destinationDepart');
                                   
        $arrivesDisponibles = Voyage::where('agence_id', $id)
                                   ->where('statut', 'active')
                                   ->with('destinationArrive')
                                   ->select('destination_arrive_id')
                                   ->distinct()
                                   ->get()
                                   ->pluck('destinationArrive');
        
        return view('page.agence-details', compact(
            'agence', 
            'voyages', 
            'destinations', 
            'departsDisponibles', 
            'arrivesDisponibles',
            'dateDepart',
            'departId',
            'arriveId'
        ));
    }
    
    /**
     * Affiche un voyage spécifique après connexion
     */
    public function showVoyage(Voyage $voyage)
    {
        $agence = $voyage->agence;
        
        // Récupérer les destinations disponibles pour les filtres
        $departsDisponibles = Destination::whereHas('voyages', function($query) use ($agence) {
            $query->where('agence_id', $agence->id);
        })->distinct()->get();
        
        $arrivesDisponibles = Destination::whereHas('voyages', function($query) use ($agence) {
            $query->where('agence_id', $agence->id);
        })->distinct()->get();
        
        // Récupérer uniquement ce voyage
        $voyages = collect([$voyage]);
        
        return view('page.agence-details', compact('agence', 'voyages', 'departsDisponibles', 'arrivesDisponibles'));
    }
}

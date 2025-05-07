<?php

namespace App\Http\Controllers;

use App\Models\Agence;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Destination;

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
    

    public function addOffer()
    {
        return view('Dashboard.partner.offers.add');
    }

    public function listOffers()
    {
        return view('Dashboard.partner.offers.list');
    }

    public function addClient()
    {
        return view('Dashboard.partner.clients.add');
    }

    public function listClients()
    {
        return view('Dashboard.partner.clients.list');
    }

    public function addReservation()
    {
        return view('Dashboard.partner.reservations.add');
    }

    public function listReservations()
    {
        return view('Dashboard.partner.reservations.list');
    }

    public function listPayments()
    {
        return view('Dashboard.partner.payments.list');
    }

    public function listReviews()
    {
        return view('Dashboard.partner.reviews.list');
    }
    /**
     * Affiche les détails du profil du partenaire
     */
    public function show()
    {
        $user = Auth::user();
        $agence = $user->agence;
        
        if (!$agence) {
            return redirect()->route('home')->with('error', 'Aucune agence trouvée pour ce partenaire.');
        }
        
        return view('Dashboard.partner.profil', compact('user', 'agence'));
    }

    /**
     * Affiche le formulaire d'édition pour le partenaire connecté
     */
    public function edit()
    {
        $user = Auth::user();
        
        // Récupérer l'agence associée à l'utilisateur
        $agence = $user->agence;
        
        if (!$agence) {
            return redirect()->route('home')->with('error', 'Aucune agence trouvée pour ce partenaire.');
        }
        
        return view('Dashboard.partner.edit', compact('user', 'agence'));
    }


  /**
     * Met à jour les informations du partenaire
     */
    public function update(Request $request)
    {
        $user = Auth::user();
        
        // Valider les données utilisateur
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'telephone' => 'required|string|max:20',
            'adresse' => 'required|string|max:255',
            'password' => 'nullable|string|min:8|confirmed',
            
            // Données de l'agence
            'email_pro' => 'required|email|max:255',
            'phone_pro' => 'required|string|max:20',
            'agency_name' => 'required|string|max:255',
            'agency_type' => 'required|string|in:Bus,Train,Avion',
            'agency_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'agency_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        // Mettre à jour les informations utilisateur
        $user->name = $request->name;
        $user->email = $request->email;
        $user->telephone = $request->telephone;
        $user->adresse = $request->adresse;
        
        // Mettre à jour le mot de passe si fourni
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        
        $user->save();
        
        // Mettre à jour les informations de l'agence
        $agence = $user->agence;
        
        if (!$agence) {
            $agence = new Agence();
            $agence->user_id = $user->id;
        }
        
        $agence->email_pro = $request->email_pro;
        $agence->phone_pro = $request->phone_pro;
        $agence->agency_name = $request->agency_name;
        $agence->agency_type = $request->agency_type;
        
        // Traiter la photo de l'agence si fournie
        if ($request->hasFile('agency_photo')) {
            // Supprimer l'ancienne photo si elle existe
            if ($agence->agency_photo) {
                Storage::delete('public/' . $agence->agency_photo);
            }
            
            $photoPath = $request->file('agency_photo')->store('agency_photos', 'public');
            $agence->agency_photo = $photoPath;
        }
        
        // Traiter le logo de l'agence si fourni
        if ($request->hasFile('agency_logo')) {
            // Supprimer l'ancien logo s'il existe
            if ($agence->agency_logo) {
                Storage::delete('public/' . $agence->agency_logo);
            }
            
            $logoPath = $request->file('agency_logo')->store('agency_logos', 'public');
            $agence->agency_logo = $logoPath;
        }
        
        $agence->save();
        
        return redirect()->route('partner.edit')->with('success', 'Informations mises à jour avec succès.');
    }

        /**
     * Supprime le compte partenaire et l'agence associée
     */
    public function destroy(Request $request)
    {
        $user = Auth::user();
        $agence = $user->agence;
        
        // Vérifier le mot de passe pour confirmer la suppression
        $request->validate([
            'password_confirmation' => 'required',
        ]);
        
        if (!Hash::check($request->password_confirmation, $user->password)) {
            return back()->with('error', 'Le mot de passe est incorrect.');
        }
        
        // Supprimer les fichiers associés à l'agence
        if ($agence) {
            if ($agence->agency_photo) {
                Storage::delete('public/' . $agence->agency_photo);
            }
            
            if ($agence->agency_logo) {
                Storage::delete('public/' . $agence->agency_logo);
            }
            
            // Supprimer l'agence
            $agence->delete();
        }
        
        // Déconnecter l'utilisateur
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        // Supprimer l'utilisateur
        $user->delete();
        
        return redirect()->route('home')->with('success', 'Votre compte a été supprimé avec succès.');
    }

    }

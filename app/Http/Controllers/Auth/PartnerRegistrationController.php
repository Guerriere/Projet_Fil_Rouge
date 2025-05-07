<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Agence;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class PartnerRegistrationController extends Controller
{
    /**
     * Affiche le formulaire d'inscription.
     */
    public function create(): View
    {
        return view('auth.register-partner');
    }

    /**
     * Gère une requête d'inscription de partenaire.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        try {
            $validated = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'email', 'unique:users,email'],
                'telephone' => ['required', 'string', 'max:15'],
                'adresse' => ['required', 'string', 'max:255'],
                'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
                'email_pro' => ['required', 'email', 'unique:agences,email_pro'],
                'phone_pro' => ['required', 'string', 'max:15'],
                'agency_name' => ['required', 'string', 'max:255'],
                'agency_type' => ['required', 'in:Bus,Train,Avion'],
                'agency_photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'agency_logo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'accept_conditions' => ['required', 'accepted'],
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            dd($e->errors());
        }

        // Convertir accept_conditions en booléen
        $validated['accept_conditions'] = isset($validated['accept_conditions']) && $validated['accept_conditions'] === 'on';

        // Étape 1 : Enregistrement dans la table users
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'telephone' => $validated['telephone'],
            'adresse' => $validated['adresse'],
            'role' => 'partenaire', // Assurez-vous que le champ "role" existe dans la table users
            'password' => Hash::make($validated['password']),
        ]);

        // Étape 2 : Gestion des fichiers téléchargés
        $agencyPhotoPath = $request->file('agency_photo')->store('agencies/photos', 'public');
        $agencyLogoPath = $request->file('agency_logo')->store('agencies/logos', 'public');

        // Étape 3 : Enregistrement dans la table agences
        Agence::create([
            'user_id' => $user->id,
            'email_pro' => $validated['email_pro'],
            'phone_pro' => $validated['phone_pro'],
            'agency_name' => $validated['agency_name'],
            'agency_type' => $validated['agency_type'],
            'agency_photo' => $agencyPhotoPath, // Enregistrement du chemin de la photo
            'agency_logo' => $agencyLogoPath,   // Enregistrement du chemin du logo
            'accept_conditions' => $validated['accept_conditions'],
        ]);

        // Déclenchement de l'événement Registered
        event(new Registered($user));

        // Connexion automatique de l'utilisateur
        Auth::login($user);

        // Redirection vers le tableau de bord
        return redirect(route('dashboard'))->with('success', 'Partenaire enregistré avec succès.');
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(Request $request): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
{
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
        'telephone' => ['required', 'string', 'max:20'],
        'adresse' => ['required', 'string', 'max:255'],
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'telephone' => $request->telephone,
        'adresse' => $request->adresse,
        'role' => 'client', // Par défaut, tous les nouveaux utilisateurs sont des clients
    ]);

    event(new Registered($user));

    Auth::login($user);

    // Vérifier s'il y a un voyage en attente de réservation
    if ($request->has('intended_voyage_id')) {
        $voyageId = $request->input('intended_voyage_id');
        return redirect()->route('client.reservations.add', ['voyage_id' => $voyageId])
                         ->with('success', 'Votre compte a été créé avec succès. Vous pouvez maintenant réserver votre voyage.');
    }

    // Redirection par défaut vers le tableau de bord client
    return redirect()->route('client.dashboard');
}

}

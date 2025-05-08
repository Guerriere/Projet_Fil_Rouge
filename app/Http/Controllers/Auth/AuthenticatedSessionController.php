<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(Request $request): View|RedirectResponse
    {
        // Si l'utilisateur est déjà authentifié et qu'il y a un intended_voyage_id
        if (Auth::check() && $request->has('intended_voyage_id')) {
            $voyageId = $request->input('intended_voyage_id');
            return redirect()->route('client.reservations.add', ['voyage_id' => $voyageId])
                            ->with('success', 'Vous êtes déjà connecté. Vous pouvez réserver votre voyage.');
        }
        
        // Si l'utilisateur est déjà authentifié, le rediriger selon son rôle
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($user->role === 'partenaire') {
                return redirect()->route('partner.dashboard');
            } else {
                return redirect()->route('client.dashboard');
            }
        }
        
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
{
    $request->authenticate();

    $request->session()->regenerate();

    // Récupérer l'utilisateur authentifié
    $user = Auth::user();
    
    // Vérifier s'il y a un voyage en attente de réservation
    if ($request->has('intended_voyage_id')) {
        $voyageId = $request->input('intended_voyage_id');
        return redirect()->route('client.reservations.add', ['voyage_id' => $voyageId])
                         ->with('success', 'Vous êtes maintenant connecté. Vous pouvez réserver votre voyage.');
    }
    
    // Redirection par défaut selon le rôle
    if ($user->role === 'admin') {
        return redirect()->route('admin.dashboard');
    } elseif ($user->role === 'partenaire') {
        return redirect()->route('partner.dashboard');
    } else {
        return redirect()->route('client.dashboard');
    }
}

    

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}

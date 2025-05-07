<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
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
            return redirect()->route('agence.show.voyage', $voyageId)
                             ->with('success', 'Vous êtes maintenant connecté. Vous pouvez réserver votre voyage.');
        }
        
        // Redirection par défaut selon le rôle
        if ($user->isAdmin()) {
            return redirect()->route('admin.dashboard');
        } elseif ($user->isPartner()) {
            return redirect()->route('partner.dashboard');
        } elseif ($user->isClient()) {
            // Rediriger les clients vers leur tableau de bord
            return redirect()->route('client.dashboard');
        } else {
            // Fallback pour tout autre rôle
            return redirect()->route('accueil');
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

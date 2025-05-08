<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                // Si l'utilisateur est déjà authentifié et qu'il y a un intended_voyage_id
                if ($request->has('intended_voyage_id')) {
                    $voyageId = $request->input('intended_voyage_id');
                    return redirect()->route('client.reservations.add', ['voyage_id' => $voyageId])
                                    ->with('success', 'Vous êtes déjà connecté. Vous pouvez réserver votre voyage.');
                }
                
                // Redirection par défaut selon le rôle
                $user = Auth::user();
                if ($user->role === 'admin') {
                    return redirect()->route('admin.dashboard');
                } elseif ($user->role === 'partenaire') {
                    return redirect()->route('partner.dashboard');
                } else {
                    return redirect()->route('client.dashboard');
                }
            }
        }

        return $next($request);
    }
}
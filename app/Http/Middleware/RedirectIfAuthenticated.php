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
                // Ajout de journalisation pour déboguer
                \Log::info('User already authenticated in RedirectIfAuthenticated', [
                    'user_id' => Auth::id(),
                    'role' => Auth::user()->role ?? 'unknown'
                ]);
                
                // Utiliser un chemin absolu pour éviter les problèmes de nommage de route
                return redirect('/');
            }
        }

        return $next($request);
    }
}
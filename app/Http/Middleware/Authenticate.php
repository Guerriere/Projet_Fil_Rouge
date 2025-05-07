<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): string
    {
        // Ajout de journalisation pour déboguer
        \Log::info('Unauthenticated user redirected to login', [
            'url' => $request->url(),
            'ajax' => $request->expectsJson()
        ]);
        
        return $request->expectsJson() ? null : route('login');
    }
}
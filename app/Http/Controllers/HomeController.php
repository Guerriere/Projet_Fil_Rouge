<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Handle redirection after login based on user role.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        
        $user = Auth::user();
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($user->role === 'partenaire') {
            return redirect()->route('partner.dashboard');
        } elseif ($user->role === 'gestionnaire') {
            return redirect()->route('manager.dashboard');
        }

        // Default redirection for other roles or guests
        return redirect()->route('accueil');
    }
}
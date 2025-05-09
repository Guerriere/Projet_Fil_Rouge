<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agence;
use App\Models\Destination;

class PageController extends Controller
{
    /**
     * Affiche la page d'accueil avec les dernières agences et destinations
     */
    public function Accueil()
    {
        // Récupérer les 6 dernières agences
        $latestAgencies = Agence::latest()->take(6)->get();
        
        // Récupérer les 6 dernières destinations
        $latestDestinations = Destination::latest()->take(6)->get();
        
        return view('page.index', compact('latestAgencies', 'latestDestinations'));
    }
    public function about()
    {
        return view('page.about');
    }
    public function contact()
    {
        return view('page.contact');
    }
    public function services()
    {
        return view('page.services');
    }
    
    
    public function faq()
    {
        return view('page.faq');
    }
    public function terms()
    {
        return view('page.terms');
    }
    public function privacy()
    {
        return view('page.privacy');
    }
    public function error()
    {
        return view('page.error');
    }
}

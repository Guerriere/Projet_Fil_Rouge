<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Récupérer les données nécessaires pour le tableau de bord admin
        $totalUsers = User::count();
        $totalPartners = User::where('role', 'partenaire')->count();
        $totalClients = User::where('role', 'client')->count();
        $pendingPartners = Partner::where('verified', false)->count();

        return view('admin.dashboard', compact('totalUsers', 'totalPartners', 'totalClients', 'pendingPartners'));
    }
}

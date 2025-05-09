<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Reservation;
use App\Models\Voyage;
use App\Models\Destination;
use App\Models\Agence;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Statistiques générales
        $totalUsers = User::count();
        $totalReservations = Reservation::count();
        $totalPartners = User::where('role', 'partenaire')->count();
        $totalRevenue = Reservation::sum('montant_total');

        // Statistiques du mois en cours
        $startOfMonth = Carbon::now()->startOfMonth();
        $newUsersThisMonth = User::where('created_at', '>=', $startOfMonth)->count();
        $newReservationsThisMonth = Reservation::where('created_at', '>=', $startOfMonth)->count();
        $newPartnersThisMonth = User::where('role', 'partenaire')->where('created_at', '>=', $startOfMonth)->count();
        $revenueThisMonth = Reservation::where('created_at', '>=', $startOfMonth)->sum('montant_total');

        // Données pour le graphique des réservations (6 derniers mois)
        $reservationChartData = [];
        $reservationChartLabels = [];
        
        for ($i = 5; $i >= 0; $i--) {
            $month = Carbon::now()->subMonths($i);
            $reservationChartLabels[] = $month->format('M Y');
            
            $reservationCount = Reservation::whereYear('created_at', $month->year)
                ->whereMonth('created_at', $month->month)
                ->count();
            
            $reservationChartData[] = $reservationCount;
        }

        // Répartition des utilisateurs
        $clientsCount = User::where('role', 'client')->count();
        $partnersCount = User::where('role', 'partenaire')->count();
        $adminsCount = User::where('role', 'admin')->count();

        // Top 5 des destinations
        

        $topDestinations = DB::table('destinations')
            ->join('voyages', 'destinations.id', '=', 'voyages.destination_arrive_id')
            ->join('reservations', 'voyages.id', '=', 'reservations.voyage_id')
            ->select(
                'destinations.id',
                'destinations.ville',
                'destinations.description',
                'destinations.user_id',
                DB::raw('COUNT(reservations.id) as reservations_count'),
                DB::raw('SUM(reservations.montant_total) as revenue')
            )
            ->groupBy('destinations.id', 'destinations.ville', 'destinations.description', 'destinations.user_id')
            ->orderByDesc('reservations_count')
            ->limit(5)
            ->get();

        // Top 5 des agences

            $topAgencies = DB::table('agences')
                ->join('voyages', 'agences.id', '=', 'voyages.agence_id')
                ->select(
                    'agences.id',
                    'agences.agency_name',
                    'agences.email_pro',
                    'agences.user_id',
                    // Ajoutez ici toutes les autres colonnes de la table `agences` que vous souhaitez sélectionner
                    DB::raw('COUNT(voyages.id) as voyages_count'),
                    DB::raw('SUM(voyages.montant * voyages.nbre_place) as revenue')
                )
                ->groupBy('agences.id', 'agences.agency_name', 'agences.email_pro', 'agences.user_id') // Ajoutez toutes les autres colonnes de `agences` ici
                ->orderByDesc('revenue')
                ->limit(5)
                ->get();

        // Dernières réservations
        $latestReservations = Reservation::with(['voyage.destinationDepart', 'voyage.destinationArrive'])
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        // Nouveaux utilisateurs
        $latestUsers = User::orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('Dashboard.admin.dashboard', compact(
            'totalUsers',
            'totalReservations',
            'totalPartners',
            'totalRevenue',
            'newUsersThisMonth',
            'newReservationsThisMonth',
            'newPartnersThisMonth',
            'revenueThisMonth',
            'reservationChartData',
            'reservationChartLabels',
            'clientsCount',
            'partnersCount',
            'adminsCount',
            'topDestinations',
            'topAgencies',
            'latestReservations',
            'latestUsers'
        ));
    }

    /**
 * Affiche la liste des utilisateurs
 */
public function usersList(Request $request)
{
    $query = User::query();
    
    // Filtres
    if ($request->has('search')) {
        $search = $request->search;
        $query->where(function($q) use ($search) {
            $q->where('name', 'like', "%{$search}%")
              ->orWhere('email', 'like', "%{$search}%")
              ->orWhere('telephone', 'like', "%{$search}%");
        });
    }
    
    if ($request->has('role') && $request->role) {
        $query->where('role', $request->role);
    }
    
    $users = $query->orderBy('created_at', 'desc')->paginate(15);
    
    return view('Dashboard.admin.users.list', compact('users'));
}

/**
 * Affiche les détails d'un utilisateur
 */
public function userShow($id)
{
    $user = User::findOrFail($id);
    
    // Récupérer les réservations de l'utilisateur
    $reservations = Reservation::where('user_id', $user->id)
                              ->orderBy('created_at', 'desc')
                              ->paginate(10, ['*'], 'reservations_page');
    
    // Récupérer l'activité de l'utilisateur
    $activities = Activity::where('user_id', $user->id)
                         ->orderBy('created_at', 'desc')
                         ->paginate(10, ['*'], 'activities_page');
    
    // Statistiques de l'utilisateur
    $reservationsCount = Reservation::where('user_id', $user->id)->count();
    $totalSpent = Reservation::where('user_id', $user->id)->sum('montant_total');
    $lastLoginDate = Activity::where('user_id', $user->id)
                            ->where('type', 'login')
                            ->orderBy('created_at', 'desc')
                            ->first()?->created_at;
    
    // Si l'utilisateur est un partenaire, récupérer les informations de son agence
    $agency = null;
    $agencyStats = [];
    $agencyVoyages = collect();
    
    if ($user->role == 'partenaire') {
        $agency = Agence::where('user_id', $user->id)->first();
        
        if ($agency) {
            // Statistiques de l'agence
            $agencyStats = [
                'voyages_count' => Voyage::where('agence_id', $agency->id)->count(),
                'reservations_count' => Reservation::whereHas('voyage', function($query) use ($agency) {
                    $query->where('agence_id', $agency->id);
                })->count(),
                'revenue' => Reservation::whereHas('voyage', function($query) use ($agency) {
                    $query->where('agence_id', $agency->id);
                })->sum('montant_total')
            ];
            
            // Derniers voyages de l'agence
            $agencyVoyages = Voyage::where('agence_id', $agency->id)
                                  ->with(['destinationDepart', 'destinationArrive'])
                                  ->orderBy('created_at', 'desc')
                                  ->take(5)
                                  ->get();
        }
    }
    
    return view('Dashboard.admin.users.show', compact(
        'user',
        'reservations',
        'activities',
        'reservationsCount',
        'totalSpent',
        'lastLoginDate',
        'agency',
        'agencyStats',
        'agencyVoyages'
    ));
}

/**
 * Affiche la liste des partenaires
 */
public function partnersList(Request $request)
{
    $query = Agence::with('user');
    
    // Filtres
    if ($request->has('search')) {
        $search = $request->search;
        $query->where(function($q) use ($search) {
            $q->where('agency_name', 'like', "%{$search}%")
              ->orWhere('email_pro', 'like', "%{$search}%")
              ->orWhere('phone_pro', 'like', "%{$search}%");
        });
    }
    
    if ($request->has('type') && $request->type) {
        $query->where('agency_type', $request->type);
    }
    
    // Ajouter le nombre de voyages pour chaque agence
    $partners = $query->withCount('voyages')
                     ->orderBy('created_at', 'desc')
                     ->paginate(15);
    
    return view('Dashboard.admin.partners.list', compact('partners'));
}

/**
 * Affiche la liste des réservations
 */
public function reservationsList(Request $request)
{
    $query = Reservation::with(['voyage.destinationDepart', 'voyage.destinationArrive']);
    
    // Filtres
    if ($request->has('search')) {
        $search = $request->search;
        $query->where(function($q) use ($search) {
            $q->where('id', 'like', "%{$search}%")
              ->orWhere('nom', 'like', "%{$search}%")
              ->orWhere('email', 'like', "%{$search}%");
        });
    }
    
    if ($request->has('statut') && $request->statut) {
        $query->where('statut', $request->statut);
    }
    
    if ($request->has('date_debut') && $request->date_debut) {
        $query->whereDate('created_at', '>=', $request->date_debut);
    }
    
    if ($request->has('date_fin') && $request->date_fin) {
        $query->whereDate('created_at', '<=', $request->date_fin);
    }
    
    $reservations = $query->orderBy('created_at', 'desc')->paginate(15);
    
    // Statistiques des réservations
    $totalReservations = Reservation::count();
    $pendingReservations = Reservation::where('statut', 'en_attente')->count();
    $confirmedReservations = Reservation::where('statut', 'confirmee')->count();
    $cancelledReservations = Reservation::where('statut', 'annulee')->count();
    
    return view('Dashboard.admin.reservations.list', compact(
        'reservations',
        'totalReservations',
        'pendingReservations',
        'confirmedReservations',
        'cancelledReservations'
    ));
}

/**
 * Affiche la liste des voyages
 */
public function voyagesList(Request $request)
{
    $query = Voyage::with(['destinationDepart', 'destinationArrive', 'agence']);
    
    // Filtres
    if ($request->has('agence_id') && $request->agence_id) {
        $query->where('agence_id', $request->agence_id);
    }
    
    if ($request->has('depart_id') && $request->depart_id) {
        $query->where('destination_depart_id', $request->depart_id);
    }
    
    if ($request->has('arrive_id') && $request->arrive_id) {
        $query->where('destination_arrive_id', $request->arrive_id);
    }
    
    if ($request->has('date_depart') && $request->date_depart) {
        $query->whereDate('date_depart', $request->date_depart);
    }
    
    if ($request->has('statut') && $request->statut) {
        $query->where('statut', $request->statut);
    }
    
    // Ajouter le nombre de réservations pour chaque voyage
    $voyages = $query->withCount('reservations')
                    ->orderBy('date_depart', 'asc')
                    ->paginate(15);
    
    // Statistiques des voyages
    $totalVoyages = Voyage::count();
    $activeVoyages = Voyage::where('statut', 'actif')->count();
    $inactiveVoyages = Voyage::where('statut', 'inactif')->count();
    $totalReservations = Reservation::count();
    
    // Récupérer les agences et destinations pour les filtres
    $agences = Agence::orderBy('agency_name')->get();
    $destinations = Destination::orderBy('ville')->get();
    
    return view('Dashboard.admin.voyages.list', compact(
        'voyages',
        'totalVoyages',
        'activeVoyages',
        'inactiveVoyages',
        'totalReservations',
        'agences',
        'destinations'
    ));
}

/**
 * Affiche la page des rapports et statistiques
 */
public function reports(Request $request)
{
    // Déterminer la période
    $period = $request->period ?? null;
    $startDate = null;
    $endDate = null;
    
    if ($period) {
        switch ($period) {
            case 'today':
                $startDate = Carbon::today();
                $endDate = Carbon::today();
                break;
            case 'yesterday':
                $startDate = Carbon::yesterday();
                $endDate = Carbon::yesterday();
                break;
            case 'this_week':
                $startDate = Carbon::now()->startOfWeek();
                $endDate = Carbon::now()->endOfWeek();
                break;
            case 'last_week':
                $startDate = Carbon::now()->subWeek()->startOfWeek();
                $endDate = Carbon::now()->subWeek()->endOfWeek();
                break;
            case 'this_month':
                $startDate = Carbon::now()->startOfMonth();
                $endDate = Carbon::now()->endOfMonth();
                break;
            case 'last_month':
                $startDate = Carbon::now()->subMonth()->startOfMonth();
                $endDate = Carbon::now()->subMonth()->endOfMonth();
                break;
            case 'this_year':
                $startDate = Carbon::now()->startOfYear();
                $endDate = Carbon::now()->endOfYear();
                break;
        }
    } else {
        $startDate = $request->date_debut ? Carbon::parse($request->date_debut) : Carbon::now()->subMonth();
        $endDate = $request->date_fin ? Carbon::parse($request->date_fin) : Carbon::now();
    }
    
    $defaultStartDate = $startDate->format('Y-m-d');
    $defaultEndDate = $endDate->format('Y-m-d');
    
    // Statistiques pour la période sélectionnée
    $totalReservations = Reservation::whereBetween('created_at', [$startDate, $endDate])->count();
    $totalRevenue = Reservation::whereBetween('created_at', [$startDate, $endDate])->sum('montant_total');
    $newUsers = User::whereBetween('created_at', [$startDate, $endDate])->count();
    $totalVoyages = Voyage::whereBetween('created_at', [$startDate, $endDate])->count();
    
    // Statistiques des réservations par statut
    $pendingReservations = Reservation::where('statut', 'en_attente')->whereBetween('created_at', [$startDate, $endDate])->count();
    $confirmedReservations = Reservation::where('statut', 'confirmee')->whereBetween('created_at', [$startDate, $endDate])->count();
    $cancelledReservations = Reservation::where('statut', 'annulee')->whereBetween('created_at', [$startDate, $endDate])->count();
    
    // Statistiques des réservations par type de transport
    $busReservations = Reservation::whereHas('voyage.agence', function($query) {
        $query->where('agency_type', 'Bus');
    })->whereBetween('created_at', [$startDate, $endDate])->count();
    
    $trainReservations = Reservation::whereHas('voyage.agence', function($query) {
        $query->where('agency_type', 'Train');
    })->whereBetween('created_at', [$startDate, $endDate])->count();
    
    $avionReservations = Reservation::whereHas('voyage.agence', function($query) {
        $query->where('agency_type', 'Avion');
    })->whereBetween('created_at', [$startDate, $endDate])->count();
    
    // Données pour les graphiques
    $reservationChartData = [];
    $reservationChartLabels = [];
    $revenueChartData = [];
    $revenueChartLabels = [];
    
    // Déterminer l'intervalle pour les graphiques en fonction de la durée de la période
    $diffInDays = $startDate->diffInDays($endDate);
    
    if ($diffInDays <= 31) {
        // Données quotidiennes
        for ($date = clone $startDate; $date->lte($endDate); $date->addDay()) {
            $reservationChartLabels[] = $date->format('d/m');
            $revenueChartLabels[] = $date->format('d/m');
            
            $reservationCount = Reservation::whereDate('created_at', $date)->count();
            $reservationChartData[] = $reservationCount;
            
            $revenue = Reservation::whereDate('created_at', $date)->sum('montant_total');
            $revenueChartData[] = $revenue;
        }
    } else {
        // Données mensuelles
        for ($date = clone $startDate->startOfMonth(); $date->lte($endDate); $date->addMonth()) {
            $reservationChartLabels[] = $date->format('M Y');
            $revenueChartLabels[] = $date->format('M Y');
            
            $reservationCount = Reservation::whereYear('created_at', $date->year)
                ->whereMonth('created_at', $date->month)
                ->count();
            $reservationChartData[] = $reservationCount;
            
            $revenue = Reservation::whereYear('created_at', $date->year)
                ->whereMonth('created_at', $date->month)
                ->sum('montant_total');
            $revenueChartData[] = $revenue;
        }
    }
    
    // Top destinations et agences
    $topDestinations = Destination::select('destinations.*')
        ->join('voyages', 'destinations.id', '=', 'voyages.destination_arrive_id')
        ->join('reservations', 'voyages.id', '=', 'reservations.voyage_id')
        ->whereBetween('reservations.created_at', [$startDate, $endDate])
        ->selectRaw('COUNT(reservations.id) as reservations_count')
        ->selectRaw('SUM(reservations.montant_total) as revenue')
        ->groupBy('destinations.id')
        ->orderBy('reservations_count', 'desc')
        ->take(10)
        ->get();
    
    $topAgencies = Agence::select('agences.*')
        ->join('voyages', 'agences.id', '=', 'voyages.agence_id')
        ->join('reservations', 'voyages.id', '=', 'reservations.voyage_id')
        ->whereBetween('reservations.created_at', [$startDate, $endDate])
        ->selectRaw('COUNT(reservations.id) as reservations_count')
        ->selectRaw('SUM(reservations.montant_total) as revenue')
        ->groupBy('agences.id')
        ->orderBy('revenue', 'desc')
        ->take(10)
        ->get();
    
    return view('Dashboard.admin.reports', compact(
        'totalReservations',
        'totalRevenue',
        'newUsers',
        'totalVoyages',
        'pendingReservations',
        'confirmedReservations',
        'cancelledReservations',
        'busReservations',
        'trainReservations',
        'avionReservations',
        'reservationChartData',
        'reservationChartLabels',
        'revenueChartData',
        'revenueChartLabels',
        'topDestinations',
        'topAgencies',
        'defaultStartDate',
        'defaultEndDate'
    ));
}

/**
 * Affiche la page des paramètres
 */
public function settings()
{
    // Récupérer les paramètres actuels
    $settings = Setting::pluck('value', 'key')->toArray();
    
    // Récupérer les sauvegardes disponibles
    $backups = [];
    $backupPath = storage_path('app/backups');
    
    if (file_exists($backupPath)) {
        $files = array_diff(scandir($backupPath), ['.', '..']);
        
        foreach ($files as $file) {
            $backups[] = [
                'name' => $file,
                'size' => $this->formatBytes(filesize($backupPath . '/' . $file)),
                'date' => Carbon::createFromTimestamp(filemtime($backupPath . '/' . $file))->format('d/m/Y H:i')
            ];
        }
        
        // Trier par date (plus récent en premier)
        usort($backups, function($a, $b) {
            return strtotime($b['date']) - strtotime($a['date']);
        });
    }
    
    return view('Dashboard.admin.settings', compact('settings', 'backups'));
}

/**
 * Formate la taille d'un fichier en octets, Ko, Mo, etc.
 */
private function formatBytes($bytes, $precision = 2)
{
    $units = ['B', 'KB', 'MB', 'GB', 'TB'];
    
    $bytes = max($bytes, 0);
    $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
    $pow = min($pow, count($units) - 1);
    
    $bytes /= pow(1024, $pow);
    
    return round($bytes, $precision) . ' ' . $units[$pow];
}

/**
 * Affiche le formulaire de création d'une destination
 */
public function destinationCreate()
{
    return view('Dashboard.admin.destinations.create');
}

/**
 * Liste des paiements
 */
public function paymentsList(Request $request)
{
    $query = Payment::with(['reservation', 'user']);
    
    // Filtres
    if ($request->has('search')) {
        $search = $request->search;
        $query->where(function($q) use ($search) {
            $q->where('id', 'like', "%{$search}%")
              ->orWhere('reference', 'like', "%{$search}%")
              ->orWhere('email', 'like', "%{$search}%");
        });
    }
    
    if ($request->has('statut') && $request->statut) {
        $query->where('statut', $request->statut);
    }
    
    if ($request->has('methode') && $request->methode) {
        $query->where('methode', $request->methode);
    }
    
    if ($request->has('date_debut') && $request->date_debut) {
        $query->whereDate('created_at', '>=', $request->date_debut);
    }
    
    if ($request->has('date_fin') && $request->date_fin) {
        $query->whereDate('created_at', '<=', $request->date_fin);
    }
    
    $payments = $query->orderBy('created_at', 'desc')->paginate(15);
    
    // Statistiques des paiements
    $totalPayments = Payment::count();
    $completedPayments = Payment::where('statut', 'completed')->count();
    $pendingPayments = Payment::where('statut', 'pending')->count();
    $failedPayments = Payment::where('statut', 'failed')->count();
    
    return view('Dashboard.admin.payments.list', compact(
        'payments',
        'totalPayments',
        'completedPayments',
        'pendingPayments',
        'failedPayments'
    ));
}

/**
 * Affiche les détails d'un paiement
 */
public function paymentShow($id)
{
    $payment = Payment::with(['reservation.voyage.destinationDepart', 'reservation.voyage.destinationArrive', 'reservation.voyage.agence', 'user'])->findOrFail($id);
    
    // Récupérer l'historique des actions sur ce paiement
    $paymentLogs = PaymentLog::where('payment_id', $payment->id)
                           ->with('admin')
                           ->orderBy('created_at', 'desc')
                           ->get();
    
    return view('Dashboard.admin.payments.show', compact('payment', 'paymentLogs'));
}

/**
 * Confirme un paiement en attente
 */
public function paymentConfirm(Request $request, $id)
{
    $payment = Payment::findOrFail($id);
    
    if ($payment->statut !== 'pending') {
        return redirect()->back()->with('error', 'Seuls les paiements en attente peuvent être confirmés.');
    }
    
    DB::beginTransaction();
    
    try {
        // Mettre à jour le statut du paiement
        $payment->statut = 'completed';
        $payment->transaction_id = $request->transaction_id;
        $payment->notes = $request->notes;
        $payment->updated_at = now();
        $payment->save();
        
        // Mettre à jour le statut de la réservation associée
        $reservation = Reservation::find($payment->reservation_id);
        if ($reservation) {
            $reservation->statut = 'confirmee';
            $reservation->save();
        }
        
        // Enregistrer l'action dans les logs
        PaymentLog::create([
            'payment_id' => $payment->id,
            'admin_id' => auth()->id(),
            'action' => 'confirmation',
            'details' => 'Paiement confirmé manuellement par l\'administrateur'
        ]);
        
        DB::commit();
        
        return redirect()->route('admin.payments.show', $payment->id)
                         ->with('success', 'Le paiement a été confirmé avec succès.');
    } catch (\Exception $e) {
        DB::rollBack();
        
        return redirect()->back()
                         ->with('error', 'Une erreur est survenue lors de la confirmation du paiement: ' . $e->getMessage());
    }
}

/**
 * Rembourse un paiement
 */
public function paymentRefund(Request $request, $id)
{
    $payment = Payment::findOrFail($id);
    
    if ($payment->statut !== 'completed') {
        return redirect()->back()->with('error', 'Seuls les paiements complétés peuvent être remboursés.');
    }
    
    DB::beginTransaction();
    
    try {
        // Mettre à jour le statut du paiement
        $payment->statut = 'refunded';
        $payment->refund_reason = $request->refund_reason;
        $payment->refunded_at = now();
        $payment->save();
        
        // Mettre à jour le statut de la réservation associée
        $reservation = Reservation::find($payment->reservation_id);
        if ($reservation) {
            $reservation->statut = 'annulee';
            $reservation->save();
        }
        
        // Enregistrer l'action dans les logs
        PaymentLog::create([
            'payment_id' => $payment->id,
            'admin_id' => auth()->id(),
            'action' => 'remboursement',
            'details' => 'Paiement remboursé. Raison: ' . $request->refund_reason
        ]);
        
        DB::commit();
        
        return redirect()->route('admin.payments.show', $payment->id)
                         ->with('success', 'Le paiement a été remboursé avec succès.');
    } catch (\Exception $e) {
        DB::rollBack();
        
        return redirect()->back()
                         ->with('error', 'Une erreur est survenue lors du remboursement: ' . $e->getMessage());
    }
}

/**
 * Ajoute une note à un paiement
 */
public function paymentAddNote(Request $request, $id)
{
    $payment = Payment::findOrFail($id);
    
    // Ajouter la nouvelle note
    $payment->notes = ($payment->notes ? $payment->notes . "\n\n" : '') . 
                      date('d/m/Y H:i') . ' - ' . auth()->user()->name . ":\n" . 
                      $request->note;
    $payment->save();
    
    // Enregistrer l'action dans les logs
    PaymentLog::create([
        'payment_id' => $payment->id,
        'admin_id' => auth()->id(),
        'action' => 'ajout_note',
        'details' => 'Note ajoutée au paiement'
    ]);
    
    return redirect()->route('admin.payments.show', $payment->id)
                     ->with('success', 'La note a été ajoutée avec succès.');
}

/**
 * Exporte les paiements au format spécifié
 */
public function paymentsExport($format)
{
    $payments = Payment::with(['reservation', 'user'])->get();
    
    if ($format == 'csv') {
        $filename = 'paiements_' . date('Y-m-d') . '.csv';
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];
        
        $callback = function() use ($payments) {
            $file = fopen('php://output', 'w');
            
            // En-têtes CSV
            fputcsv($file, [
                'ID', 'Référence', 'Montant', 'Statut', 'Méthode', 
                'Réservation ID', 'Client', 'Email', 'Date'
            ]);
            
            // Données
            foreach ($payments as $payment) {
                fputcsv($file, [
                    $payment->id,
                    $payment->reference,
                    $payment->montant,
                    $payment->statut,
                    $payment->methode,
                    $payment->reservation_id,
                    $payment->user ? $payment->user->name : $payment->nom,
                    $payment->email,
                    $payment->created_at->format('d/m/Y H:i')
                ]);
            }
            
            fclose($file);
        };
        
        return response()->stream($callback, 200, $headers);
    } elseif ($format == 'pdf') {
        $pdf = PDF::loadView('Dashboard.admin.payments.export_pdf', compact('payments'));
        
        return $pdf->download('paiements_' . date('Y-m-d') . '.pdf');
    } else {
        return redirect()->back()->with('error', 'Format d\'export non pris en charge.');
    }
}

/**
 * Génère un reçu de paiement au format PDF
 */
public function paymentExportReceipt($id)
{
    $payment = Payment::with(['reservation.voyage.destinationDepart', 'reservation.voyage.destinationArrive', 'reservation.voyage.agence', 'user'])->findOrFail($id);
    
    $pdf = PDF::loadView('Dashboard.admin.payments.receipt', compact('payment'));
    
    return $pdf->download('recu_paiement_' . $payment->reference . '.pdf');
}

/**
 * Affiche le formulaire de création d'un utilisateur
 *
 * @return \Illuminate\View\View
 */
public function userCreate()
{
    // Vous pouvez passer des données à la vue si nécessaire
    // Par exemple, une liste de rôles disponibles
    $roles = ['admin', 'partenaire', 'client'];
    
    return view('Dashboard.admin.users.create', compact('roles'));
}

/**
 * Enregistre un nouvel utilisateur
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\RedirectResponse
 */
public function userStore(Request $request)
{
    // Validation des données
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
        'role' => 'required|string|in:admin,partenaire,client',
        'telephone' => 'nullable|string|max:20',
        'adresse' => 'nullable|string|max:255',
        'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'is_active' => 'nullable|boolean',
        'email_verified' => 'nullable|boolean',
    ]);
    
    // Création de l'utilisateur
    $user = new User();
    $user->name = $validated['name'];
    $user->email = $validated['email'];
    $user->password = Hash::make($validated['password']);
    $user->role = $validated['role'];
    $user->telephone = $validated['telephone'] ?? null;
    $user->adresse = $validated['adresse'] ?? null;
    //$user->is_active = $request->has('is_active') ? 1 : 0;
    
    // Vérification de l'email si demandé
    if ($request->has('email_verified')) {
        $user->email_verified_at = now();
    }
    
    // Traitement de la photo de profil
    //if ($request->hasFile('profile_photo')) {
       // $path = $request->file('profile_photo')->store('profile-photos', 'public');
        //$user->profile_photo_path = $path;
    //}
    
    $user->save();
    
    // Redirection avec message de succès
    return redirect()->route('admin.users.list')
                     ->with('success', 'L\'utilisateur a été créé avec succès.');
}


}

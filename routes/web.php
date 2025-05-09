<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Auth\PartnerRegistrationController;
use App\Http\Controllers\AgenceController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Routes publiques pour PageController
Route::get('/', [PageController::class, 'Accueil'])->name('accueil');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/faq', [PageController::class, 'faq'])->name('faq');
Route::get('/terms', [PageController::class, 'terms'])->name('terms');
Route::get('/privacy', [PageController::class, 'privacy'])->name('privacy');
Route::get('/error', [PageController::class, 'error'])->name('error');

// Routes pour AgenceController
Route::get('/agence', [AgenceController::class, 'index'])->name('agence.index');
Route::get('/agences/{id}', [AgenceController::class, 'show'])->name('agence.show');
Route::get('/voyages/{voyage}', [AgenceController::class, 'showVoyage'])->name('voyage.show');

// Routes pour ReservationController (publiques et authentifiées)
Route::get('/reservation/create', [ReservationController::class, 'create'])->name('reservation.create');
Route::middleware(['auth'])->group(function () {
    Route::post('/reservation/store', [ReservationController::class, 'store'])->name('reservation.store');
    Route::get('/reservation/{id}/confirmation', [ReservationController::class, 'confirmation'])->name('reservation.confirmation');
    Route::post('/reservation/{id}/cancel', [ReservationController::class, 'cancel'])->name('reservation.cancel');
    Route::get('/reservation/{reservation}', [ReservationController::class, 'show'])->name('reservation.show');
    Route::get('/mes-reservations', [ReservationController::class, 'index'])->name('reservation.index');
});

// Routes pour ProfileController
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Routes d'authentification
Auth::routes();

// Routes d'inscription partenaire
Route::get('/register/partner', [PartnerRegistrationController::class, 'create'])->name('register.partner');
Route::post('/register/partner', [PartnerRegistrationController::class, 'store'])->name('register.partner.store');

// Route de redirection vers le tableau de bord approprié selon le rôle
Route::get('/dashboard', function () {
    if (Auth::user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    } elseif (Auth::user()->role === 'partenaire') {
        return redirect()->route('partner.dashboard');
    } elseif (Auth::user()->role === 'client') {
        return redirect()->route('client.dashboard');
    } else {
        return redirect()->route('home');
    }
})->middleware(['auth'])->name('dashboard');

// Routes pour l'administrateur
Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    
    // Gestion des utilisateurs
    Route::get('/users', [AdminController::class, 'usersList'])->name('admin.users.list');
    Route::get('/users/create', [AdminController::class, 'userCreate'])->name('admin.users.create');
    Route::post('/users/store', [AdminController::class, 'userStore'])->name('admin.users.store');
    Route::get('/users/{id}', [AdminController::class, 'userShow'])->name('admin.users.show');
    Route::get('/users/{id}/edit', [AdminController::class, 'userEdit'])->name('admin.users.edit');
    Route::put('/users/{id}', [AdminController::class, 'userUpdate'])->name('admin.users.update');
    Route::delete('/users/{id}', [AdminController::class, 'userDestroy'])->name('admin.users.destroy');
    Route::post('/users/{id}/verify-email', [AdminController::class, 'userVerifyEmail'])->name('admin.users.verify-email');
    Route::post('/users/{id}/reset-password', [AdminController::class, 'userResetPassword'])->name('admin.users.reset-password');
    Route::post('/users/{id}/activate', [AdminController::class, 'userActivate'])->name('admin.users.activate');
    Route::post('/users/{id}/deactivate', [AdminController::class, 'userDeactivate'])->name('admin.users.deactivate');
    Route::post('/users/{id}/send-email', [AdminController::class, 'userSendEmail'])->name('admin.users.send-email');
    Route::get('/users/export/{format}', [AdminController::class, 'usersExport'])->name('admin.users.export');
    
    // Gestion des partenaires
    Route::get('/partners', [AdminController::class, 'partnersList'])->name('admin.partners.list');
    Route::get('/partners/create', [AdminController::class, 'partnerCreate'])->name('admin.partners.create');
    Route::post('/partners', [AdminController::class, 'partnerStore'])->name('admin.partners.store');
    Route::get('/partners/{id}', [AdminController::class, 'partnerShow'])->name('admin.partners.show');
    Route::get('/partners/{id}/edit', [AdminController::class, 'partnerEdit'])->name('admin.partners.edit');
    Route::put('/partners/{id}', [AdminController::class, 'partnerUpdate'])->name('admin.partners.update');
    Route::delete('/partners/{id}', [AdminController::class, 'partnerDestroy'])->name('admin.partners.destroy');
    Route::get('/partners/export/{format}', [AdminController::class, 'partnersExport'])->name('admin.partners.export');
    
    // Gestion des voyages
    Route::get('/voyages', [AdminController::class, 'voyagesList'])->name('admin.voyages.list');
    Route::get('/voyages/create', [AdminController::class, 'voyageCreate'])->name('admin.voyages.create');
    Route::post('/voyages', [AdminController::class, 'voyageStore'])->name('admin.voyages.store');
    Route::get('/voyages/{id}', [AdminController::class, 'voyageShow'])->name('admin.voyages.show');
    Route::get('/voyages/{id}/edit', [AdminController::class, 'voyageEdit'])->name('admin.voyages.edit');
    Route::put('/voyages/{id}', [AdminController::class, 'voyageUpdate'])->name('admin.voyages.update');
    Route::delete('/voyages/{id}', [AdminController::class, 'voyageDestroy'])->name('admin.voyages.destroy');
    Route::get('/voyages/export/{format}', [AdminController::class, 'voyagesExport'])->name('admin.voyages.export');
    
    // Gestion des réservations
    Route::get('/reservations', [AdminController::class, 'reservationsList'])->name('admin.reservations.list');
    Route::get('/reservations/{id}', [AdminController::class, 'reservationShow'])->name('admin.reservations.show');
    Route::put('/reservations/{id}/confirm', [AdminController::class, 'reservationConfirm'])->name('admin.reservations.confirm');
    Route::put('/reservations/{id}/cancel', [AdminController::class, 'reservationCancel'])->name('admin.reservations.cancel');
    Route::get('/reservations/export/{format}', [AdminController::class, 'reservationsExport'])->name('admin.reservations.export');
    
    // Gestion des paiements
    Route::get('/payments', [AdminController::class, 'paymentsList'])->name('admin.payments.list');
    Route::get('/payments/{id}', [AdminController::class, 'paymentShow'])->name('admin.payments.show');
    Route::post('/payments/{id}/confirm', [AdminController::class, 'paymentConfirm'])->name('admin.payments.confirm');
    Route::post('/payments/{id}/refund', [AdminController::class, 'paymentRefund'])->name('admin.payments.refund');
    Route::post('/payments/{id}/add-note', [AdminController::class, 'paymentAddNote'])->name('admin.payments.add-note');
    Route::get('/payments/export/{format}', [AdminController::class, 'paymentsExport'])->name('admin.payments.export');
    Route::get('/payments/{id}/receipt', [AdminController::class, 'paymentExportReceipt'])->name('admin.payments.export.receipt');
    
    // Gestion des destinations
    Route::get('/destinations', [AdminController::class, 'destinationsList'])->name('admin.destinations.list');
    Route::get('/destinations/create', [AdminController::class, 'destinationCreate'])->name('admin.destinations.create');
    Route::post('/destinations', [AdminController::class, 'destinationStore'])->name('admin.destinations.store');
    Route::get('/destinations/{id}/edit', [AdminController::class, 'destinationEdit'])->name('admin.destinations.edit');
    Route::put('/destinations/{id}', [AdminController::class, 'destinationUpdate'])->name('admin.destinations.update');
    Route::delete('/destinations/{id}', [AdminController::class, 'destinationDestroy'])->name('admin.destinations.destroy');
    Route::get('/destinations/export/{format}', [AdminController::class, 'destinationsExport'])->name('admin.destinations.export');
    
    // Rapports et statistiques
    Route::get('/reports', [AdminController::class, 'reports'])->name('admin.reports');
    Route::get('/reports/export/{type}/{format}', [AdminController::class, 'reportsExport'])->name('admin.reports.export');
    
    // Paramètres du site
    Route::get('/settings', [AdminController::class, 'settings'])->name('admin.settings');
    Route::put('/settings/{section}', [AdminController::class, 'settingsUpdate'])->name('admin.settings.update');
    Route::post('/settings/test-email', [AdminController::class, 'settingsTestEmail'])->name('admin.settings.test-email');
    
    // Gestion des sauvegardes
    Route::post('/backups/run', [AdminController::class, 'backupsRun'])->name('admin.backups.run');
    Route::get('/backups/{filename}/download', [AdminController::class, 'backupsDownload'])->name('admin.backups.download');
    Route::delete('/backups/{filename}', [AdminController::class, 'backupsDestroy'])->name('admin.backups.destroy');
});

// Routes pour les partenaires
Route::prefix('partner')->middleware(['auth', 'role:partenaire'])->group(function () {
    Route::get('/dashboard', [PartnerController::class, 'dashboard'])->name('partner.dashboard');
    
    // Gestion des voyages (offres)
    Route::get('/voyages', [PartnerController::class, 'voyagesList'])->name('partner.voyages.list');
    Route::get('/voyages/create', [PartnerController::class, 'voyageCreate'])->name('partner.voyages.create');
    Route::post('/voyages', [PartnerController::class, 'voyageStore'])->name('partner.voyages.store');
    Route::get('/voyages/{id}', [PartnerController::class, 'voyageShow'])->name('partner.voyages.show');
    Route::get('/voyages/{id}/edit', [PartnerController::class, 'voyageEdit'])->name('partner.voyages.edit');
    Route::put('/voyages/{id}', [PartnerController::class, 'voyageUpdate'])->name('partner.voyages.update');
    Route::delete('/voyages/{id}', [PartnerController::class, 'voyageDestroy'])->name('partner.voyages.destroy');
    
    // Gestion des destinations (utilisant DestinationController)
    Route::get('/destinations', [DestinationController::class, 'index'])->name('partner.destinations.list');
    Route::get('/destinations/create', [DestinationController::class, 'create'])->name('partner.destinations.create');
    Route::post('/destinations', [DestinationController::class, 'store'])->name('partner.destinations.store');
    Route::get('/destinations/{id}/edit', [DestinationController::class, 'edit'])->name('partner.destinations.edit');
    Route::put('/destinations/{id}', [DestinationController::class, 'update'])->name('partner.destinations.update');
    Route::delete('/destinations/{id}', [DestinationController::class, 'destroy'])->name('partner.destinations.destroy');
    
    // Gestion des clients
    Route::get('/clients', [PartnerController::class, 'clientsList'])->name('partner.clients.list');
    Route::get('/clients/{id}', [PartnerController::class, 'clientShow'])->name('partner.clients.show');
    
    // Gestion des paiements
    Route::get('/payments', [PartnerController::class, 'paymentsList'])->name('partner.payments.list');
    Route::get('/payments/{id}', [PartnerController::class, 'paymentShow'])->name('partner.payments.show');
    
    // Gestion des avis
    Route::get('/reviews', [PartnerController::class, 'reviewsList'])->name('partner.reviews.list');
    Route::get('/reviews/{id}', [PartnerController::class, 'reviewShow'])->name('partner.reviews.show');
    Route::post('/reviews/{id}/reply', [PartnerController::class, 'reviewReply'])->name('partner.reviews.reply');
    
    // Gestion de l'agence
    Route::get('/agency', [PartnerController::class, 'agencyShow'])->name('partner.agency.show');
    Route::get('/agency/edit', [PartnerController::class, 'agencyEdit'])->name('partner.agency.edit');
    Route::put('/agency', [PartnerController::class, 'agencyUpdate'])->name('partner.agency.update');
});

// Routes pour les clients
Route::prefix('client')->middleware(['auth', 'role:client'])->group(function () {
    Route::get('/dashboard', [ClientController::class, 'dashboard'])->name('client.dashboard');
    
    // Gestion des réservations
    Route::get('/reservations/add', [ClientController::class, 'addReservation'])->name('client.reservations.add');
    Route::get('/reservations', [ClientController::class, 'listReservations'])->name('client.reservations.list');
    Route::get('/reservations/{id}', [ClientController::class, 'showReservation'])->name('client.reservations.show');
    Route::post('/reservations/{id}/cancel', [ClientController::class, 'cancelReservation'])->name('client.reservations.cancel');
    Route::get('/reservations/{id}/confirmation', [ClientController::class, 'confirmationReservation'])->name('client.reservations.confirmation');
    
    // Gestion du profil
    Route::get('/profile', [ClientController::class, 'profile'])->name('client.profile');
    Route::get('/profile/edit', [ClientController::class, 'editProfile'])->name('client.profile.edit');
    Route::put('/profile', [ClientController::class, 'updateProfile'])->name('client.profile.update');
});
 // Ajoutez cette route en dehors des groupes de middleware pour tester
Route::get('/test-reservation', [ClientController::class, 'addReservation'])->name('test.reservation');




// Redirection de la route /home vers la route appropriée
Route::get('/home', function () {
    return redirect()->route('dashboard');
})->name('home');

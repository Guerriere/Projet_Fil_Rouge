<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\PartnerRegistrationController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\DestinationController;

use App\Http\Controllers\HomeController;

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClientController;
use App\Http\Controllers\VoyageController;

// Redirection après connexion
Route::get('/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/home', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('home');
// Routes pour l'administrateur
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/partners/add', [AdminController::class, 'addPartner'])->name('partners.add');
    Route::get('/partners/list', [AdminController::class, 'listPartners'])->name('partners.list');
});
// Routes pour les clients
Route::middleware(['auth', \App\Http\Middleware\EnsureUserIsClient::class])->group(function () {
    // Dashboard
    Route::get('/client/dashboard', [ClientController::class, 'dashboard'])->name('client.dashboard');
    
    // Profil
    Route::get('/client/profile', [ClientController::class, 'profile'])->name('client.profile');
    Route::get('/client/profile/edit', [ClientController::class, 'editProfile'])->name('client.profile.edit');
    Route::put('/client/profile/update', [ClientController::class, 'updateProfile'])->name('client.profile.update');
    
    // Réservations
    Route::get('/client/reservations', [ClientController::class, 'listReservations'])->name('client.reservations.list');
    Route::get('/client/reservations/add', [ClientController::class, 'addReservation'])->name('client.reservations.add');
    Route::get('/client/reservations/{id}', [ClientController::class, 'showReservation'])->name('client.reservations.show');
    Route::put('/client/reservations/{id}/cancel', [ClientController::class, 'cancelReservation'])->name('client.reservations.cancel');
    Route::get('/client/reservations/{id}/confirmation', [ClientController::class, 'confirmationReservation'])->name('client.reservations.confirmation');
});

// Routes pour le partenaire
Route::middleware(['auth',])->prefix('partner')->name('partner.')->group(function () {
    Route::get('/dashboard', [PartnerController::class, 'dashboard'])->name('dashboard');
    Route::get('/offers/add', [PartnerController::class, 'addOffer'])->name('offers.add');
    Route::get('/offers/list', [PartnerController::class, 'listOffers'])->name('offers.list');
    Route::get('/clients/add', [PartnerController::class, 'addClient'])->name('clients.add');
    Route::get('/clients/list', [PartnerController::class, 'listClients'])->name('clients.list');
    Route::get('/reservations/add', [PartnerController::class, 'addReservation'])->name('reservations.add');
    Route::get('/reservations/list', [PartnerController::class, 'listReservations'])->name('reservations.list');
    Route::get('/payments/list', [PartnerController::class, 'listPayments'])->name('payments.list');
    Route::get('/reviews/list', [PartnerController::class, 'listReviews'])->name('reviews.list');

    
    //Route pour les destinations
    Route::get('/destinations/add', [DestinationController::class, 'create'])->name('destinations.add');
    Route::post('/destinations/store', [DestinationController::class, 'store'])->name('destinations.store');
    Route::get('/destinations/list', [DestinationController::class, 'index'])->name('destinations.list');
    Route::get('/destinations/edit/{id}', [DestinationController::class, 'edit'])->name('destinations.edit');
    Route::put('/destinations/update/{id}', [DestinationController::class, 'update'])->name('destinations.update');
    Route::delete('/destinations/delete/{id}', [DestinationController::class, 'destroy'])->name('destinations.delete');

    // Routes pour les Voyages
    Route::get('/offers/add', [VoyageController::class, 'create'])->name('offers.add');
    Route::post('/offers/store', [VoyageController::class, 'store'])->name('offers.store');
    Route::get('/offers/list', [VoyageController::class, 'index'])->name('offers.list');
    Route::get('/offers/edit/{id}', [VoyageController::class, 'edit'])->name('offers.edit');
    Route::put('/offers/update/{id}', [VoyageController::class, 'update'])->name('offers.update');
    Route::delete('/offers/delete/{id}', [VoyageController::class, 'destroy'])->name('offers.delete');


});



// Routes pour le profil utilisateur
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
   //Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Routes pour modifier le profil du partenaire
    Route::get('/partner/edit', [PartnerController::class, 'edit'])->name('partner.edit');
    Route::put('/partner/update', [PartnerController::class, 'update'])->name('partner.update');
    Route::get('/partner/profile', [PartnerController::class, 'show'])->name('partner.show');
    Route::delete('/partner/delete', [PartnerController::class, 'destroy'])->name('partner.destroy');

});

// Routes pour les réservations
Route::middleware(['auth'])->group(function () {
    Route::get('/mes-reservations', [App\Http\Controllers\ReservationController::class, 'index'])->name('reservation.index');
    Route::get('/reservation/{reservation}', [App\Http\Controllers\ReservationController::class, 'show'])->name('reservation.show');
    Route::post('/reservation', [App\Http\Controllers\ReservationController::class, 'store'])->name('reservation.store');
    Route::put('/reservation/{reservation}/cancel', [App\Http\Controllers\ReservationController::class, 'cancel'])->name('reservation.cancel');
    Route::get('/reservation/{reservation}/confirmation', [App\Http\Controllers\ReservationController::class, 'confirmation'])->name('reservation.confirmation');
});

// Pages accessibles sans authentification
Route::get('/', [PageController::class, 'accueil'])->name('accueil');
Route::get('about', [PageController::class, 'about'])->name('about');
Route::get('contact', [PageController::class, 'contact'])->name('contact');
Route::get('services', [PageController::class, 'services'])->name('services');
Route::get('booking', [PageController::class, 'booking'])->name('booking');
Route::get('faq', [PageController::class, 'faq'])->name('faq');
Route::get('error', [PageController::class, 'error'])->name('error');
// Routes pour les agences
Route::get('/agence', [App\Http\Controllers\AgenceController::class, 'index'])->name('agence.index');
Route::get('/agence/{id}', [App\Http\Controllers\AgenceController::class, 'show'])->name('agence.show');
// Route pour afficher un voyage spécifique après connexion
Route::get('/agence/voyage/{voyage}', [App\Http\Controllers\AgenceController::class, 'showVoyage'])->name('agence.show.voyage');

require __DIR__.'/auth.php';
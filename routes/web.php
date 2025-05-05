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


// Redirection après connexion
Route::get('/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/home', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('home');
// Routes pour l'administrateur
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
   // Route::resource('users', UserController::class);
    //Route::resource('agences', AgenceController::class);
});

// Routes pour le partenaire
Route::middleware(['auth',])->prefix('partner')->name('partner.')->group(function () {
    Route::get('/dashboard', [PartnerController::class, 'dashboard'])->name('dashboard');
    // Autres routes partenaire...
});

// Routes pour le gestionnaire
Route::middleware(['auth',])->prefix('manager')->name('manager.')->group(function () {
    Route::get('/dashboard', [ManagerDashboardController::class, 'index'])->name('dashboard');
  //  Route::resource('voyages', VoyageController::class);
    Route::resource('destinations', DestinationController::class);
    Route::get('reservations', [ReservationController::class, 'index'])->name('reservations.index');
});

// Routes pour le profil utilisateur
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
   // Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Pages accessibles sans authentification
Route::get('/', [PageController::class, 'accueil'])->name('accueil');
Route::get('about', [PageController::class, 'about'])->name('about');
Route::get('contact', [PageController::class, 'contact'])->name('contact');
Route::get('services', [PageController::class, 'services'])->name('services');
Route::get('booking', [PageController::class, 'booking'])->name('booking');
Route::get('faq', [PageController::class, 'faq'])->name('faq');
Route::get('error', [PageController::class, 'error'])->name('error');
Route::get('agence', [PageController::class, 'agence'])->name('agence');

require __DIR__.'/auth.php';
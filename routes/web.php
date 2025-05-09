<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ClientController;

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

// Routes publiques
Route::get('/', [HomeController::class, 'index'])->name('home');

// Routes d'authentification
Auth::routes();

// Routes pour l'administrateur
Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    
    // Gestion des utilisateurs
    Route::get('/users', [AdminController::class, 'usersList'])->name('admin.users.list');
    Route::get('/users/create', [AdminController::class, 'userCreate'])->name('admin.users.create');
    Route::post('/users', [AdminController::class, 'userStore'])->name('admin.users.store');
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
    // Autres routes pour les partenaires...
});

// Routes pour les clients
Route::prefix('client')->middleware(['auth', 'role:client'])->group(function () {
    Route::get('/dashboard', [ClientController::class, 'dashboard'])->name('client.dashboard');
    // Autres routes pour les clients...
});
<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\PartnerRegistrationController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\User;

Route::get('/', function () {
    return view('accueil');
});

//Ajouter des routes pour les différents formulaires d'inscription
Route::get('/register/partner', [PartnerRegistrationController::class, 'showRegistrationForm'])->name('register.partner');
Route::post('/register/partner', [PartnerRegistrationController::class, 'register']);

Route::get('/dashboard', function () {

    $user = Auth::user();
    
    if ($user->role === 'admin') {
        return redirect()->route('admin.dashboard');
    } elseif ($user->role === 'partenaire') {
        return redirect()->route('partner.dashboard');
    }
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    // Autres routes admin...
});

Route::middleware(['auth', 'role:partenaire'])->prefix('partner')->group(function () {
    Route::get('/dashboard', [PartnerController::class, 'dashboard'])->name('partner.dashboard');
    // Autres routes partenaire...
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\AdminOnly;
use App\Models\Article;

// 🔹 API PUBLIQUE POUR LES PARFUMS (vue par clients + admin)
Route::get('/api/parfums', function () {
    return Article::all();
});


// Redirection automatique vers /register (pour le back)
Route::get('/', function () {
    return redirect('/register');
});

// Page d'inscription (register)
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Page de connexion
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// 🔥 ROUTES ADMIN PROTÉGÉES PAR auth + AdminOnly
Route::middleware(['auth', AdminOnly::class])->group(function () {

    // Page admin (liste des parfums)
    Route::get('/admin', [AdminController::class, 'admin'])->name('admin');

    // Ajouter un parfum
    Route::get('/ajouter-parfum', [AdminController::class, 'ajouter'])->name('ajouter-parfum');
    Route::post('/ajouter-parfum', [AdminController::class, 'store']);

    // Supprimer un parfum (page de confirmation)
    Route::get('/supprimer-parfum/{article}', [AdminController::class, 'supprimerPage'])->name('supprimer-parfum');

    // Action de suppression
    Route::delete('/supprimer-parfum/{article}', [AdminController::class, 'supprimer']);
});

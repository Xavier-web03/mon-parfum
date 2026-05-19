<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\AdminOnly;
use App\Models\Article;

// 🔹 API PUBLIQUE POUR LES PARFUMS
Route::get('/api/parfums', function () {
    return Article::all();
});

// 🔹 PAGE D’ACCUEIL DU BACKEND (API)
Route::get('/', function () {
    return response()->json([
        'status' => 'Backend Laravel OK',
        'api' => url('/api/parfums')
    ]);
});

// 🔥 ROUTES ADMIN PROTÉGÉES
Route::middleware(['auth', AdminOnly::class])->group(function () {

    Route::get('/admin', [AdminController::class, 'admin'])->name('admin');

    Route::get('/ajouter-parfum', [AdminController::class, 'ajouter'])->name('ajouter-parfum');
    Route::post('/ajouter-parfum', [AdminController::class, 'store']);

    Route::get('/supprimer-parfum/{article}', [AdminController::class, 'supprimerPage'])->name('supprimer-parfum');
    Route::delete('/supprimer-parfum/{article}', [AdminController::class, 'supprimer']);
});

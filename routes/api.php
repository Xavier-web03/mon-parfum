<?php

use Illuminate\Support\Facades\Route;
use App\Models\Article;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
| Toutes les routes ici seront automatiquement préfixées par /api
| Exemple : Route::get('/parfums') => /api/parfums
|--------------------------------------------------------------------------
*/

// 🔹 API PUBLIQUE : liste des parfums
Route::get('/parfums', function () {
    return Article::all();
});

// 🔹 API AUTH (version API, pas les pages HTML)
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

// 🔥 API ADMIN (protégée)
Route::middleware(['auth:sanctum'])->group(function () {

    // Liste admin
    Route::get('/admin', [AdminController::class, 'admin']);

    // Ajouter parfum
    Route::post('/ajouter-parfum', [AdminController::class, 'store']);

    // Supprimer parfum
    Route::delete('/supprimer-parfum/{article}', [AdminController::class, 'supprimer']);
});

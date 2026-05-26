<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\AdminOnly;

// 🔹 PAGE D’ACCUEIL DU BACKEND (API)
Route::get('/', function () {
    return response()->json([
        'status' => 'Backend Laravel OK',
        'api' => url('/api/parfums')
    ]);
});

// 🔹 AUTH (pages HTML)
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// 🔥 ROUTES ADMIN (HTML)
Route::middleware(['auth', AdminOnly::class])->group(function () {

    Route::get('/admin', [AdminController::class, 'admin'])->name('admin');

    Route::get('/ajouter-parfum', [AdminController::class, 'ajouter'])->name('ajouter-parfum');
    Route::post('/ajouter-parfum', [AdminController::class, 'store']);

    Route::get('/supprimer-parfum/{article}', [AdminController::class, 'supprimerPage'])->name('supprimer-parfum');
    Route::delete('/supprimer-parfum/{article}', [AdminController::class, 'supprimer']);
});

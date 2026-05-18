<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    // Afficher la page de connexion
    public function showLogin()
    {
        return view('login');
    }

    // Connexion
    public function login(Request $request)
    {
        // Validation des champs
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Tentative de connexion
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/admin');
        }

        // Si identifiants incorrects
        return back()->withErrors([
            'email' => 'Identifiants incorrects'
        ]);
    }

    // Déconnexion
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    // Afficher la page d'inscription
    public function showRegister()
    {
        return view('register');
    }

    // Inscription
    public function register(Request $request)
    {
        // Validation
        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);

        // Création du compte
        User::create([
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        // Redirection vers login
        return redirect('/login')->with('success', 'Compte créé avec succès. Vous pouvez vous connecter.');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class AdminController extends Controller
{
    public function admin()
    {
        $articles = Article::all();
        return view('admin', compact('articles'));
    }

    public function ajouter()
    {
        return view('ajouter-parfum');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prix' => 'required|integer',
            'image' => 'required|image'
        ]);

        $imagePath = $request->file('image')->store('articles', 'public');

        Article::create([
            'nom' => $request->nom,
            'prix' => $request->prix,
            'description' => $request->description,
            'image' => $imagePath
        ]);

        return redirect('/admin');
    }

    public function supprimerPage(Article $article)
    {
        return view('supprimer-parfum', compact('article'));
    }

    public function supprimer(Article $article)
    {
        $article->delete();
        return redirect('/admin');
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminOnly
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Si l'utilisateur n'est pas connecté → redirection vers le front
        if (!auth()->check()) {
            return redirect('https://xavier-web03.github.io/parfum');
        }

        // Vérifier que l'utilisateur connecté est bien l'admin
        if (auth()->user()->email !== 'bakayokokader211@gmail.com') {
            return redirect('https://xavier-web03.github.io/parfum');
        }

        return $next($request);
    }
}

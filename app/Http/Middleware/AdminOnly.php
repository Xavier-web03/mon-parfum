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
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Si l'utilisateur n'est pas connecté → redirection vers le front
        if (!auth()->check()) {
            return redirect('https://xavier-web03.github.io/parfum');
        }

        // Si l'utilisateur est connecté mais n'est pas admin → redirection vers le front
        if (auth()->user()->role !== 'admin') {
            return redirect('https://xavier-web03.github.io/parfum');
        }

        return $next($request);
    }
}

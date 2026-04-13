<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ForceHttps
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Skip for local development
        if (app()->environment('local')) {
            return $next($request);
        }

        // Force HTTPS for all other environments
        if (!$request->secure() && app()->environment('production')) {
            return redirect()->secure($request->path());
        }

        return $next($request);
    }
}

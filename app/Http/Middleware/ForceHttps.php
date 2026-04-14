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

        // Check if the request is HTTPS, considering proxy headers (X-Forwarded-Proto)
        // This is important when behind reverse proxies like nginx, Cloudflare, etc.
        $isHttps = $request->secure() || 
                   $request->headers->get('X-Forwarded-Proto') === 'https' ||
                   $request->server->get('HTTP_X_FORWARDED_PROTO') === 'https' ||
                   $request->server->get('HTTPS') === 'on' ||
                   $request->server->get('HTTPS') == 1 ||
                   $request->server->get('SERVER_PORT') == 443;

        // Force HTTPS for all other environments
        // Only redirect GET/HEAD requests to avoid losing POST data and method
        if (!$isHttps && app()->environment('production') && ($request->isMethod('GET') || $request->isMethod('HEAD'))) {
            return redirect()->secure($request->path());
        }

        // If already HTTPS, ensure the request scheme is set correctly for URL generation
        if ($isHttps && !$request->secure()) {
            $request->server->set('HTTPS', 'on');
        }

        return $next($request);
    }
}

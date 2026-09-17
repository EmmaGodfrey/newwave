<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SearchIndexing
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);
        if ($request->is('admin', 'admin/*', 'login', 'password/*', 'email/*') || $response->getStatusCode() >= 400) {
            $response->headers->set('X-Robots-Tag', 'noindex, nofollow');
        }
        return $response;
    }
}

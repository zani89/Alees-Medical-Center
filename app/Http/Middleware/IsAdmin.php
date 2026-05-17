<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->user() || ($request->user()->role !== 'admin' && $request->user()->email !== env('ADMIN_EMAIL', 'admin@aleesmedical.com'))) {
            abort(403, 'Unauthorized access. Only the designated administrator can enter this area.');
        }

        return $next($request);
    }
}

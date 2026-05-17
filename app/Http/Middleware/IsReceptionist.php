<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsReceptionist
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->user() || $request->user()->role !== 'receptionist') {
            abort(403, 'Unauthorized access. Only receptionist staff can access this area.');
        }

        return $next($request);
    }
}

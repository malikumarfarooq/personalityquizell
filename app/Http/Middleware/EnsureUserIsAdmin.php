<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        if (! $request->user() || ! $request->user()->isAdmin()) {
//            dd('Not authenticated', auth()->user());
            abort(403, 'Unauthorized access');
        }
        if (!auth()->user()->isAdmin()) {
//            dd('User is not admin', auth()->user()->toArray());
        }
        return $next($request);
    }
}


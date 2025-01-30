<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Role
{
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if (!$request->user() || $request->user()->role !== $role) {
            if ($role === 'admin') {
                return redirect()->route('dashboard')
                    ->with('error', 'You do not have permission to access this area.');
            }

            return redirect()->route('admin.dashboard')
                ->with('error', 'This area is for regular users only.');
        }

        return $next($request);
    }
}

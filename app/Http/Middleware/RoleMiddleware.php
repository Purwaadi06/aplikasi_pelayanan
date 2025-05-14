<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next, ...$roles)
{
    if (!auth()->check()) {
        return redirect()->route('login');
    }

    $user = auth()->user();

    if (in_array($user->role, $roles)) {
        return $next($request);
    }

    // Cegah redirect loop
    if ($user->role === 'admin') {
        return redirect()->route('dashboard');
    } elseif ($user->role === 'user') {
        return redirect()->route('user.dashboard');
    }

    abort(403); // kalau tidak sesuai peran
}
}





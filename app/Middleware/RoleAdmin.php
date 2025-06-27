<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

     public function handle($request, Closure $next)
    {
        // Cek apakah user sudah login
        if (Auth::check() && Auth::user()->role === 'admin') {
        // User adalah admin, lanjutkan request
        return $next($request);
        }
        // Jika bukan admin, tolak akses dengan status 403 Forbidden
        abort(403, 'Akses ditolak. Hanya admin yang boleh.');
    }

}

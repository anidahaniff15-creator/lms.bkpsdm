<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleManager
{
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $userRole = Auth::user()->role;

        if ($userRole === $role) {
            return $next($request);
        }

        // Jika peserta mencoba akses halaman admin
        if ($userRole === 'peserta') {
            return redirect()->route('dashboard');
        }

        // Jika admin mencoba akses halaman peserta
        if ($userRole === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        return redirect('/');
    }
}
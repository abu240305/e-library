<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Cek_login
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        // Cek apakah user sudah login, jika belum kembali ke halaman login
        if (!Auth::check()) {
            return redirect('login')->with('error', 'Silakan login terlebih dahulu.');
        }
    
        // Ambil data user yang sedang login
        $user = Auth::user();
    
        // Cek apakah user memiliki role yang sesuai
        if ($user->role == $role) {
            return $next($request);
        }
    
        // Jika user tidak memiliki akses (role tidak sesuai), logout dan redirect ke halaman login
        Auth::logout();
        return redirect('login')->with('error', 'Maaf, Anda tidak memiliki akses.');
    }
}    
<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response; // Use the correct import
use Illuminate\Support\Facades\Auth;

class Islogin
{
    public function handle(Request $request, Closure $next): Response // Use the correct return type
    {
        if (Auth::check()) {
            return $next($request);
        } else {
            return response(view('halaman-error'));
        }
    }
}

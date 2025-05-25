<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Association
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */


    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();
        if (!$user) {
            return redirect()->route('frontend.home');
        }
        if ($user->user_type == 'association') {
            return $next($request);
        } elseif ($user->user_type == 'admin') {
            return redirect()->route('admin.home');
        } else {
            \Auth::logout();
            return redirect()->route('frontend.home');
        }

    }
}


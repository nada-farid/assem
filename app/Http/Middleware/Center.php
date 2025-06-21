<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Center
{
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();
        if (!$user) {
            return redirect()->route('frontend.home');
        } elseif ($user->user_type == 'center') {
            return $next($request);
        } elseif ($user->user_type == 'association') {
            return redirect()->route('association.home');
        } elseif ($user->user_type == 'staff') {
            return redirect()->route('admin.home');
        } else {
            $user::logout();
            return redirect()->route('frontend.home');
        }

    }
}

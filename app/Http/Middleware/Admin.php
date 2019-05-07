<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user()->group->id != 2 && Auth::user()->group->id != 3) {
            Alert::add("alert-danger", "Vous n'avez pas de droit d'administration.");

            return redirect('home');
        }
        return $next($request);
    }
}

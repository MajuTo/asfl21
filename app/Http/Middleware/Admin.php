<?php

namespace App\Http\Middleware;

use App\Helpers\Alert;
use Closure;
use Illuminate\Http\Request;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->user()->group->id != 2 && auth()->user()->group->id != 3) {
            Alert::add("alert-danger", "Vous n'avez pas de droit d'administration.");

            return redirect()->route('home');
        }
        return $next($request);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    /**
     * The layout that should be used for responses.
     */
    protected $layout = 'layouts.index';


    /**
     * @return View|mixed
     * @throws BindingResolutionException
     */
    public function home()
    {
        return view()->make('accueil.home');
    }
}

<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    /**
     * The layout that should be used for responses.
     */
    protected $layout = 'layouts.index';


    public function home()
    {
        return view()->make('accueil.home');
    }
}

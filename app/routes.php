<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@home');
Route::get('notre-metier', ['as' => 'notremetier', 'uses' => 'HomeController@home']);
Route::get('nous-trouver', ['as' => 'noustrouver', 'uses' => 'HomeController@def']);
Route::get('membres', ['as' => 'membres', 'uses' => 'HomeController@def']);

Route::get('contact', ['as' => 'contact', 'uses' => 'HomeController@contact']);
Route::post('contact', ['as' => 'sendcontact', 'uses' => 'HomeController@sendcontact']);


/*

Route::get('article/{n}', function($n) { 
    return View::make('article')->with('numero', $n); 
})->where('n', '[0-9]+');

App::missing(function()
{
    return Response::make('Page inconnue !', 404);
});

*/
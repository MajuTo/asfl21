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

Route::when('*', 'csrf', ['post', 'put', 'patch', 'delete']);

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@home']);
Route::get('notre-metier', ['as' => 'notremetier', 'uses' => 'HomeController@activities']);
Route::get('nous-trouver', ['as' => 'noustrouver', 'uses' => 'HomeController@def']);

Route::get('contact', ['as' => 'contact', 'uses' => 'HomeController@contact']);
Route::post('contact', ['as' => 'sendcontact', 'uses' => 'HomeController@sendcontact']);


// RESTful route => see php artisan routes

/* AUTHENTIFICATION */
Route::get('login', ['as' => 'login', 'uses' => 'SessionsController@create']);
Route::get('logout', ['as' => 'logout', 'uses' => 'SessionsController@destroy']);
Route::resource('sessions', 'SessionsController', ['only' => ['create', 'store', 'destroy']]);

Route::group([
    'before' => 'auth',
    ], function(){
        
        /* ADMIN */
        Route::group(['before' => 'admin'], function(){
            Route::resource('admin', 'AdminController');
        });

        /* Change pwd after first login */
        Route::resource('change', 'ChangeController', ['only' => ['edit', 'update']]);
        
        /* USER */
        Route::resource('user', 'UserController');
        Route::put('updatePseudo/{pseudo}', ['as' => 'updatePseudo', 'uses' => 'UserController@updatePseudo']);
        /* with prefix */
        Route::group([
            'prefix' => 'admin',
            ], function(){
                Route::get('user/create', ['as' => 'admin.user.create', 'uses' => 'UserController@create']);
            }
        );

        Route::resource('member', 'UserController');
    }
);



// to be deleted for production
Route::get('tinker', ['as' => 'tinker', 'uses' => 'SessionsController@tinker']);








/*

Route::get('article/{n}', function($n) { 
    return View::make('article')->with('numero', $n); 
})->where('n', '[0-9]+');

App::missing(function()
{
    return Response::make('Page inconnue !', 404);
});

*/
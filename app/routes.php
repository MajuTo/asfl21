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
Route::get('notre-metier', ['as' => 'notremetier', 'uses' => 'NotreMetierController@index']);
Route::get('nous-trouver', ['as' => 'noustrouver', 'uses' => 'NousTrouverController@index']);


Route::get('contact',  ['as' => 'contact', 'uses' => 'ContactController@index']);
Route::post('contact', ['as' => 'sendcontact', 'uses' => 'ContactController@sendcontact']);

Route::get('liens-utiles',  ['as' => 'link', 'uses' => 'LinkController@index']);
Route::get('partenaires',  ['as' => 'partner', 'uses' => 'PartnerController@index']);

// RESTful route => see php artisan routes

/* AUTHENTIFICATION */
Route::get('login', ['as' => 'login', 'uses' => 'SessionsController@create']);
Route::get('logout', ['as' => 'logout', 'uses' => 'SessionsController@destroy']);
Route::resource('sessions', 'SessionsController', ['only' => ['create', 'store', 'destroy', 'edit', 'update']]);

/* REGISTRATION */
Route::get('inscription/verification/{confirmation}', ['as' => 'confirmation', 'uses' => 'UserController@confirmation']);
/* PASSWORD RECOVERY */
Route::controller('password', 'RemindersController');

Route::resource('user', 'UserController', ['only' => ['show']]);
Route::post('user/{user}', ['as' => 'user.email', 'uses' => 'UserController@sendEmail']);
Route::resource('calendrier', 'CalendarController', ['only' => ['index', 'show', 'store']]);
Route::resource('adresse', 'AddressController');

/* MENTIONS LEGALES */
Route::get('mentions', ['as' => 'mentions', 'uses' => function(){
    return View::make('mentions');
}]);

/* AJAX */
/* nous-trouver */
Route::post('getSfByActivity', ['as' => 'getSfByActivity', 'uses' => 'NousTrouverController@getSfByActivity']);

Route::group([
    'before' => 'auth',
    ], function(){

        /* Change pwd after first login */
        Route::get('sessions/{sessions}/edit', ['as' => 'sessions.edit', 'uses' => 'SessionsController@edit']);
        Route::put('sessions/{sessions}', ['as' => 'sessions.update', 'uses' => 'SessionsController@update']);
        
        /* USER */
        Route::resource('user', 'UserController', ['only' => ['edit', 'update']]);
        Route::put('user/activities/{user}', ['as' => 'user.updateActivities', 'uses' => 'UserController@updateActivities']);

        /* MESSAGE */
        Route::resource('message', 'MessageController');

        /* ADMIN */
        Route::group(['before' => 'admin'], function(){
            

            /* user with prefix */
            Route::group([
                'prefix' => 'admin',
                ], function(){
                    Route::get('/', ['as' => 'admin.index', 'uses' => 'UserController@index']); 
                    Route::resource('link', 'LinkController');
                    Route::resource('user', 'UserController');
                    Route::resource('adresse', 'AddressController');
                    Route::put('user/{user}/toggle', ['as' => 'admin.user.toggle', 'uses' => 'UserController@toggle']);
                    Route::put('user/activities/{user}', ['as' => 'admin.user.updateActivities', 'uses' => 'UserController@updateActivities']);
                    Route::resource('message', 'MessageController');
                    Route::resource('activity', 'ActivityController');
                    Route::resource('partner', 'PartnerController');
                }
            );
        });
    }
);
<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true, 'register' => false]);

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@home')->name('home');
//Route::get('/home', function () {
//    return redirect()->route('home');
//});
Route::get('notre-metier', 'NotreMetierController@index')->name('notremetier');
Route::get('nous-trouver', 'NousTrouverController@index')->name('noustrouver');


Route::get('contact',  'ContactController@index')->name('contact.index');
Route::post('contact', 'ContactController@sendcontact')->name('sendcontact');

Route::get('liens-utiles',  'LinkController@index')->name('link');
Route::get('partenaires', 'PartnerController@index')->name('partner');

// RESTful route => see php artisan routes

/* AUTHENTIFICATION */
//Route::get('login', 'SessionsController@create')->name('login');
//Route::get('logout', 'SessionsController@destroy')->name('logout');
//Route::resource('sessions', 'SessionsController', ['only' => ['create', 'store', 'destroy', 'edit', 'update']]);
//
///* REGISTRATION */
///* PASSWORD RECOVERY */
//Route::resource('password', 'RemindersController');
Route::get('inscription/verification/{confirmation}', 'UserController@confirmation')->name('confirmation');

// Route::resource('user', 'UserController', ['only' => ['show']]);
Route::get('sage-femme/{id}/{name}', 'UserController@show')->name('user.show');
Route::post('user/{user}', 'UserController@sendEmail')->name('user.email');
Route::resource('calendrier', 'CalendarController', ['only' => ['index', 'show', 'store']]);
Route::resource('adresse', 'AddressController');

/* MENTIONS LEGALES */
Route::get('mentions', function(){
    return view()->make('mentions');
})->name('mentions');

/* AJAX */
/* nous-trouver */
Route::post('getSfByActivity', 'NousTrouverController@getSfByActivity')->name('getSfByActivity');

Route::middleware(['verified', 'auth'])->group(function(){

    /* Change pwd after first login */
    Route::get('sessions/{sessions}/edit', 'SessionsController@edit')->name('sessions.edit');
    Route::put('sessions/{sessions}', 'SessionsController@update')->name('sessions.update');

    /* USER */
    Route::resource('user', 'UserController', ['only' => ['edit', 'update']]);
    Route::put('user/activities/{user}', 'UserController@updateActivities')->name('user.updateActivities');

    /* MESSAGE */
    Route::resource('message', 'MessageController');

    /* user with prefix */
    Route::prefix('admin')->name('admin.')->middleware(['admin'])->group(function(){
        Route::get('/', 'UserController@index')->name('index');
        Route::resource('link', 'LinkController');
        Route::resource('user', 'UserController');
        Route::resource('adresse', 'AddressController');
        Route::put('user/{user}/toggle', 'UserController@toggle')->name('user.toggle');
        Route::put('user/activities/{user}', 'UserController@updateActivities')->name('user.updateActivities');
        Route::get('user/sendagain/{user}', 'UserController@sendAgain')->name('user.sendagain');
        Route::resource('message', 'MessageController');
        Route::resource('activity', 'ActivityController');
        Route::resource('partner', 'PartnerController');
    });
});

Route::get('test', function () {
    $p = new \Symfony\Component\Process\Process('composer update');
    dump($p->run(), $p->getExitCode(), $p->getOutput());
})->middleware('verified');

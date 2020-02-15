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
//Route::get('login', 'SessionsController2@create')->name('login');
//Route::get('logout', 'SessionsController2@destroy')->name('logout');
//Route::resource('sessions', 'SessionsController2', ['only' => ['create', 'store', 'destroy', 'edit', 'update']]);
//
///* REGISTRATION */
///* PASSWORD RECOVERY */
//Route::resource('password', 'RemindersController');
Route::get('inscription/verification/{confirmation}', 'UserController@confirmation')->name('confirmation');

// Route::resource('user', 'UserController', ['only' => ['show']]);
Route::get('sage-femme/{id}/{name}', 'UserController@show')->name('user.show');
Route::post('user/{user}', 'UserController@sendEmail')->name('user.email');
Route::resource('calendrier', 'CalendarController', ['only' => ['index', 'show', 'store']]);

/* MENTIONS LEGALES */
Route::get('mentions', function(){
    return view()->make('mentions');
})->name('mentions');

/* AJAX */
/* nous-trouver */
Route::post('getSfByActivity', 'NousTrouverController@getSfByActivity')->name('getSfByActivity');

Route::middleware(['auth'])->group(function(){

    /* Change pwd after first login */
//    Route::get('sessions/{sessions}/edit', 'SessionsController@edit')->name('sessions.edit');
//    Route::put('sessions/{sessions}', 'SessionsController@update')->name('sessions.update');

    /* USER */
    Route::resource('user', 'UserController', ['only' => ['edit', 'update']]);
    Route::put('user/activities/{user}', 'UserController@updateActivities')->name('user.updateActivities');
    Route::put('user/update/password', 'UserController@updatePassword')->name('user.update.password');
    Route::resource('adresse', 'AddressController');

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
Route::get('clear', function () {
    Artisan::call('view:clear'); // Clear all compiled view files
    Artisan::call('config:clear'); // Remove the configuration cache file
    Artisan::call('cache:clear'); // Flush the application cache
    Artisan::call('optimize:clear'); // Remove the cached bootstrap files
    Artisan::call('route:clear'); // Remove the route cache file

    return back();
});

Route::get('/add', function () {
    $f = Faker\Factory::create('fr_FR');
    $user = new \App\User(request()->all());

    $user->name = $f->lastName;
    $user->firstname = $f->firstName;
    $user->username = $f->userName;
    $user->password = Hash::make(Str::random(8));
    $user->email = $f->email;
    $user->confirmation = $f->randomNumber(8);
    $user->group_id = 2;

    $user->save();

    Invytr::invite($user);;
});


Route::get('test', function () {
    $client = new \GuzzleHttp\Client();

    $g = new \Spatie\Geocoder\Geocoder($client);
    $g->setApiKey(env('GOOGLE_MAPS_API_KEY'));
    $g->setLanguage(env('GOOGLE_MAPS_LOCALE'));
     ['lat' => $lat, 'lng' => $lng] = Spatie\Geocoder\Facades\Geocoder::getCoordinatesForAddress('5 rue du Regiment de Bourgogne 21200 Beaune');
 dd(
     $lat, $lng,
     $g->getCoordinatesForAddress('5 rue du Regiment de Bourgogne 21200 Beaune')
);

    $t = new \GlaivePro\Invytr\Helpers\Translator();
        $t->replaceResponseLines();
    dd(
        app('translator'),
        app()->getLocale(),
        now()->addWeek()->format('d/m/Y H\Hi'),
        route('test', ['toto' => 'tata'])
    );
    auth()->loginUsingId(2);
    return redirect('/');
//    $p = new \Symfony\Component\Process\Process('composer update');
//    dump($p->run(), $p->getExitCode(), $p->getOutput());
})->name('test'); //->middleware('verified');

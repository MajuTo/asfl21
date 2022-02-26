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

//Route::get('/', [HomeController::class, 'home')->]name('home');
Route::view('/', 'accueil.home')->name('home');
Route::get('notre-metier', [\App\Http\Controllers\NotreMetierController::class, 'index'])->name('notremetier');
Route::get('nous-trouver', [\App\Http\Controllers\NousTrouverController::class, 'index'])->name('noustrouver');
Route::get('liens-utiles',  [\App\Http\Controllers\LinkController::class, 'index'])->name('link');
Route::get('partenaires', [\App\Http\Controllers\PartnerController::class, 'index'])->name('partner');

Route::get('contact',  [\App\Http\Controllers\ContactController::class, 'index'])->name('contact.index');
Route::post('contact', [\App\Http\Controllers\ContactController::class, 'sendContact'])->name('sendcontact');

Route::get('inscription/verification/{confirmation}', [\App\Http\Controllers\UserController::class, 'confirmation'])->name('confirmation');

// Route::resource('user', 'UserController', ['only' => ['show']]);
Route::get('sage-femme/{id}/{name}', [\App\Http\Controllers\UserController::class, 'show'])->name('user.show');
Route::post('user/{user}', [\App\Http\Controllers\UserController::class, 'sendEmail'])->name('user.email');
Route::resource('calendrier', \App\Http\Controllers\CalendarController::class, ['only' => ['index', 'show', 'store']]);

/* MENTIONS LEGALES */
Route::view('mentions', 'mentions')->name('mentions');

/* AJAX */
/* nous-trouver */
Route::post('getSfByActivity', [\App\Http\Controllers\NousTrouverController::class, 'getSfByActivity'])->name('getSfByActivity');

Route::middleware(['auth'])->group(function() {

    /* USER */
    Route::resource('user', \App\Http\Controllers\UserController::class, ['only' => ['edit', 'update']]);
    Route::put('user/activities/{user}', [\App\Http\Controllers\UserController::class, 'updateActivities'])->name('user.updateActivities');
    Route::put('user/update/password', [\App\Http\Controllers\UserController::class, 'updatePassword'])->name('user.update.password');
    Route::resource('adresse', \App\Http\Controllers\AddressController::class);

    /* MESSAGE */
    Route::resource('message', \App\Http\Controllers\MessageController::class);

    /* user with prefix */
    Route::prefix('admin')->name('admin.')->middleware(['admin'])->group(function() {
        Route::get('/', [\App\Http\Controllers\UserController::class, 'index'])->name('index');
        Route::resource('link', \App\Http\Controllers\LinkController::class);
        Route::resource('user', \App\Http\Controllers\UserController::class);
        Route::resource('adresse', \App\Http\Controllers\AddressController::class);
        Route::put('user/{user}/toggle', [\App\Http\Controllers\UserController::class, 'toggle'])->name('user.toggle');
        Route::put('user/activities/{user}', [\App\Http\Controllers\UserController::class, 'updateActivities'])->name('user.updateActivities');
        Route::get('user/sendagain/{user}', [\App\Http\Controllers\UserController::class, 'sendAgain'])->name('user.sendagain');
        Route::resource('message', \App\Http\Controllers\MessageController::class);
        Route::resource('activity', \App\Http\Controllers\ActivityController::class);
        Route::resource('partner', \App\Http\Controllers\PartnerController::class);
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

//Route::get('test', function () {
////    \App\EventGroup::with('events')->get()->dd();
//    $groups = [
//        0 => [
//            'id' => 0,
//            'class' => 'conception',
//            'content' => 'Conception'
//        ],
//        1 => [
//            'id' => 1,
//            'class' => 'consultation',
//            'content' => 'Consultation'
//        ],
//        2 => [
//            'id' => 2,
//            'class' => 'medical',
//            'content' => 'Médical'
//        ],
//        3 => [
//            'id' => 3,
//            'class' => 'administratif',
//            'content' => 'Administratif'
//        ],
//        4 => [
//            'id' => 4,
//            'class' => 'maternite',
//            'content' => 'Maternité'
//        ],
//        5 => [
//            'id' => 5,
//            'class' => 'naissance',
//            'content' => 'Naissance'
//        ]
//    ];
//    $events = [
//        0 => [
//            'date' => 0,
//            'title' => 'Conception',
//            'desc' => '',
//            'icon' => 'fa fa-venus-mars',
//            'group_id' => 0,
//            'week' => false,
//            'start' => null,
//            'end' => null
//        ],
//        1 => [
//            'date' => 6,
//            'title' => 'Consultation précoce du début de grossesse',
//            'desc' => '',
//            'icon' => 'fa fa-stethoscope',
//            'group_id' => 1,
//            'week' => true,
//            'start' => null,
//            'end' => null
//        ],
//        2 => [
//            'date' => 10,
//            'title' => '1ère échographie',
//            'desc' => 'Datation de la grossesse',
//            'icon' => 'fa fa-user-md',
//            'group_id' => 2,
//            'week' => true,
//            'start' => null,
//            'end' => null
//        ],
//        3 => [
//            'date' => 10,
//            'title' => 'Éventuel dépistage de la trisomie 21',
//            'desc' => '',
//            'icon' => 'fa fa-user-md',
//            'group_id' => 2,
//            'week' => true,
//            'start' => null,
//            'end' => null
//        ],
//        4 => [
//            'date' => 11,
//            'title' => 'Consultation du 3ème mois',
//            'desc' => '',
//            'icon' => 'fa fa-stethoscope',
//            'group_id' => 1,
//            'week' => true,
//            'start' => null,
//            'end' => null
//        ],
//        5 => [
//            'date' => 11,
//            'title' => 'Déclaration de grossesse',
//            'desc' => '',
//            'icon' => 'fa fa-calendar',
//            'group_id' => 3,
//            'week' => true,
//            'start' => null,
//            'end' => null
//        ],
//        6 => [
//            'date' => 14,
//            'title' => 'Éventuel dépistage (tardif) de la trisomie 21',
//            'desc' => '',
//            'icon' => 'fa fa-user-md',
//            'group_id' => 2,
//            'week' => true,
//            'start' => null,
//            'end' => null
//        ],
//        7 => [
//            'date' => 15,
//            'title' => 'Entretien pré-natal avec la sage femme pour la préparation à la naissance',
//            'desc' => '',
//            'icon' => 'fa fa-stethoscope',
//            'group_id' => 1,
//            'week' => true,
//            'start' => null,
//            'end' => null
//        ],
//        8 => [
//            'date' => 16,
//            'title' => 'Reconnaissance anticipée du père',
//            'desc' => '',
//            'icon' => 'fa fa-calendar',
//            'group_id' => 3,
//            'week' => true,
//            'start' => null,
//            'end' => null
//        ],
//        9 => [
//            'date' => 16,
//            'title' => 'Consultation du 4ème mois',
//            'desc' => '',
//            'icon' => 'fa fa-stethoscope',
//            'group_id' => 1,
//            'week' => true,
//            'start' => null,
//            'end' => null
//        ],
//        10 => [
//            'date' => 18,
//            'title' => 'Début de prise en charge 100% médical',
//            'desc' => '',
//            'icon' => 'fa fa-calendar',
//            'group_id' => 3,
//            'week' => true,
//            'start' => null,
//            'end' => null
//        ],
//        11 => [
//            'date' => 20,
//            'title' => 'Consultation 5ème mois',
//            'desc' => '',
//            'icon' => 'fa fa-stethoscope',
//            'group_id' => 1,
//            'week' => true,
//            'start' => null,
//            'end' => null
//        ],
//        12 => [
//            'date' => 20,
//            'title' => '2ème échographie, échographie morphologique',
//            'desc' => '',
//            'icon' => 'fa fa-user-md',
//            'group_id' => 2,
//            'week' => true,
//            'start' => null,
//            'end' => null
//        ],
//        13 => [
//            'date' => 23,
//            'title' => 'Biologie du 6ème mois',
//            'desc' => '',
//            'icon' => 'fa fa-user-md',
//            'group_id' => 2,
//            'week' => true,
//            'start' => null,
//            'end' => null
//        ],
//        14 => [
//            'date' => 24,
//            'title' => 'Consultation 6ème mois',
//            'desc' => '',
//            'icon' => 'fa fa-stethoscope',
//            'group_id' => 1,
//            'week' => true,
//            'start' => null,
//            'end' => null
//        ],
//        15 => [
//            'date' => 29,
//            'title' => 'Consultation 7ème mois (Maternité)',
//            'desc' => '',
//            'icon' => 'fa fa-h-square',
//            'group_id' => 4,
//            'week' => true,
//            'start' => null,
//            'end' => null
//        ],
//        16 => [
//            'date' => 30,
//            'title' => '3ème échographie',
//            'desc' => '',
//            'icon' => 'fa fa-stethoscope',
//            'group_id' => 1,
//            'week' => true,
//            'start' => null,
//            'end' => null
//        ],
//        17 => [
//            'date' => 32,
//            'title' => 'Consultation 8ème mois',
//            'desc' => '',
//            'icon' => 'fa fa-h-square',
//            'group_id' => 4,
//            'week' => true,
//            'start' => null,
//            'end' => null
//        ],
//        18 => [
//            'date' => 32,
//            'title' => 'Début éventuel de congés pathologique',
//            'desc' => '',
//            'icon' => 'fa fa-calendar',
//            'group_id' => 3,
//            'week' => true,
//            'start' => null,
//            'end' => null
//        ],
//        19 => [
//            'date' => 33,
//            'title' => 'Consultation anesthésiste (dans la maternité choisie)',
//            'desc' => '',
//            'icon' => 'fa fa-h-square',
//            'group_id' => 4,
//            'week' => true,
//            'start' => null,
//            'end' => null
//        ],
//        20 => [
//            'date' => 33,
//            'title' => 'Début de congés maternité officiel',
//            'desc' => '',
//            'icon' => 'fa fa-calendar',
//            'group_id' => 3,
//            'week' => true,
//            'start' => null,
//            'end' => null
//        ],
//        21 => [
//            'date' => 33,
//            'title' => 'Réalisation de prélèvement vaginal',
//            'desc' => '',
//            'icon' => 'fa fa-user-md',
//            'group_id' => 2,
//            'week' => true,
//            'start' => null,
//            'end' => null
//        ],
//        22 => [
//            'date' => 36,
//            'title' => 'Consultation 9ème mois',
//            'desc' => '',
//            'icon' => 'fa fa-h-square',
//            'group_id' => 4,
//            'week' => true,
//            'start' => null,
//            'end' => null
//        ],
//        23 => [
//            'date' => 39,
//            'title' => 'Date présumée de l\'accouchement',
//            'desc' => '',
//            'icon' => 'fa fa-gift',
//            'group_id' => 5,
//            'week' => true,
//            'start' => null,
//            'end' => null
//        ],
//    ];
//    collect($groups)->each(function($group) {
//         $group['id'] = $group['id'] + 1;
//         \App\EventGroup::create($group);
//     });
//    collect($events)->each(function($event) {
//        $event['group_id'] = $event['group_id'] + 1;
//        $event['description'] = $event['desc'];
//        unset($event['desc']);
//        unset($event['start']);
//        unset($event['end']);
//        \App\Event::create($event);
//    });
//
//})->name('test'); //->middleware('verified');

//Route::get('migrate', function () {
//    Artisan::call('migrate');
//});

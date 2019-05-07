<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;

class CalendarController extends Controller
{
    // 1 jour = 86400 secondes
    private $groups 	= [
        ['id' 		=> 0,
            'content'	=> 'conception',
            'title'		=> 'Conception'],

        ['id' 		=> 1,
            'content'	=> 'consultation',
            'title'		=> 'Consultation'],

        ['id' 		=> 2,
            'content'	=> 'medical',
            'title'		=> 'Médical'],

        ['id' 		=> 3,
            'content'	=> 'administratif',
            'title'		=> 'Administratif'],

        ['id' 		=> 4,
            'content'	=> 'maternite',
            'title'		=> 'Maternité'],

        ['id'       => 5,
            'content'   => 'naissance',
            'title'		=> 'Naissance']
    ];

    private $events = [
        0 => [
            'date'  => 0,
            'title' => 'Conception',
            'desc'  => '',
            'icon'  => 'fa fa-venus-mars',
            'group' => 0, //'conception',
            'week'	=> false,
            'start'	=> null,
            'end'	=> null
        ],
        1 => [
            'date'  => 6,
            'title' => 'Consultation précoce du début de grossesse',
            'desc'  => '',
            'icon'  => 'fa fa-stethoscope',
            'group' => 1, //'consultation',
            'week'	=> true,
            'start'	=> null,
            'end'	=> null
        ],
        2 => [
            'date'  => 10,
            'title' => '1ère échographie',
            'desc'  => 'Datation de la grossesse',
            'icon'  => 'fa fa-user-md',
            'group' => 2, //'medical',
            'week'	=> true,
            'start'	=> null,
            'end'	=> null
        ],
        3 => [
            'date'  => 10,
            'title' => 'Éventuel dépistage de la trisomie 21',
            'desc'  => '',
            'icon'  => 'fa fa-user-md',
            'group' => 2, //'medical',
            'week'	=> true,
            'start'	=> null,
            'end'	=> null
        ],
        4 => [
            'date'  => 11,
            'title' => 'Consultation du 3ème mois',
            'desc'  => '',
            'icon'  => 'fa fa-stethoscope',
            'group' => 1, //'consultation',
            'week'	=> true,
            'start'	=> null,
            'end'	=> null
        ],
        5 => [
            'date'  => 11,
            'title' => 'Déclaration de grossesse',
            'desc'  => '',
            'icon'  => 'fa fa-calendar',
            'group' => 3, //'administratif',
            'week'	=> true,
            'start'	=> null,
            'end'	=> null
        ],
        6 => [
            'date'  => 14,
            'title' => 'Éventuel dépistage (tardif) de la trisomie 21',
            'desc'  => '',
            'icon'  => 'fa fa-user-md',
            'group' => 2, //'medical',
            'week'	=> true,
            'start'	=> null,
            'end'	=> null
        ],
        7 => [
            'date'  => 15,
            'title' => 'Entretien pré-natal avec la sage femme pour la préparation à la naissance',
            'desc'  => '',
            'icon'  => 'fa fa-stethoscope',
            'group' => 1, //'consultation',
            'week'	=> true,
            'start'	=> null,
            'end'	=> null
        ],
        8 => [
            'date'  => 16,
            'title' => 'Reconnaissance anticipée du père',
            'desc'  => '',
            'icon'  => 'fa fa-calendar',
            'group' => 3, //'administratif',
            'week'	=> true,
            'start'	=> null,
            'end'	=> null
        ],
        9 => [
            'date'  => 16,
            'title' => 'Consultation du 4ème mois',
            'desc'  => '',
            'icon'  => 'fa fa-stethoscope',
            'group' => 1, //'consultation',
            'week'	=> true,
            'start'	=> null,
            'end'	=> null
        ],
        10 => [
            'date'  => 18,
            'title' => 'Début de prise en charge 100% médical',
            'desc'  => '',
            'icon'  => 'fa fa-calendar',
            'group' => 3, //'administratif',
            'week'	=> true,
            'start'	=> null,
            'end'	=> null
        ],
        11 => [
            'date'  => 20,
            'title' => 'Consultation 5ème mois',
            'desc'  => '',
            'icon'  => 'fa fa-stethoscope',
            'group' => 1, //'consultation',
            'week'	=> true,
            'start'	=> null,
            'end'	=> null
        ],
        12 => [
            'date'  => 20,
            'title' => '2ème échographie, échographie morphologique',
            'desc'  => '',
            'icon'  => 'fa fa-user-md',
            'group' => 2, //'medical',
            'week'	=> true,
            'start'	=> null,
            'end'	=> null
        ],
        13 => [
            'date'  => 23,
            'title' => 'Biologie du 6ème mois',
            'desc'  => '',
            'icon'  => 'fa fa-user-md',
            'group' => 2, //'medical',
            'week'	=> true,
            'start'	=> null,
            'end'	=> null
        ],
        14 => [
            'date'  => 24,
            'title' => 'Consultation 6ème mois',
            'desc'  => '',
            'icon'  => 'fa fa-stethoscope',
            'group' => 1, //'consultation',
            'week'	=> true,
            'start'	=> null,
            'end'	=> null
        ],
        15 => [
            'date'  => 29,
            'title' => 'Consultation 7ème mois (Maternité)',
            'desc'  => '',
            'icon'  => 'fa fa-h-square',
            'group' => 4, //'hopital',
            'week'	=> true,
            'start'	=> null,
            'end'	=> null
        ],
        16 => [
            'date'  => 30,
            'title' => '3ème échographie',
            'desc'  => '',
            'icon'  => 'fa fa-stethoscope',
            'group' => 1, //'consultation',
            'week'	=> true,
            'start'	=> null,
            'end'	=> null
        ],
        17 => [
            'date'  => 32,
            'title' => 'Consultation 8ème mois',
            'desc'  => '',
            'icon'  => 'fa fa-h-square',
            'group' => 4, //'hopital',
            'week'	=> true,
            'start'	=> null,
            'end'	=> null
        ],
        18 => [
            'date'  => 32,
            'title' => 'Début éventuel de congés pathologique',
            'desc'  => '',
            'icon'  => 'fa fa-calendar',
            'group' => 3, //'administratif',
            'week'	=> true,
            'start'	=> null,
            'end'	=> null
        ],
        19 => [
            'date'  => 33,
            'title' => 'Consultation anesthésiste (dans la maternité choisie)',
            'desc'  => '',
            'icon'  => 'fa fa-h-square',
            'group' => 4, //'hopital',
            'week'	=> true,
            'start'	=> null,
            'end'	=> null
        ],
        20 => [
            'date'  => 33,
            'title' => 'Début de congés maternité officiel',
            'desc'  => '',
            'icon'  => 'fa fa-calendar',
            'group' => 3, //'administratif',
            'week'	=> true,
            'start'	=> null,
            'end'	=> null
        ],
        21 => [
            'date'  => 33,
            'title' => 'Réalisation de prélèvement vaginal',
            'desc'  => '',
            'icon'  => 'fa fa-user-md',
            'group' => 2, //'medical',
            'week'	=> true,
            'start'	=> null,
            'end'	=> null
        ],
        22 => [
            'date'  => 36,
            'title' => 'Consultation 9ème mois',
            'desc'  => '',
            'icon'  => 'fa fa-h-square',
            'group' => 4, //'hopital',
            'week'	=> true,
            'start'	=> null,
            'end'	=> null
        ],
        23 => [
            'date'  => 39,
            'title' => 'Date présumée de l\'accouchement',
            'desc'  => '',
            'icon'  => 'fa fa-gift',
            'group' => 5, //'naissance',
            'week'	=> true,
            'start'	=> null,
            'end'	=> null
        ],
    ];


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return View::make('calendar.index', [
            'events'      => null,
            'json_events' => null,
            'json_groups' => null,
            'start_limit' => null,
            'end_limit'   => null
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    /*public function store()
    {
        $date = '';
        if(Input::get('date1')){
            $date = strtotime(Input::get('date1'));
        }elseif(Input::get('date2')){
            $date = strtotime(Input::get('date2')) + (15 * 86400);
        }

        foreach ($this->events as $key => $event) {
            $this->events[$key]['date'] += $date;
            $this->events[$key]['date'] = date('d-m-Y', $this->events[$key]['date']);
        }

        return View::make('calendar.index',[
            'events' => $this->events
            ]);

    }*/


    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function store()
    {
        $jourj = '';
        $date = '';
        $d = '';

        setlocale (LC_TIME, 'fr_FR.utf8','fra');
        // Carbon::setLocale('fra');

        if(Input::get('date1')){
            $date = Carbon::createFromTimestamp(strtotime(Input::get('date1')))->addDays(14);
        }elseif(Input::get('date2')){
            $date = Carbon::createFromTimestamp(strtotime(Input::get('date2')));
        }

        foreach ($this->events as $key => $event) {
            $d = clone($date);

            if($event['week']){
                $this->events[$key]['start'] = $d->addWeeks($this->events[$key]['date'])->format('Y-m-d');
                $this->events[$key]['end'] 	 = $d->addWeeks(1)->format('Y-m-d');
            } else {
                $this->events[$key]['start'] = $d->addWeeks($this->events[$key]['date'])->format('Y-m-d');
            }
        }

        $jourj       = Carbon::createFromFormat('Y-m-d', $this->events[23]['end'])->diffInDays(Carbon::now());
        $start_limit = Carbon::createFromFormat('Y-m-d', $this->events[0]['start'])->subMonth()->format('Y-m-d');
        $end_limit   = Carbon::createFromFormat('Y-m-d', $this->events[23]['end'])->addMonth()->format('Y-m-d');


        return View::make('calendar.index',[
            'events'      => $this->events,
            'jourj'       => $jourj,
            'start_limit' => json_encode($start_limit),
            'end_limit'   => json_encode($end_limit),
            'json_events' => json_encode($this->events),
            'json_groups' => json_encode($this->groups)
        ]);

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}

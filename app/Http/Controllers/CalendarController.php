<?php

namespace App\Http\Controllers;

use App\Helpers\Alert;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class CalendarController extends Controller
{
    // 1 jour = 86400 secondes
    private $groups = [
        0 => [
            'id' => 0,
            'class' => 'conception',
            'content' => 'Conception'
        ],
        1 => [
            'id' => 1,
            'class' => 'consultation',
            'content' => 'Consultation'
        ],
        2 => [
            'id' => 2,
            'class' => 'medical',
            'content' => 'Médical'
        ],
        3 => [
            'id' => 3,
            'class' => 'administratif',
            'content' => 'Administratif'
        ],
        4 => [
            'id' => 4,
            'class' => 'maternite',
            'content' => 'Maternité'
        ],
        5 => [
            'id' => 5,
            'class' => 'naissance',
            'content' => 'Naissance'
        ]
    ];

    private $events = [
        0 => [
            'date' => 0,
            'title' => 'Conception',
            'desc' => '',
            'icon' => 'fa fa-venus-mars',
            'group' => 0, //'conception',
            'week' => false,
            'start' => null,
            'end' => null
        ],
        1 => [
            'date' => 6,
            'title' => 'Consultation précoce du début de grossesse',
            'desc' => '',
            'icon' => 'fa fa-stethoscope',
            'group' => 1, //'consultation',
            'week' => true,
            'start' => null,
            'end' => null
        ],
        2 => [
            'date' => 10,
            'title' => '1ère échographie',
            'desc' => 'Datation de la grossesse',
            'icon' => 'fa fa-user-md',
            'group' => 2, //'medical',
            'week' => true,
            'start' => null,
            'end' => null
        ],
        3 => [
            'date' => 10,
            'title' => 'Éventuel dépistage de la trisomie 21',
            'desc' => '',
            'icon' => 'fa fa-user-md',
            'group' => 2, //'medical',
            'week' => true,
            'start' => null,
            'end' => null
        ],
        4 => [
            'date' => 11,
            'title' => 'Consultation du 3ème mois',
            'desc' => '',
            'icon' => 'fa fa-stethoscope',
            'group' => 1, //'consultation',
            'week' => true,
            'start' => null,
            'end' => null
        ],
        5 => [
            'date' => 11,
            'title' => 'Déclaration de grossesse',
            'desc' => '',
            'icon' => 'fa fa-calendar',
            'group' => 3, //'administratif',
            'week' => true,
            'start' => null,
            'end' => null
        ],
        6 => [
            'date' => 14,
            'title' => 'Éventuel dépistage (tardif) de la trisomie 21',
            'desc' => '',
            'icon' => 'fa fa-user-md',
            'group' => 2, //'medical',
            'week' => true,
            'start' => null,
            'end' => null
        ],
        7 => [
            'date' => 15,
            'title' => 'Entretien pré-natal avec la sage femme pour la préparation à la naissance',
            'desc' => '',
            'icon' => 'fa fa-stethoscope',
            'group' => 1, //'consultation',
            'week' => true,
            'start' => null,
            'end' => null
        ],
        8 => [
            'date' => 16,
            'title' => 'Reconnaissance anticipée du père',
            'desc' => '',
            'icon' => 'fa fa-calendar',
            'group' => 3, //'administratif',
            'week' => true,
            'start' => null,
            'end' => null
        ],
        9 => [
            'date' => 16,
            'title' => 'Consultation du 4ème mois',
            'desc' => '',
            'icon' => 'fa fa-stethoscope',
            'group' => 1, //'consultation',
            'week' => true,
            'start' => null,
            'end' => null
        ],
        10 => [
            'date' => 18,
            'title' => 'Début de prise en charge 100% médical',
            'desc' => '',
            'icon' => 'fa fa-calendar',
            'group' => 3, //'administratif',
            'week' => true,
            'start' => null,
            'end' => null
        ],
        11 => [
            'date' => 20,
            'title' => 'Consultation 5ème mois',
            'desc' => '',
            'icon' => 'fa fa-stethoscope',
            'group' => 1, //'consultation',
            'week' => true,
            'start' => null,
            'end' => null
        ],
        12 => [
            'date' => 20,
            'title' => '2ème échographie, échographie morphologique',
            'desc' => '',
            'icon' => 'fa fa-user-md',
            'group' => 2, //'medical',
            'week' => true,
            'start' => null,
            'end' => null
        ],
        13 => [
            'date' => 23,
            'title' => 'Biologie du 6ème mois',
            'desc' => '',
            'icon' => 'fa fa-user-md',
            'group' => 2, //'medical',
            'week' => true,
            'start' => null,
            'end' => null
        ],
        14 => [
            'date' => 24,
            'title' => 'Consultation 6ème mois',
            'desc' => '',
            'icon' => 'fa fa-stethoscope',
            'group' => 1, //'consultation',
            'week' => true,
            'start' => null,
            'end' => null
        ],
        15 => [
            'date' => 29,
            'title' => 'Consultation 7ème mois (Maternité)',
            'desc' => '',
            'icon' => 'fa fa-h-square',
            'group' => 4, //'hopital',
            'week' => true,
            'start' => null,
            'end' => null
        ],
        16 => [
            'date' => 30,
            'title' => '3ème échographie',
            'desc' => '',
            'icon' => 'fa fa-stethoscope',
            'group' => 1, //'consultation',
            'week' => true,
            'start' => null,
            'end' => null
        ],
        17 => [
            'date' => 32,
            'title' => 'Consultation 8ème mois',
            'desc' => '',
            'icon' => 'fa fa-h-square',
            'group' => 4, //'hopital',
            'week' => true,
            'start' => null,
            'end' => null
        ],
        18 => [
            'date' => 32,
            'title' => 'Début éventuel de congés pathologique',
            'desc' => '',
            'icon' => 'fa fa-calendar',
            'group' => 3, //'administratif',
            'week' => true,
            'start' => null,
            'end' => null
        ],
        19 => [
            'date' => 33,
            'title' => 'Consultation anesthésiste (dans la maternité choisie)',
            'desc' => '',
            'icon' => 'fa fa-h-square',
            'group' => 4, //'hopital',
            'week' => true,
            'start' => null,
            'end' => null
        ],
        20 => [
            'date' => 33,
            'title' => 'Début de congés maternité officiel',
            'desc' => '',
            'icon' => 'fa fa-calendar',
            'group' => 3, //'administratif',
            'week' => true,
            'start' => null,
            'end' => null
        ],
        21 => [
            'date' => 33,
            'title' => 'Réalisation de prélèvement vaginal',
            'desc' => '',
            'icon' => 'fa fa-user-md',
            'group' => 2, //'medical',
            'week' => true,
            'start' => null,
            'end' => null
        ],
        22 => [
            'date' => 36,
            'title' => 'Consultation 9ème mois',
            'desc' => '',
            'icon' => 'fa fa-h-square',
            'group' => 4, //'hopital',
            'week' => true,
            'start' => null,
            'end' => null
        ],
        23 => [
            'date' => 39,
            'title' => 'Date présumée de l\'accouchement',
            'desc' => '',
            'icon' => 'fa fa-gift',
            'group' => 5, //'naissance',
            'week' => true,
            'start' => null,
            'end' => null
        ],
    ];


    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        return view()->make('calendar.index', [
            'events' => '',
            'json_events' => '',
            'json_groups' => '',
            'start_limit' => '',
            'end_limit' => ''
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        //
    }

  /**
     * Store a newly created resource in storage.
     *
     * @return RedirectResponse | View
     */
    public function store()
    {
        $date = null;

        setlocale(LC_TIME, 'fr_FR', 'fra');

        if (request('date1')) {
            $date = Carbon::createFromFormat('d/m/Y h:i:s', request('date1') . ' 12:00:00', config('app.timezone'))->addDays(14);
        } elseif (request('date2')) {
            $date = Carbon::createFromFormat('d/m/Y h:i:s', request('date2') . ' 12:00:00', config('app.timezone'));
        }

        if ($date === null ) {
           Alert::add('alert-danger', 'Vous devez indiquer une date.');
           return redirect()->back();
        }

        $endDate = null;

        foreach ($this->events as $key => $event) {
            $d = clone($date);

            $event['id'] = $key;
            $event['start'] = $d->addWeeks($event['date'])->format('Y-m-d');
            $event['startDateString'] = utf8_encode(strftime('%d %B %Y', $d->timestamp));
            $endDate= $d;
            if ($event['week']) {
                $event['end'] = $d->addWeeks(1)->format('Y-m-d');
                $event['endDateString'] = utf8_encode(strftime('%d %B %Y', $d->timestamp));
                $endDate= $d;
            }
            $event['periodString'] = ($event['week']) ?
                ('Du '.$event['startDateString'].' au '.$event['endDateString']) : 
                ('Le ' . $event['startDateString']);
            unset($event['startDateString'], $event['endDateString']);
            $event['content'] = nl2br(view()->make('calendar.item', compact('event'))->render());
            $event['className'] = 'vis-item-' . mb_strtolower($this->groups[$event['group']]['class']);
            $event['type'] = 'box';

            $this->events[$key] = ($event);
        }

        foreach ($this->groups as $key => $group) {
            $this->groups[$key]['value'] = $group['id'];
            $this->groups[$key]['className'] = 'group-' . $group['class'];
        }

        $jourj = $endDate->diffInDays(Carbon::now());
        $start_limit = $date->subWeeks(2)->format('Y-m-d');
        $end_limit = $endDate->addWeeks(2)->format('Y-m-d');

        return view()->make('calendar.index', [
            'jourj' => $jourj,
            'start_limit' => $start_limit,
            'end_limit' => $end_limit,
            'json_events' => $this->events,
            'json_groups' => $this->groups
        ]);

    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function show($id)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function edit($id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     * @return void
     */
    public function update($id)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return void
     */
    public function destroy($id)
    {
        //
    }
}

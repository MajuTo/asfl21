<?php

namespace App\Http\Controllers;

use App\EventGroup;
use App\Helpers\Alert;
use Carbon\Carbon;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class CalendarController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return View
     * @throws BindingResolutionException
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
     * @throws BindingResolutionException
     */
    public function store()
    {
        $date = null;
        $groups = EventGroup::with('events')->get();

        setlocale(LC_TIME, 'fr_FR', 'fra');

        if ( empty(request('date1')) && empty(request('date2')) ) {
            Alert::add('alert-danger', 'Vous devez indiquer une date.');
            return redirect()->back();
        }

        if (request('date1')) {
            $date = Carbon::createFromFormat('d/m/Y h:i:s', request('date1') . ' 12:00:00', config('app.timezone'))->addDays(14);
        } elseif (request('date2')) {
            $date = Carbon::createFromFormat('d/m/Y h:i:s', request('date2') . ' 12:00:00', config('app.timezone'));
        }

        $endDate = null;

        $events = [];

        foreach ($groups as $group) {
            foreach ($group->events as $key => $event) {
                $d = clone($date);
                $event->start = $d->addWeeks($event->date)->format('Y-m-d');
                $event->startDateString = utf8_encode(strftime('%d %B %Y', $d->timestamp));
                $endDate= $d;
                if ($event->week) {
                    $event->end = $d->addWeeks(1)->format('Y-m-d');
                    $event->endDateString = utf8_encode(strftime('%d %B %Y', $d->timestamp));
                    $endDate= $d;
                }
                $event->periodString = ($event->week) ?
                    ('Du '.$event->startDateString.' au '.$event->endDateString) :
                    ('Le ' . $event->startDateString);
                unset($event->startDateString, $event->endDateString);
                $event->content = nl2br(view()->make('calendar.item', compact('event'))->render());
                $event->className = 'vis-item-' . $group->class;
                $event->type = 'box';
                $event->group = $event->group_id;
                $events[] = $event;
            }
            $group->className = 'group-' . $group->class;
            unset($group->events);
        }

        $jourj = $endDate->diffInDays(Carbon::now());
        $start_limit = $date->subWeeks(2)->format('Y-m-d');
        $end_limit = $endDate->addWeeks(2)->format('Y-m-d');

        return view()->make('calendar.index', [
            'jourj' => $jourj,
            'start_limit' => $start_limit,
            'end_limit' => $end_limit,
            'json_events' => $events,
            'json_groups' => $groups
        ]);

    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return void
     */
    public function show(int $id)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return void
     */
    public function edit(int $id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     *
     * @return void
     */
    public function update(int $id)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return void
     */
    public function destroy(int $id)
    {
        //
    }
}

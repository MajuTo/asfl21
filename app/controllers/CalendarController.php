<?php

class CalendarController extends \BaseController {

	// 1 jour = 86400 secondes

	private $events = [
		0 => [
			'date' => 172800,
			'title' => '1er event',
			'desc' => 'Description du premier event',
			'icon' => 'fa fa-home',
			'class' => 'medical'
		],
		1 => [
			'date' => 691200,
			'title' => '2eme event',
			'desc' => 'Description du deuxieme event',
			'icon' => 'fa fa-camera',
			'class' => 'administratif'
		],
		2 => [
			'date' => 1036800,
			'title' => '3eme event',
			'desc' => 'Description du troisieme event',
			'icon' => 'fa fa-calendar',
			'class' => 'medical'
		]
	];


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('calendar.index');
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
	public function store()
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

		return View::make('calendar.test',[
			'events' => $this->events
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

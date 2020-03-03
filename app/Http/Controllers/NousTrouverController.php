<?php

namespace App\Http\Controllers;

use App\Activity;
use App\User;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;

class NousTrouverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $sagesfemmes = User::with('addresses')->where('active', 1)->where('group_id', '!=', 3)->orderBy('name')->get();
        $activities  = Activity::orderBy('activityName')->get();

        return view()->make('noustrouver.noustrouver',[
            'sagesfemmes' => $sagesfemmes,
            'activities'  => $activities,
        ]);
    }

    /* Get User by Activity */
    public function getSfByActivity(){
        if ($selectedActivities = request('selectedActivities')) {
//            Commenté le 02 Mars 2019 au profit de la requete plus bas
//            $userByActivities = User::with('activities')
//                ->where('active', 1)
//                ->whereHas('activities', function($query) use($selectedActivities) {
//                    $query->count('id')->whereIn('id', $selectedActivities);
////                    $query->selectRaw('count(distinct id)')->whereIn('id', $selectedActivities);
//                }, '=', count($selectedActivities))
//                ->where('active', 1)
//                ->where('group_id', '!=', 3)
//                ->orderBy('name')
//                ->get();

//            Test de requete de remplacement du 02 Mars 2019
            $userByActivities = User::where('active', 1)
                ->whereHas('activities', function (Builder $query) use ($selectedActivities) {
                    $query->select(['activity_user.user_id'])
                        ->whereIn('activities.id', $selectedActivities)
                        ->groupBy('activity_user.user_id')
                        ->havingRaw('count(distinct activities.id) = ' . count($selectedActivities));
                })
                ->where('group_id', '!=', 3)
                ->orderBy('name')
                ->get(['id', 'name', 'firstname']);
        } else {
            // $userByActivities = DB::table('users')->orderBy('name')->get();
            $userByActivities = User::where('active', 1)->where('group_id', '!=', 3)->orderBy('name')->get(['id', 'name', 'firstname']);
        }

        return view()->make('noustrouver.listesf', [
            'sagesfemmes' => $userByActivities,
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
     * @return void
     */
    public function store()
    {
        //
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

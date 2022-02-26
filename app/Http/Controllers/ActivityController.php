<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Helpers\Alert;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        if($this->isAdminRequest()){
            $activities = Activity::orderBy('activityName')->paginate(10);
            return view('admin.activity.index',[
                'activities' => $activities
            ]);
        } else {
            $activities = Activity::all();
            return view('activity.index',[
                'activities' => $activities
            ]);
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        $activity = new Activity();

        return view('admin.activity.create', [
            'activity'   => $activity
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return RedirectResponse
     */
    public function store(): RedirectResponse
    {
        $rules = array(
            'activityName'      => 'required|unique:activities',
            'activityDesc' => 'required'
        );

        $validation = Validator::make(request()->all(), $rules);

        if ($validation->fails()) {
            Alert::add("alert-danger", "L'activité n'a pas pu être créée");
            return redirect()->back()->withErrors($validation)->withInput();
        }

        $activity = new Activity(request()->all());

        //Sauvegarde
        $activity->save();

        Alert::add("alert-success", "L'activité a bien été créée");

        return redirect()->route('admin.activity.index');
    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function show(int $id)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return Factory|View
     */
    public function edit(int $id)
    {
        $activity = Activity::find($id);

        return view('admin.activity.edit', [
            'activity'   => $activity
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(int $id): RedirectResponse
    {
        $activity = Activity::find($id);

        $rules = array(
            'activityName'      => 'required|unique:activities,activityName,'.$id,
            'activityDesc' => 'required'
        );

        $validation = Validator::make(request()->all(), $rules);

        if ($validation->fails()) {
            Alert::add("alert-danger", "L'activité n'a pas pu être modifiée");
            return redirect()->back()->withErrors($validation)->withInput();
        }

        $activity->update(request()->all());

        Alert::add("alert-success", "L'activité a bien été modifiée");

        return redirect()->route('admin.activity.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        Activity::destroy($id);
        Alert::add("alert-success", "L'activité a bien été supprimée");

        return redirect()->route('admin.activity.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Helpers\Alert;
use App\Link;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        if($this->isAdminRequest()){
            return view('admin.link.index', [
                'links' => Link::orderBy('linkName')->paginate(10)
            ]);
        }else{
            return view('link.index', [
                'links' => Link::all()
            ]);
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('admin.link.create', [
            'link'   => new Link()
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return RedirectResponse
     */
    public function store()
    {
        $rules = array(
            'linkName'  => 'required',
            'link' 		=> 'required|unique:links'
        );

        $validation = validator()->make(request()->all(), $rules);

        if ($validation->fails()) {
            Alert::add("alert-danger", "Le lien n'a pas pu être créé");
            return back()->withErrors($validation)->withInput();
        }

        $link = new Link(request()->all());

        //Sauvegarde
        $link->save();

        Alert::add("alert-success", "Le lien a bien été créé");

        return redirect()->route('admin.link.index');
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
     * @return View
     */
    public function edit($id)
    {
        return view('admin.link.edit',[
            'link' => Link::find($id)
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update($id)
    {
        $rules = array(
            'linkName'  => 'required',
            'link' 		=> 'required|unique:links,link,'.$id
        );

        $validation = validator()->make(request()->all(), $rules);

        if ($validation->fails()) {
            Alert::add("alert-danger", "Le lien n'a pas pu être modifié");
            return back()->withErrors($validation)->withInput();
        }

        $link = Link::find($id);

        //Sauvegarde
        $link->update(request()->all());

        Alert::add("alert-success", "Le lien a bien été modifié");

        return redirect()->route('admin.link.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        Link::destroy($id);
        Alert::add("alert-success", "Le lien a bien été supprimé");

        return redirect()->route('admin.link.index');
    }
}

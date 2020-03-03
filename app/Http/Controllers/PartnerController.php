<?php

namespace App\Http\Controllers;

use App\Helpers\Alert;
use App\Partner;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\File;

class PartnerController extends Controller
{
    private $logo_path = "assets/img/partners/";

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        if($this->isAdminRequest()){
            $partners = Partner::orderBy('partnerName')->paginate(10);
            return view()->make('admin.partner.index', [
                'partners' => $partners
            ]);
        }else{
            $partners = Partner::all();
            return view('partner.index', [
                'partners' => $partners
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
        return view()->make('admin.partner.create', [
            'partner'   => new Partner()
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
            'partnerName'  => 'required|unique:partners',
            'logo_file' => 'image'
        );

        $validation = validator()->make(request()->all(), $rules);

        if ($validation->fails()) {
            Alert::add("alert-danger", "Le partenaire n'a pas pu être créé");
            return redirect()->back()->withErrors($validation)->withInput();
        }

        $partner = new Partner(request()->all());

        $file = request()->file('logo_file');

        if ($file && $file->isValid()){
            $ext = $file->getClientOriginalExtension();
            $filename = str_replace(' ', '',$partner->partnerName . '.' . $ext);
            $file->move($this->logo_path, $filename);
            $partner->logo = $this->logo_path . $filename;
        }

        //Sauvegarde
        $partner->save();

        Alert::add("alert-success", "Le partenaire a bien été créé");
        return redirect()->route('admin.partner.index');
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
        return view()->make('admin.partner.edit',[
            'partner' => Partner::find($id)
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
            'partnerName'  => 'required|unique:partners,partnerName,'.$id,
            'logo_file' => 'image'
        );

        $validation = validator()->make(request()->all(), $rules);

        if ($validation->fails()) {
            Alert::add("alert-danger", "Le partenaire n'a pas pu être modifié");
            return redirect()->back()->withErrors($validation)->withInput();
        }

        $partner = Partner::find($id);

        if(request()->get('delete_logo')){
            File::delete($partner->logo);
            $partner->logo = '';
        }

        $file = request()->file('logo_file');
        if ($file && $file->isValid()){
            if($partner->logo){
                File::delete($partner->logo);
            }
            $ext = $file->getClientOriginalExtension();
            $filename = str_replace(' ', '',$partner->partnerName . '.' . $ext);
            $file->move($this->logo_path, $filename);
            $partner->logo = $this->logo_path . $filename;
        }

        //Sauvegarde
        $partner->update(request()->all());

        Alert::add("alert-success", "Le partenaire a bien été modifié");
        return redirect()->route('admin.partner.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $partner = Partner::find($id);
        if($partner->logo){
            File::delete($partner->logo);
        }
        Partner::destroy($id);
        Alert::add("alert-success", "Le partenaire a bien été supprimé");
        return redirect()->route('admin.partner.index');
    }

}

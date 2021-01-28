<?php

namespace App\Http\Controllers;

use App\Address;
use App\Helpers\Alert;
use App\User;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     * @throws BindingResolutionException
     */
    public function index()
    {
        $addresses = Address::where('user_id', '=', auth()->id())->get();
        return view()->make('address.index', [
            'addresses' => $addresses
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return View
     * @throws BindingResolutionException
     */
    public function create()
    {
        $address = new Address();
        $view = $this->isAdminRequest() ? 'admin.address.create' : 'address.create';

        return view()->make($view, [
            'address'   => $address
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
            'name' 		=> 'required',
            'address' 	=> 'required',
            'zipCode' 	=> 'required',
            'city' 		=> 'required'
        );

        $validation = Validator::make(request()->all(), $rules);

        if ($validation->fails()) {
            Alert::add("alert-danger", "L'adresse n'a pas pu être créée");
            return back()->withErrors($validation)->withInput();
        }

        $address = new Address(request()->all());
        $address->user_id = $this->isAdminRequest() ? session()->get('user_id') : auth()->id();
        $address->country = 'FRANCE';
        $address->save();

        Alert::add("alert-success", "L'adresse a bien été créée");

        if($this->isAdminRequest()){
            return redirect()->route('admin.user.edit', $address->user_id);
        } else {
            return redirect()->route('user.edit', auth()->id());
        }
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
     * @param  int  $id
     *
     * @return View
     * @throws BindingResolutionException
     */
    public function edit(int $id)
    {
        $address = Address::find($id);
        $user = User::find($address->user_id);
        $admin = false;
        $view = 'address.edit';
        if($this->isAdminRequest()) {
            $admin = true;
            $view = 'admin.' . $view;
        }
        return view()->make($view, [
            'address' => $address,
            'user' => $user,
            'admin' => $admin
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return RedirectResponse
     */
    public function update(int $id)
    {
        $rules = array(
            'name' 		=> 'required',
            'address' 	=> 'required',
            'zipCode' 	=> 'required',
            'city' 		=> 'required'
        );

        $validation = Validator::make(request()->all(), $rules);

        if ($validation->fails()) {
            Alert::add("alert-danger", "L'adresse n'a pas pu être créée");
            return back()->withErrors($validation)->withInput();
        }
        $address = Address::find($id);
        $user_id = $address->user_id;
        $address->hidePhone = 0;
        $address->hideFax = 0;
        $address->update(request()->all());

        $address->user_id = $this->isAdminRequest() ? $user_id : auth()->id();

        $address->save();

        Alert::add("alert-success", "L'adresse a bien été enregistrée");

        if($this->isAdminRequest()){
            return redirect()->route('admin.user.edit', $address->user_id);
        } else {
            return redirect()->route('user.edit', auth()->user()->id);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return RedirectResponse
     */
    public function destroy(int$id)
    {
        $user_id = User::find( Address::find($id)->user_id )->id;
        Address::destroy($id);
        Alert::add("alert-success", "L'adresse a bien été supprimée");
        if($this->isAdminRequest()){
            return redirect()->route('admin.user.edit', $user_id);
        } else {
            return redirect()->route('user.edit', auth()->user()->id);
        }
    }

}

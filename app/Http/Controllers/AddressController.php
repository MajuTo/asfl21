<?php

namespace App\Http\Controllers;

use App\Address;
use App\Helpers\Alert;
use App\User;
use Geocoder\Laravel\Facades\Geocoder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
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
     */
    public function create()
    {
        $address = new Address();
        if($this->isAdminRequest()){
            $view = 'admin.address.create';
        } else {
            $view = 'address.create';
        }
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
        if($this->isAdminRequest()){
            $address->user_id = session()->get('user_id');
        } else {
            $address->user_id = auth()->id();
        }

        $address->country = 'FRANCE';

        // $location = $this->geocode($address);
        // if ($location != null) {
        // 	$address->lat = $location['lat'];
        // 	$address->lng = $location['lng'];
        // } else {
        // 	Alert::add('alert-warning', "Cette adresse n'existe pas dans Google Maps.");
        // }

        $address = $this->geocode($address);

        //Sauvegarde
        $address->save();

        Alert::add("alert-success", "L'adresse a bien été créée");

        if($this->isAdminRequest()){
            return redirect()->route('admin.user.edit', $address->user_id);
        } else {
            return redirect()->route('user.edit', Auth::id());
        }
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
     * @param  int  $id
     * @return View
     */
    public function edit($id)
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
     * @return RedirectResponse
     */
    public function update($id)
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

        if($this->isAdminRequest()){
            $address->user_id = $user_id;
        } else {
            $address->user_id = Auth::id();
        }

        $address = $this->geocode($address);
        $address->save();

        // if ($location == null) {
        // 	Alert::add('alert-warning', "Cette adresse n'existe pas dans Google Maps.");
        // 	$address->lat = null;
        // 	$address->lng = null;
        // 	$address->save();
        // } else {
        // 	$address->lat = $location['lat'];
        // 	$address->lng = $location['lng'];
        // 	$address->save();
        // }
        // var_dump($address);
        // die();

        Alert::add("alert-success", "L'adresse a bien été enregistrée");

        if($this->isAdminRequest()){
            return redirect()->route('admin.user.index');
        } else {
            return redirect()->route('user.edit', auth()->user()->id);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy($id)
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

    public function geocode($address){
        // a changer en prod... clé de dev.
        // $googleApiKey = 'AIzaSyAqJKkv1M-fhJ97dtL0CUV16QelltipJmE';
        // $parameters   = str_replace(' ', '+', $address->address . ' ' . $address->zipCode . ' ' . $address->city . '+France' . "&key=" . $googleApiKey);
        // $googleMapUrl = "https://maps.googleapis.com/maps/api/geocode/json?address=" . $parameters;

        // var_dump($googleMapUrl);

        // $ch = curl_init($googleMapUrl);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);


        //    try{
        // 	$exec = curl_exec($ch);
        // 	if($exec == false){
        // 		throw new Exception(curl_error($ch), curl_errno($ch));
        // 	}
        //    }catch(Exception $e){
        //    	trigger_error(sprintf(
        //         'Curl failed with error #%d: %s',
        //         $e->getCode(), $e->getMessage()),
        //         E_USER_ERROR);
        //    }

        // var_dump($googleMapUrl);


        //    $geolocation = json_decode(curl_exec($ch), true);
        //    var_dump($ch, $geolocation);

        //    if ($geolocation['status'] == 'OK') {
        //    	$lat = $geolocation['results'][0]['geometry']['location']['lat'];
        // 	$lng = $geolocation['results'][0]['geometry']['location']['lng'];
        //     return ['lat' => $lat, 'lng' => $lng];
        //    }

        try {
            $geocode = Geocoder::geocode($address->address . ', ' . $address->zipCode . ', ' . $address->city . ', ' . $address->country);
            // The GoogleMapsProvider will return a result
            $address->lat = $geocode->getLatitude();
            $address->lng = $geocode->getLongitude();
        } catch (\Exception $e) {
            Alert::add('alert-warning', "Cette adresse n'existe pas dans Google Maps.");
            $address->lat = null;
            $address->lng = null;
        }

        return $address;
    }

}

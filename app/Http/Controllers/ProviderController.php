<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provider;

class ProviderController extends Controller
{
 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $providers = Provider::all();
        return view('providers.list', compact('providers'));
    }

 

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $provider = new Provider();
        $provider->name = $request->name;
        $provider->email = $request->email;
        $provider->nit = $request->nit;
        $provider->address = $request->address;
        $provider->phone = $request->phone;
        $provider->years_experiences = $request->years_experiences;
        $provider->save();

        return ['providers' => $providers];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $provider = Provider::find($id);
        return ['provider' => $provider];
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $provider = Provider::find($id);
        $provider->name = $request->name;
        $provider->email = $request->email;
        $provider->nit = $request->nit;
        $provider->address = $request->address;
        $provider->phone = $request->phone;
        $provider->years_experiences = $request->years_experiences;
        $provider->save();
        $provider = Provider::select('statuses.status','companies.*')->join('statuses','statuses.id','=','companies.status_id')->get();
        return ['providers' => $providers];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $provider = Provider::find($id);
        $provider->status_id = $request->status_id;
        $provider->save();
        $provider = Provider::select('statuses.status','companies.*')->join('statuses','statuses.id','=','companies.status_id')->get();
        return ['providers' => $providers];
    }
}

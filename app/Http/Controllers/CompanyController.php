<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::all();
        return view('companies/.list', compact('companies'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $company = new Company();
        $company->name = $request->name;
        $company->email = $request->email;
        $company->nit = $request->nit;
        $company->address = $request->address;
        $company->phone = $request->phone;
        $company->years_experiences = $request->years_experiences;
        $company->status_id    = 1;
        $company->save();
        $companies = Company::select('statuses.name as status', 'companies.*')->join('statuses', 'statuses.id', '=', 'companies.status_id')->get();
        return ['companies' => $companies];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Company::find($id);
        return ['company' => $company];
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
        $company = Company::find($id);
        $company->name = $request->name;
        $company->email = $request->email;
        $company->nit = $request->nit;
        $company->address = $request->address;
        $company->phone = $request->phone;
        $company->years_experiences = $request->years_experiences;
        $company->save();

        $companies = Company::select('statuses.name as status', 'companies.*')->join('statuses', 'statuses.id', '=', 'companies.status_id')->get();
        return ['companies' => $companies];
    }

    public function updateStatus($id)
    {
        $company = Company::find($id);

        if ($company->status_id == 1)

            $company->status_id = 2;
        else
            $company->status_id = 1;

        $company->save();

        $companies = Company::select('statuses.name as status', 'companies.*')->join('statuses', 'statuses.id', '=', 'companies.status_id')->get();

        return ['companies' => $companies];
    }
}

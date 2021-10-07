<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\{Status,TypeStatus};

class StatusController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statuses = Status::all();
        $type_statuses = TypeStatus::all();
        return view('statuses/list',compact('statuses','type_statuses'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $status = new Status();
        $status->name = $request->name;
        $status->type_status_id = $request->type_status_id;
        $status->save();
        $statuses = Status::select('type_statuses.name as type_status','statuses.*')->join('type_statuses','type_statuses.id','=','statuses.type_status_id')->get();
        return ['statuses' => $statuses];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $status = Status::find($id);
        return ['status' => $status];
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
        $status = Status::find($id);
        $status->name = $request->name;
        $status->type_status_id = $request->type_status_id;
        $status->save();
        $statuses = Status::select('type_statuses.name as type_status','statuses.*')->join('type_statuses','type_statuses.id','=','statuses.type_status_id')->get();
        return ['statuses' => $statuses];
    }

    public function destroy(Request $request, $id)
    {
        // $status = Status::find($id);
        // $status->status_id = $request->status_id;
        // $status->destroy();
        Status::destroy($id);
        $statuses = Status::select('type_statuses.name as type_status','statuses.*')->join('type_statuses','type_statuses.id','=','statuses.type_status_id')->get();
        return ['statuses' => $statuses];
    }
}

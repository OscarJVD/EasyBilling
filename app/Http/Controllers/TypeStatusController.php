<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypeStatus;

class TypeStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $type_statuses = TypeStatus::all();
        return view('type_statuses/.list', compact('type_statuses'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $type_status = new TypeStatus();
        $type_status->name         = $request->name;
        $type_status->save();
        $type_statuses = TypeStatus::select('type_statuses.*')->get();
        return ['type_statuses' => $type_statuses];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $type_status = TypeStatus::find($id);
        return ['type_status' => $type_status];
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
        $type_status = TypeStatus::find($id);
        $type_status->name         = $request->name;
        $type_status->save();

        $type_statuses = TypeStatus::select('type_statuses.*')->get();
        return ['type_statuses' => $type_statuses];
    }

    public function updateStatus($id)
    {
        $type_status = TypeStatus::find($id);

        if ($type_status->status_id == 1)

            $type_status->status_id = 2;
        else
            $type_status->status_id = 1;

        $type_status->save();

        $type_statuses = TypeStatus::select('type_statuses.*')->get();

        return ['type_statuses' => $type_statuses];
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return view('roles.list',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = new Role();
        $role->name = $request->name;
        $role->status_id = 1;
        $role->save();

        $roles = Role::select('statuses.name as status','roles.*')->join('statuses','statuses.id','=','roles.status_id')->get();

        return ['roles' => $roles];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::find($id);
        return ['role' => $role];
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
        $role = Role::find($id);
        $role->name = $request->name;
        $role->save();
        $roles = Role::select('statuses.name as status','roles.*')->join('statuses','statuses.id','=','roles.status_id')->get();
        return ['roles' => $roles];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateStatus($id)
    {
        $role = Role::find($id);

        if ($role->status_id == 1)

            $role->status_id = 2;
        else
            $role->status_id = 1;

        $role->save();

        $roles = Role::select('statuses.name as status', 'roles.*')->join('statuses', 'statuses.id', '=', 'roles.status_id')->get();

        return ['roles' => $roles];
    }
}
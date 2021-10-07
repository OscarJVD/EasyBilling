<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\{Role, Shop};
use App\Mail\EmergencyCallReceived;
use App\Imports\UsersImport;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Exceptions\NoTypeDetectedException;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $roles = Role::all();
        $shops = Shop::all();
        return view('users/.list', compact('users', 'roles', 'shops'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $user = new User();
        // $user->name                  = $request->name;
        // $user->surname               = $request->surname;
        // $user->identification_type   = $request->identification_type;
        // $user->identification_number = $request->identification_number;
        // $user->address = $request->address;
        // $user->phone = $request->phone;
        // $user->date_birth = $request->date_birth;
        // $user->email = $request->email;
        // $password = substr(md5(rand()), 0, 8);
        // $user->password = Hash::make($password); // autogenerada
        // $user->role_id = $request->role_id;
        // $user->shop_id = $request->shop_id;
        // $user->status_id    = 1;
        // $user->token_login = Str::random(12);
        // $user->save();

        // Send confirmation code
        // \Mail::send('auth.verify', $request, function ($message) use ($request) {
        //     $message->to($request['email'], $request['name'])->subject('Por favor confirma tu correo');
        // });

        // Mail::to($request->user())->send(new OrderShipped($order));

        // $receivers = Receiver::pluck('email');


        $users = User::select('statuses.name as status', 'users.*')->join('statuses', 'statuses.id', '=', 'users.status_id')->get();
        return ['users' => $users];
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return ['user' => $user];
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
        $user = User::find($id);
        $user->name                  = $request->name;
        $user->surname               = $request->surname;
        $user->identification_type   = $request->identification_type;
        $user->identification_number = $request->identification_number;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->date_birth = $request->date_birth;
        $user->email = $request->email;
        // $user->status_id = $request->status_id;
        $user->role_id = $request->role_id;
        $user->shop_id = $request->shop_id;
        $user->save();

         $users = User::select('statuses.name as status','shops.name as shop', 'roles.name as role', 'users.*')->join('statuses', 'statuses.id', '=', 'users.status_id')
                                                                                                                   ->leftJoin('roles', 'roles.id', '=', 'users.role_id')
                                                                                                                   ->leftJoin('shops', 'shops.id', '=', 'users.shop_id')->get();
            return ['users' => $users];
        return ['users' => $users];
    }

    public function updateStatus($id)
    {
        $user = User::find($id);

        if ($user->status_id == 1)

            $user->status_id = 2;
        else
            $user->status_id = 1;

        $user->save();

        $users = User::select('statuses.name as status', 'users.*')->join('statuses', 'statuses.id', '=', 'users.status_id')->get();

        return ['users' => $users];
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Models\{Company, Provider, Role, Shop};
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
     
         return Validator::make($data, [
             'name' => ['required', 'string', 'max:255'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        /*
        * Dependiendo del rol si es empresa o proveedor se registra diferente
        * información referente al usuario
        *
        */
        if ($data['role_id'] == 2) {
            // dd($data);
            $company = Company::create([
                'name'              => $data['empresa_name'],
                'address'           => $data['empresa_address'],
                'email'             => $data['empresa_email'],
                'nit'               => $data['empresa_nit'],
                'phone'             => $data['empresa_phone'],
                'years_experiences' => $data['empresa_years'],
                'status_id'         => 1,
            ]);

            return User::create([
                'name'              => $data['name'],
                'role_id'           => $data['role_id'],
                'company_id'        => $company['id'],
                'email'             => $data['email'],
                'password'          => Hash::make($data['password']),
                'status_id'         => 1
            ]);
        } elseif ($data['role_id'] == 3) {

            // dd($data);

            $provider = Provider::create([
                'name'      => $data['provider_name'],
                'address'   => $data['provider_address'],
                'phone'     => $data['provider_phone'],
                'nit'       => $data['provider_nit'],
                'status_id' => 1,
            ]);

            return User::create([
                'name'              => $data['name'],
                'role_id'           => $data['role_id'],
                'provider_id'       => $provider['id'],
                'email'             => $data['email'],
                'password'          => Hash::make($data['password']),
                'status_id'         => 1
            ]);
        } elseif ($data['role_id'] == 1) {

            $users = User::select('statuses.name as status', 'users.*')->join('statuses', 'statuses.id', '=', 'users.status_id')->get();
            return User::create([
                'name'              => $data['name'],
                'surname'              => $data['surname'],
                'identification_type'              => $data['identification_type'],
                'identification_number'              => $data['identification_number'],
                'date_birth'              => $data['date_birth'],
                'address'              => $data['address'],
                'phone'              => $data['phone'],
                'role_id'           => $data['role_id'],
                'email'             => $data['email'],
                'password'          => Hash::make($data['password']),
                'status_id'         => 1,
                'users' => $users
            ]);
        } elseif ($data['role_id'] == 5) {


            $shop = Shop::create([
                'name'      => $data['shop_name'],
                'address'   => $data['shop_address'],
                'email'   => $data['shop_email'],
                'phone'     => $data['shop_phone'],
                'nit'       => $data['shop_nit'],
                'status_id' => 1,
            ]);

            $users = User::select('statuses.name as status', 'users.*')->join('statuses', 'statuses.id', '=', 'users.status_id')->get();

            return User::create([
                'name'              => $data['name'],
                'surname'              => $data['surname'],
                'identification_type'              => $data['identification_type'],
                'identification_number'              => $data['identification_number'],
                'date_birth'              => $data['date_birth'],
                'address'              => $data['address'],
                'phone'              => $data['phone'],
                'shop_id'       => $shop['id'],
                'role_id'           => $data['role_id'],
                'email'             => $data['email'],
                'password'          => Hash::make($data['password']),
                'status_id'         => 1,
                'users' => $users
            ]);
        }
    }

    public function showRegistrationForm() // trae los roles para la vista de registro de usuario
    {
        $roles = Role::all();
        return view('auth.register', compact('roles'));
    }

      public function register(Request $request)
    {
        $this->validator($request->all())->validate();

      

        event(new Registered($user = $this->create($request->all())));

        if ($request->role_id == 1 || $request->role_id == 4 || $request->role_id == 5 ) {
         
            $users = User::select('statuses.name as status','shops.name as shop', 'roles.name as role', 'users.*')->join('statuses', 'statuses.id', '=', 'users.status_id')
            ->leftJoin('roles', 'roles.id', '=', 'users.role_id')
            ->leftJoin('shops', 'shops.id', '=', 'users.shop_id')->get();
            return ['users' => $users];
        }

        $this->guard()->login($user);

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return $request->wantsJson()
                    ? new JsonResponse([], 201)
                    : redirect($this->redirectPath());
    }
}

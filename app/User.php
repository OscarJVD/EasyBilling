<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// use App\Mail\EmergencyCallReceived;
// use App\Mail;

class User extends Authenticatable implements MustVerifyEmail
{
    /**
     * Class constructor.
     */
    // public function __construct()
    // {
    //     \Auth::user()->role->name = \Auth::user()->role->name;
    // }

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'token_login',
        'identification_type',
        'identification_number',
        'address',
        'phone',
        'date_birth',
        'status_id',
        'role_id',
        'company_id',
        'provider_id',
        'shop_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // public function mail($user)
    // {
    //     \Mail::to($user->email)->send(new EmergencyCallReceived($user));
    // }

    public function shop()
    {
        return $this->belongsTo('App\Models\Shop');
    }

    public function provider()
    {
        return $this->belongsTo('App\Models\Provider');
    }

    public function company()
    {
        return $this->belongsTo('App\Models\Company');
    }

    // Relación Muchos(User) -> a Uno(Status)
    public function status()
    {
        return $this->belongsTo('App\Models\Status');
    }

    // Relación Muchos(User) -> a Uno(Role)
    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }

    public function rentals()
    {
        return $this->hasMany('App\Models\Rental');
    }

    public function movies()
    {
        return $this->hasMany('App\Models\Movie');
    }

    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }

    public function export($module)
    {
        if (\Auth::user()->role->name === 'Administrador')
            return 'admin/' . $module . '/export';
    }

    public function import($module)
    {
        if (\Auth::user()->role->name === 'Administrador')
            return 'admin/' . $module . '/import';
    }

    public function urlAll($module)
    {
        if (\Auth::user()->role->name === 'Administrador')
            return 'admin/' . $module;
        if (\Auth::user()->role->name === 'Empleado')
            return 'employee/' . $module;
        if (\Auth::user()->role->name === 'Cliente')
            return 'client/' . $module;
    }

    public function urlCreate($module)
    {
        if (\Auth::user()->role->name === 'Administrador')
            return 'admin/' . $module . '/create';
        if (\Auth::user()->role->name === 'Empleado')
            return 'employee/' . $module . '/create';
        if ($module == 'rental' && \Auth::user()->role->name === 'Cliente')
            return 'client/' . $module . '/create';
    }

    public function urlSearch($module)
    {
        if (\Auth::user()->role->name === 'Administrador')
            return 'admin/' . $module . '/show';
        if (\Auth::user()->role->name === 'Empleado')
            return 'employee/' . $module . '/show';
        if (\Auth::user()->role->name === 'Cliente')
            return 'client/' . $module . '/show';
    }

    public function urlEdit($module, $id)
    {
        if (\Auth::user()->role->name === 'Administrador')
            return 'admin/' . $module . '/' . $id . '/edit';
        if (\Auth::user()->role->name === 'Empleado')
            return 'employee/' . $module . '/' . $id . '/edit';
        if ($module == 'rental' && \Auth::user()->role->name === 'Cliente')
            return 'client/' . $module . '/' . $id . '/edit';
    }

    public function urlUpdate($module, $id)
    {
        if (\Auth::user()->role->name === 'Administrador')
            return 'admin/' . $module . '/update/' . $id;
        if (\Auth::user()->role->name === 'Empleado')
            return 'employee/' . $module . '/update/' . $id;
        if ($module == 'rental' && \Auth::user()->role->name === 'Cliente')
            return 'client/' . $module . '/update/' . $id;
    }

    public function urlUpdateStatus($module, $id)
    {
        if (\Auth::user()->role->name === 'Administrador')
            return 'admin/' . $module . '/updateStatus/' . $id;
        if (\Auth::user()->role->name === 'Empleado')
            return 'employee/' . $module . '/updateStatus/' . $id;
        if ($module == 'rental' && \Auth::user()->role->name === 'Cliente')
            return 'client/' . $module . '/updateStatus/' . $id;
    }

    // public function urlUpdateP($module, $id)
    // {
    //     if (\Auth::user()->role->name === 'Administrador')
    //         return 'admin/' . $module . '/update/' . $id;
    //     if (\Auth::user()->role->name === 'Empleado')
    //         return 'employee/' . $module . '/update/' . $id;
    //     if($module == 'rental' && \Auth::user()->role->name === 'Cliente')
    //         return 'client/' . $module . '/update/' . $id;
    // }

    public function urlDelete($module, $id)
    {
        if (\Auth::user()->role->name === 'Administrador')
            return 'admin/' . $module . '/destroy/' . $id;
        if (\Auth::user()->role->name === 'Empleado')
            return 'employee/' . $module . '/destroy/' . $id;
        if ($module == 'rental' && \Auth::user()->role->name === 'Cliente')
            return 'client/' . $module . '/destroy/' . $id;
    }
}

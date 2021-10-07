<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies';

    protected $fillable =
    [
        'name',
        'email',
        'nit',
        'address',
        'phone',
        'years_experiences',
        'status_id'
    ];


    protected $guarded = ['id'];

    public function users()
    {
        return $this->hasMany('App\User');
    }

    public function status()
    {
        return $this->belongsTo('App\Models\Status');
    }
}

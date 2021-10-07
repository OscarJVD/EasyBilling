<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $table = 'shops';

    protected $fillable =
    [
        'name',
        'address',
        'email',
        'phone',
        'nit',
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

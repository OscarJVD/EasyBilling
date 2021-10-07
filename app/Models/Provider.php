<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $table = 'providers';

    protected $fillable =
    [
        'name',
        'nit',
        'address',
        'phone',
        'status_id'
    ];

    protected $guarded = ['id'];

    public function products()
    {
        return $this->belongsToMany('App\Models\Product');
    }

    public function status()
    {
        return $this->belongsTo('App\Models\Status');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'clients';

    protected $fillable =
    [
        'name',
        'surname',
        'identification_type',
        'identification_number',
        'address',
        'phone',
        'email',
        'status_id'
    ];

    protected $guarded = ['id'];

    public function bills()
    {
        return $this->hasMany('App\Models\Bill');
    }

    public function status()
    {
        return $this->belongsTo('App\Models\Status');
    }
}

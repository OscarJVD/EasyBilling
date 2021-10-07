<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = 'bills';

    protected $fillable =
    [
        'date_bill',
        'discount',
        'way_to_pay',
        'total',
        'client_id',
        'status_id',
        'user_id'
    ];

    protected $guarded = ['id'];

    public function products()
    {
        return $this->belongsToMany('App\Models\Product');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

    public function status()
    {
        return $this->belongsTo('App\Models\Status');
    }
}

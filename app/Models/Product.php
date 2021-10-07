<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable =
    [
        'name',
        'description',
        'purchase_price',
        'sale_price',
        'stock',
        'category_id',
        'status_id',
        'user_id',
        'iva'
    ];

    protected $guarded = ['id'];

    public function bills()
    {
        return $this->belongsToMany('App\Models\Bill');
    }

    public function providers()
    {
        return $this->belongsToMany('App\Models\Provider');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function status()
    {
        return $this->belongsTo('App\Models\Status');
    }
}

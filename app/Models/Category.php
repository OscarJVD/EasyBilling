<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['name', 'status_id'];
    protected $guarded = ['id'];

    // Relación Muchos(Category) a Muchos(Movie)
    public function movies()
    {
        return $this->belongsToMany('App\Models\Movie');
    }

    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }

    public function status()
    {
        return $this->belongsTo('App\Models\Status');
    }
}

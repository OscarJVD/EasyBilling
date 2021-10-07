<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeStatus extends Model
{
    protected $table = 'type_statuses';
    protected $fillable = ['name'];
    protected $guarded = ['id'];

    public function statuses()
    {
        return $this->hasMany('App\Models\Status');
    }
}

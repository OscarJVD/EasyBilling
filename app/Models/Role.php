<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    protected $fillable = ['name', 'status_id'];
    protected $guarded = ['id'];

    // Relación Uno(Role) -> a Muchos(User)
    public function users()
    {
        return $this->hasMany('App\User');
    }

    public function status()
    {
        return $this->belongsTo('App\Models\Status');
    }
}

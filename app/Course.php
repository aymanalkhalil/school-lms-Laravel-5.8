<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['name', 'available'];

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Programme extends Model
{
    protected $fillable = ['name', 'available'];

    public function subject()
    {
        return $this->hasMany('App\Subject');
    }
    public function adv()
    {
        return $this->hasMany('App\Advertisment');
    }
}
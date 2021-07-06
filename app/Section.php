<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = ['name', 'nota'];

    public function subject()
    {
        return $this->hasOne('App\Subject');
    }
    public function assignment()
    {
        return $this->hasMany('App\Assignment');
    }
    public function section()
    {
        return $this->hasMany('App\Exam');
    }
}
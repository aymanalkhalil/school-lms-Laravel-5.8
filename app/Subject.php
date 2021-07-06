<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [
        'name', 'academic_year',
        'user_id', 'sana_drsia_id', 'section_id',
        'nota'
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function sana_drsia()
    {
        return $this->belongsTo('App\Programme');
    }
    public function score()
    {
        return $this->hasMany('App\Grades');
    }
    public function time()
    {
        return $this->belongsTo('App\Schedule', 'id', 'subject_id');
    }
    public function assignment()
    {
        return $this->hasMany('App\Assignment');
    }
    public function section()
    {
        return $this->belongsTo('App\Section');
    }
    public function exam()
    {
        return $this->hasMany('App\Exam');
    }
}
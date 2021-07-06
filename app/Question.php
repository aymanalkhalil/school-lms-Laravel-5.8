<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['exam_id', 'type', 'question', 'answer', 'mark'];

    public function exam()
    {
        return $this->belongsTo('App\Exam');
    }

    public function choice()
    {
        return $this->hasMany('App\Choice');
    }
}
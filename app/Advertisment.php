<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertisment extends Model
{
    protected $fillable = [
        'programme_id',
        'target_audience',
        'period',
        'day',
        'date',
        'course_name',
        'course_period',
        'from',
        'to',
        'teacher',
        'price',
    ];

    public function program()
    {
        return $this->belongsTo('App\Programme');
    }
}
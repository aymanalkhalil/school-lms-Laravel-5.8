<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'subject_id', 'section_id', 'user_id',
        'final_date', 'final_time', 'hw_number',
        'file', 'note'
    ];
    public function subject()
    {
        return $this->belongsTo('App\Subject');
    }
    public function section()
    {
        return $this->belongsTo('App\Section');
    }

    public function getFinalTimeAttribute($value)
    {
        return  date('h:i A', strtotime($this->attributes['final_time']));
    }

    public function uploads()
    {
        return $this->hasMany('App\AssignmentUser');
    }
}
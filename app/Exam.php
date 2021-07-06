<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{

    protected $fillable = [
        'subject_id', 'section_id', 'user_id',
        'exam_no', 'exam_date', 'exam_open',
        'exam_close', 'timer', 'grade'
    ];
    /**
     * Get the user that owns the Question
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function question()
    {
        return $this->hasMany('App\Question');
    }
    public function section()
    {
        return $this->belongsTo('App\Section');
    }
    public function subject()
    {
        return $this->belongsTo('App\Subject');
    }
    public function users()
    {
        return $this->hasMany('App\Student', 'user_id');
    }
    public function user_exam()
    {
        return $this->hasMany('App\UserExam');
    }
}
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentAnswer extends Model
{
    protected $table = 'student_exam_answers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['exam_id', 'question_id', 'answer'];
    /**
     * Get the user that owns the StudentAnswer
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function question()
    {
        return $this->belongsTo('App\Question');
    }
    public function exam()
    {
        return $this->belongsTo('App\Exam');
    }
}
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserExam extends Model
{
    protected $table = "exam_user";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'exam_id', 'exam_no', 'grade'];
    /**
     * The roles that belong to the StudentExam
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function exam()
    {
        return $this->belongsTo('App\Exam');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserCourse extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'course_user';

    protected $fillable = ['user_id', 'course_id', 'bill'];

    /**
     * Get the course that owns the UserCourse
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function course()
    {
        return $this->belongsTo('App\Course');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
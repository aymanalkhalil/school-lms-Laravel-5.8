<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssignmentUser extends Model
{
    protected $fillable = [
        'assignment_id', 'user_id', 'hw_number',
        'file', 'mark', 'comments'
    ];
    protected $table = 'assignment_user';


    public function assignment()
    {
        return $this->belongsTo('App\Assignment');
    }
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
    public function section()
    {
        return $this->belongsTo('App\Section', 'section_id');
    }
    public function subject()
    {
        return $this->belongsTo('App\Subject', 'subject_id');
    }
}
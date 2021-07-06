<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = [
        'student_delete', 'student_add', 'student_edit', 'student_view',
        'moderator_delete', 'moderator_add', 'moderator_edit', 'moderator_view',
        'teacher_delete', 'teacher_add', 'teacher_edit', 'teacher_view',
        'score_delete', 'score_add', 'score_edit', 'score_view',
        'subject_delete', 'subject_add', 'subject_edit', 'subject_view',
        'time_delete', 'time_add', 'time_edit', 'time_view',
        'facultie_delete', 'facultie_add', 'facultie_edit', 'facultie_view',
        'absent_delete', 'absent_add', 'absent_edit', 'absent_view',
        'sana_drsia_delete', 'sana_drsia_add', 'sana_drsia_edit', 'sana_drsia_view',
        'finance', 'register_time',
    ];
    public function user()
    {
        return $this->belongsTo('App\User', 'id', 'role');
    }
}
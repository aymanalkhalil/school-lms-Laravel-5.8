<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'user_id', 'teacher_id',
        'subject', 'message',
        'reply', 'attachements'
    ];

    /**
     * Get the user that owns the Message
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
    public function teacher()
    {
        return $this->belongsTo('App\User', 'teacher_id');
    }
}
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'city', 'name_arabda', 'phone_arabda',
        'arabda', 'user_id', 'sana', 'rakam_akdemi',
        'sana_drasia', 'status', 'bill'
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function section()
    {
        return $this->belongsTo('App\Section', 'sana');
    }
}
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grades extends Model
{
    protected $fillable = ['user_id', 'subject_id','sana','fainal','hudur'];
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function subject(){
        return $this->belongsTo('App\Subject');
    }
}

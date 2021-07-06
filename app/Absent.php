<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absent extends Model
{
    protected $fillable = ['user_id','no','status','facultie','day','nota'];
    public function user(){
        return $this->belongsTo('App\User');
    }
}

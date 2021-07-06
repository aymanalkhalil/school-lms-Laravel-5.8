<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collection_time extends Model
{
    protected $fillable = ['sho3ba'];

    public function time(){
        return $this->belongsTo('App\Schedule','id','collection_time_id');
    }
}

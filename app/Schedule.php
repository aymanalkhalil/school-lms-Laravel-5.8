<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = ['name_hsa','yom','no','collection_time_id'];

    public function collection_time()
    {
        return $this->hasMany('App\Collection_time','id','collection_time_id');
    }
    public function subject()
    {
        return $this->hasMany('App\Subject','id','subject_id');
    }
}

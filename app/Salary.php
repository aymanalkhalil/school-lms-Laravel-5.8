<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    protected $fillable = [
        'user_id',
        'date',
        'description',
        'salary',
        'user_id'
    ];

    /**
     * Get the user associated with the Salary
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
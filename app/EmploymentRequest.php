<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmploymentRequest extends Model
{
    protected $table = 'employment_requests';

    protected $fillable = ['name', 'file'];
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        
        'course',
        'year_level',
        'section',
        'gender',
        'date_of_birth',
        'address',
        'phone',
        'email',
    ];
}

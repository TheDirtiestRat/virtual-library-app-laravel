<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    // Primary key is 'student_id' (string, not auto-incrementing)
    protected $primaryKey = 'student_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'student_id',
        'first_name',
        'middle_name',
        'last_name',

        'gender',
        'date_of_birth',

        'course',
        'year_level',
        'section',

        'address',
        'phone',
        'email',
    ];
}

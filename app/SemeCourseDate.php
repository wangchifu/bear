<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SemeCourseDate extends Model
{
    protected $fillable = [
        'year_seme',
        'class_year',
        'days',
        'school_days',
    ];
}

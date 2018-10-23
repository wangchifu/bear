<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolClass extends Model
{
    protected $fillable = [
        'year_seme',
        'class_sn',
        'class_type',
        'class_kind',
        'teacher_1',
        'teacher_2',
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScoreSetup extends Model
{
    protected $fillable = [
        'year_seme',
        'class_year',
        'performance_test_times',
        'test_ratio',
    ];
}

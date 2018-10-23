<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolDay extends Model
{
    protected $fillable = [
        'seme_start_date',
        'seme_stop_date',
        'start_date',
        'stop_date',
        'year_seme',
        'active',
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewStudent extends Model
{
    protected $fillable = [
        'year',
        'person_id',
        'name',
        'sex',
        'birthday',
        'parent',
        'residence_address',
        'residence_date',
        'mailing_address',
        'city_call',
        'cell_number',
        'elementary_school',
        'elementary_class',
        'numbering',
        'new_class',
        'new_num',
        'type',
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolBase extends Model
{
    protected $fillable = [
        'code',
        'full_name',
        'name',
        'short_name',
        'english_name',
        'address',
        'telephone_number',
    ];
}

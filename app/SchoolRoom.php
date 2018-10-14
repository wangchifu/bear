<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolRoom extends Model
{
    protected $fillable = [
        'name',
        'telephone_number',
        'fax',
    ];
}

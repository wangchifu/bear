<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $fillable = [
        'name',
        'type',
        'module_id',
        'order_by',
        'active',
    ];
}

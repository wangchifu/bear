<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $fillable = [
        'name',
        'english_name',
        'type',
        'module_id',
        'order_by',
        'active',
    ];

    public function powers()
    {
        return $this->hasMany(Power::class);
    }
}

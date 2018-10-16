<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Power extends Model
{
    protected $fillable = [
        'module_id',
        'type',
        'allow_id',
        'admin',
    ];

    public function module()
    {
        return $this->belongsTo(Module::class);
    }
}

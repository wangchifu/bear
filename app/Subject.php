<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [
        'scope_id',
        'name',
        'enable',
    ];

    public function scope()
    {
        return $this->belongsTo(Scope::class);
    }
}

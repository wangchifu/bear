<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolTitle extends Model
{
    protected $fillable = [
        'order_by',
        'name',
        'short_name',
        'title_kind',
        'school_room_id',
        'file',
    ];

    public function school_room()
    {
        return $this->belongsTo(SchoolRoom::class);
    }
}

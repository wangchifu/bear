<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeacherBase extends Model
{
    protected $fillable = [
        'user_id',
        'school_room_id',
        'title_kind_id',
        'school_title_id',
        'person_id',
        'sex',
        'birthday',
        'telephone_number',
        'cell_number',
        'email',
        'address',
        'photo',
        'edu_key',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function school_room()
    {
        return $this->belongsTo(SchoolRoom::class);
    }
    public function school_title()
    {
        return $this->belongsTo(SchoolTitle::class);
    }
}

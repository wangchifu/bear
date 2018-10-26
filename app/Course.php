<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'scope_id',
        'subject_id',
        'year_seme',
        'class_sn',
        'class_year',
        'has_subject',
        'sections',
        'need_exam',
        'has_stage_test',
        'rate',
        'scope_sort',
        'subject_sort',
        'curriculum_guideline_id',
        'k12ea_category',
        'k12ea_area',
        'k12ea_subject',
        'k12ea_language',
        'k12ea_frequency',
    ];
    public function scope()
    {
        return $this->belongsTo(Scope::class);
    }
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function curriculum_guideline()
    {
        return $this->belongsTo(CurriculumGuideline::class);
    }
}

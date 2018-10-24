<?php
///////////////////1.系統管理///////////////////////////////
//學校基本設定
if (! function_exists('school_setup')) {
    function school_setup()
    {
        $school_base = \App\SchoolBase::orderBy('id')->first();

        $school_setup['code'] = (!empty($school_base->code))?$school_base->code:"";
        $school_setup['full_name'] = (!empty($school_base->full_name))?$school_base->full_name:"";
        $school_setup['name'] = (!empty($school_base->name))?$school_base->name:"";
        $school_setup['short_name'] = (!empty($school_base->short_name))?$school_base->short_name:"";
        $school_setup['english_name'] = (!empty($school_base->english_name))?$school_base->english_name:"";
        $school_setup['address'] = (!empty($school_base->address))?$school_base->address:"";
        $school_setup['telephone_number'] = (!empty($school_base->telephone_number))?$school_base->telephone_number:"";

        return $school_setup;
    }
}

//回傳學期中文班名

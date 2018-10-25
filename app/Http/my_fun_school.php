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
if (! function_exists('cht_class_name')) {
    function cht_class_name($year_seme,$class_sn)
    {
        $school_class = \App\SchoolClass::where('year_seme',$year_seme)
            ->where('class_sn',$class_sn)
            ->first();
        $class_type = config('app.class_type');
        if(substr($class_sn,0,1) != 9){
            $this_class_type = $class_type[$school_class->class_type];

            $y = substr($class_sn,0,1);
            $c = (int)substr($class_sn,1,2);
            $class_name = cht_number($y)."年".$this_class_type[$c]."班";
        }else{
            $class_name = "特教班";
        }


        return $class_name;
    }
}

//回傳目前在職教師陣列
if (! function_exists('get_teacher_array')) {
    function get_teacher_array()
    {
//教師選單
        $users = \App\User::where('condition',0)->get();
        $user_data=[];
        foreach($users as $user){
            $order_by = $user->teacher_base->school_title->order_by;
            $user_data[$order_by][$user->id]['name'] = $user->teacher_base->school_title->name."--".$user->name;
            $user_data[$order_by][$user->id]['id'] = $user->id;
        }
        ksort($user_data);

        $user_select=[];
        foreach($user_data as $k1=>$v1){
            foreach($v1 as $k2=>$v2){
                $user_select[$v2['id']] = $v2['name'];
            }
        }

        return $user_select;
    }
}

<?php
///////////////////1.系統管理///////////////////////////////

//依權限顯示sidebar
if (! function_exists('get_sidebar')) {
    function get_sidebar($user){
        $folders = \App\Module::where('module_id','0')->get();
        $sidebar = [];
        $i =1;
        foreach($folders as $folder){
            if($user->admin == 1){
                $sidebar[$i]['name'] = $folder->name;
                $sidebar[$i]['id'] = $folder->id;
            }else{
                foreach($folder->powers as $power){
                    //檢查是否是管理員，有無授權全部教師、處室、職稱、個人
                    $user_school_room_id = $user->teacher_base->school_room_id;
                    $user_school_title_id = $user->teacher_base->school_title_id;
                    $user_id = $user->id;

                    if( $power->type == "0" or
                        $power->allow_id == $user_school_room_id or
                        $power->allow_id == $user_school_title_id or
                        $power->allow_id == $user_id
                    ){
                        $sidebar[$i]['name'] = $folder->name;
                        $sidebar[$i]['id'] = $folder->id;
                    }


                }
            }
            $i++;
        }
        return $sidebar;
    }
}

//是否有權限瀏覽
if (! function_exists('check_power')) {
    function check_power($type,$item){
        //系統管理員直接pass
        if(auth()->check()){
            if(auth()->user()->admin == 1){
                return true;
            }
        }



        if($type=='folder'){
            $module = \App\Module::where('id',$item)->first();
        }
        if($type=="module"){
            $module = \App\Module::where('english_name',$item)->first();
        }

        //如果授權全部教師就pass
        $power = \App\Power::where('module_id',$module->id)
            ->where('type','0')
            ->first();

        if(!empty($power->id)){
            return true;
        }

        //如果授權全部教師就pass
        $powers = \App\Power::where('module_id',$module->id)
            ->get();
        foreach($powers as $power){
            if($power->allow_id == auth()->user()->teacher_base->school_room_id){
                return true;
            }
            if($power->allow_id == auth()->user()->teacher_base->school_title_id){
                return true;
            }
            if($power->allow_id == auth()->user()->id){
                return true;
            }
        }

        return false;
    }
}

//數字轉中文
if (! function_exists('cht_number')) {
    function cht_number($num){
        $eng_num=[
            '1'=>'一',
            '2'=>'二',
            '3'=>'三',
            '4'=>'四',
            '5'=>'五',
            '6'=>'六',
            '7'=>'七',
            '8'=>'八',
            '9'=>'九',
            '10'=>'十',
            '11'=>'十一',
            '12'=>'十二',
            '13'=>'十三',
            '14'=>'十四',
            '15'=>'十五',
            '16'=>'十六',
            '17'=>'十七',
            '18'=>'十八',
            '19'=>'十九',
            '20'=>'二十',
        ];
        return $eng_num[$num];
    }
}

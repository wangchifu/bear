<?php
///////////////////1.系統管理///////////////////////////////

//顯示sidebar
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

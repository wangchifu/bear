<?php
///////////////////2.學期日期相關///////////////////////////////
//查某日為中文星期幾
if(! function_exists('get_chinese_weekday')){
    function get_chinese_weekday($datetime)
    {
        $weekday = date('w', strtotime($datetime));
        return '星期' . ['日', '一', '二', '三', '四', '五', '六'][$weekday];
    }
}

//查某日為數字的星期幾
if(! function_exists('get_date_w')){
    function get_date_w($d)
    {
        $arrDate=explode("-",$d);
        $week=date("w",mktime(0,0,0,$arrDate[1],$arrDate[2],$arrDate[0]));
        return $week;
    }
}

//查指定日期為哪一個學期
if(! function_exists('get_date_semester')){
    function get_date_semester($date)
    {
        $d = explode('-',$date);
        //查目前學期
        $y = (int)$d[0] - 1911;
        $array1 = array(8, 9, 10, 11, 12, 1);
        $array2 = array(2, 3, 4, 5, 6, 7);
        if (in_array($d[1], $array1)) {
            if ($d[1] == 1) {
                $this_semester = ($y - 1) . "1";
            } else {
                $this_semester = $y . "1";
            }
        } else {
            $this_semester = ($y - 1) . "2";
        }

        return $this_semester;

    }
}

if(! function_exists('get_month_date')){
    //秀某年某月的每一天
    function get_month_date($year_month)
    {
        $this_date = explode("-",$year_month);
        $days=array("01"=>"31","02"=>"28","03"=>"31","04"=>"30","05"=>"31","06"=>"30","07"=>"31","08"=>"31","09"=>"30","10"=>"31","11"=>"30","12"=>"31");
        //潤年的話，二月29天
        if(checkdate(2,29,$this_date[0])){
            $days['02'] = 29;
        }else{
            $days['02'] = 28;
        }

        for($i=1;$i<= $days[$this_date[1]];$i++){
            $order_date[$i] = $this_date[0]."-".$this_date[1]."-".sprintf("%02s", $i);
        }
        return $order_date;
    }
}

//現在是哪一個學期
if(! function_exists('get_curr_seme')){
    //秀某年某月的每一天
    function get_curr_seme()
    {
        $school_day = \App\SchoolDay::where('active','1')->first();
        $this_seme = ['id'=>'','name'=>'','start_date'=>'','stop_date'=>''];
        if(!empty($school_day->id)){
            $year = substr($school_day->year_seme,0,3);
            $seme = substr($school_day->year_seme,3,1);

            $this_seme['id'] = $school_day->year_seme;
            $this_seme['name'] = "{$year}學年第{$seme}學期";
            $this_seme['start_date'] = $school_day->start_date;
            $this_seme['stop_date'] = $school_day->stop_date;
            return $this_seme;
        }

        return null;
    }
}

//學期的跳轉選單
if(! function_exists('get_seme_menu')){
    //秀某年某月的每一天
    function get_seme_menu($this_seme)
    {
        $seme_select = \App\SchoolDay::orderBy('id','DESC')->pluck('year_seme','year_seme')->toArray();

        $menu = "<select name=\"this_seme\" id=\"seme_year\"><option>請選擇學期</option>";
        foreach($seme_select as $k=>$v){
            $y = substr($k,0,3);
            $s = substr($k,3,1);
            $seme = "{$y}學年第{$s}學期";
            $selected = ($k==$this_seme)?"selected":"";
            $menu .="<option value=\"{$v}\" {$selected}>{$seme}</option>";
        }
        $menu .= "</select>";

        return $menu;
    }
}

//學期的中文名
if(! function_exists('cht_seme_name')){
    function cht_seme_name($year_seme){
        return substr($year_seme,0,3) . "學年第" . substr($year_seme,3,1) . "學期";
    }
}

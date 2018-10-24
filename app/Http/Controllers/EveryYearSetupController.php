<?php

namespace App\Http\Controllers;

use App\SchoolClass;
use App\SchoolDay;
use Illuminate\Http\Request;

class EveryYearSetupController extends Controller
{
    public function index()
    {
        $school_days = SchoolDay::orderBy('year_seme','DESC')->get();
        $data = [
            'school_days'=>$school_days,
        ];
        return view('every_year_setups.index',$data);
    }

    public function day_create()
    {
        return view('every_year_setups.day_create');
    }

    public function day_store(Request $request)
    {
        $att = $request->all();
        SchoolDay::create($att);
        return redirect()->route('every_year_setup.index');
    }

    public function day_edit(SchoolDay $school_day)
    {
        $data = [
            'school_day'=>$school_day,
        ];
        return view('every_year_setups.day_edit',$data);
    }

    public function day_update(Request $request,SchoolDay $school_day)
    {
        $att = $request->all();
        $school_day->update($att);
        return redirect()->route('every_year_setup.index');
    }

    public function day_destroy(SchoolDay $school_day)
    {
        $school_day->delete();
        return redirect()->route('every_year_setup.index');
    }

    public function day_set_active(SchoolDay $school_day)
    {
        $att['active'] = 1;
        $school_day->update($att);

        $att['active'] = null;
        $school_days = SchoolDay::all();
        foreach($school_days as $s){
            if($s->id != $school_day->id){
                $s->update($att);
            }
        }
        return redirect()->route('every_year_setup.index');
    }

    public function class_setup(Request $request)
    {
        $curr_seme = get_curr_seme();
        $this_seme = ($request->input('this_seme'))?$request->input('this_seme'):$curr_seme['id'];

        //查本學期班級設定
        $school_classes = SchoolClass::where('year_seme',$this_seme)
            ->get();

        $class_type = ['1'=>'一、二、三','2'=>'甲、乙、丙','3'=>'忠、孝、仁'];
        $grade=[];
        $special['num']='';
        foreach($school_classes as $school_class){
            if($school_class->class_kind=="一般班"){
                $y = substr($school_class->class_sn,0,1);
                if(empty($grade[$y]['num'])) $grade[$y]['num']=0;
                $grade[$y]['num']++;
                $grade[$y]['class_type'] = $class_type[$school_class->class_type];
            }elseif($school_class->class_kind=="特教班"){
                if(empty($special['num'])) $special['num'] = 0;
                $special['num']++;
            }
        }


        $data = [
            'this_seme'=>$this_seme,
            'grade'=>$grade,
            'special'=>$special,
        ];
        return view('every_year_setups.class_setup',$data);
    }

    public function class_edit($year_seme)
    {
        $school_class = SchoolClass::where('year_seme',$year_seme)
            ->first();
        if(empty($school_class->id)){
            $action = "create";
            $grade = [
                '1'=>'',
                '2'=>'',
                '3'=>'',
                '4'=>'',
                '5'=>'',
                '6'=>'',
            ];
            $special = "";
            $class_type = [
                '1'=>'',
                '2'=>'',
                '3'=>'',
                '4'=>'',
                '5'=>'',
                '6'=>'',
            ];
        }else{
            $action = "edit";
            //查本學期班級設定
            $school_classes = SchoolClass::where('year_seme',$year_seme)
                ->get();
            $grade=[];
            $special="";
            foreach($school_classes as $school_class){
                if($school_class->class_kind=="一般班"){
                    $y = substr($school_class->class_sn,0,1);
                    if(empty($grade[$y])) $grade[$y]=0;
                    $grade[$y]++;
                    $class_type[$y] = $school_class->class_type;
                }elseif($school_class->class_kind=="特教班"){
                    if(empty($special)) $special = 0;
                    $special++;
                }
            }
        }

        $data = [
            'year_seme'=>$year_seme,
            'action'=>$action,
            'grade'=>$grade,
            'class_type'=>$class_type,
            'special'=>$special,
        ];
        return view('every_year_setups.class_edit',$data);
    }

    public function class_store(Request $request)
    {
        $att['year_seme'] = $request->input('year_seme');
        $grade = $request->input('grade');
        $special = $request->input('special');
        $class_type = $request->input('class_type');

        //一般班
        foreach($grade as $k => $v){
            for($c=1;$c<=$v;$c++){
                $att['class_sn'] = $k.sprintf("%02d",$c);
                $att['class_type'] = $class_type[$k];
                $att['class_kind'] = "一般班";
                SchoolClass::create($att);
            }
        }

        //特教班
        if($special){
            for($c=1;$c<=$special;$c++){
                $att['class_sn'] = "9".sprintf("%02d",$c);
                $att['class_type'] = 0;
                $att['class_kind'] = "特教班";
                SchoolClass::create($att);
            }
        }

        return redirect()->route('every_year_setup.class_setup');
    }

    public function class_update(Request $request)
    {
        $att['year_seme'] = $request->input('year_seme');
        $grade = $request->input('grade');
        $special = $request->input('special');
        $class_type = $request->input('class_type');

        SchoolClass::where('year_seme',$att['year_seme'])->delete();

        //一般班
        foreach($grade as $k => $v){
            for($c=1;$c<=$v;$c++){
                $att['class_sn'] = $k.sprintf("%02d",$c);
                $att['class_type'] = $class_type[$k];
                $att['class_kind'] = "一般班";
                SchoolClass::create($att);
            }
        }

        //特教班
        if($special){
            for($c=1;$c<=$special;$c++){
                $att['class_sn'] = "9".sprintf("%02d",$c);
                $att['class_type'] = 0;
                $att['class_kind'] = "特教班";
                SchoolClass::create($att);
            }
        }

        return redirect()->route('every_year_setup.class_setup');
    }
}

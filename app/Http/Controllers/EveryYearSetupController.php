<?php

namespace App\Http\Controllers;

use App\SchoolClass;
use App\SchoolDay;
use App\ScoreSetup;
use App\SemeCourseDate;
use Illuminate\Http\Request;

class EveryYearSetupController extends Controller
{
    public function __construct()
    {
        //檢查權限
        $this->middleware('module_power');
    }

    public function index()
    {
        $school_days = SchoolDay::orderBy('year_seme','DESC')
        ->paginate(10);
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

    //上課日設定
    public function school_day(Request $request)
    {
        $curr_seme = get_curr_seme();
        $this_seme = ($request->input('this_seme'))?$request->input('this_seme'):$curr_seme['id'];
        $seme_course_dates = SemeCourseDate::where('year_seme',$this_seme)
            ->get();
        $grade_day = [
            '1'=>'',
            '2'=>'',
            '3'=>'',
            '4'=>'',
            '5'=>'',
            '6'=>'',
        ];
        foreach($seme_course_dates as $seme_course_date){
            $grade_day[$seme_course_date->class_year] = $seme_course_date->days;
        }

        $data = [
            'this_seme'=>$this_seme,
            'grade_day'=>$grade_day,
        ];
        return view('every_year_setups.school_day',$data);
    }

    public function school_day_edit($year_seme,$grade)
    {
        $seme_course_date = SemeCourseDate::where('year_seme',$year_seme)
            ->where('class_year',$grade)
            ->first();
        if(empty($seme_course_date->id)){
            $action = "create";

        }else{
            $action = "edit";

        }

        $data = [
            'year_seme'=>$year_seme,
            'grade'=>$grade,
            'action'=>$action,
            'seme_course_date'=>$seme_course_date,
        ];
        return view('every_year_setups.school_day_edit',$data);
    }

    public function school_day_store(Request $request)
    {
        $att = $request->all();
        SemeCourseDate::create($att);
        return redirect()->route('every_year_setup.school_day');
    }

    public function school_day_update(Request $request,SemeCourseDate $seme_course_date)
    {
        $att = $request->all();
        $seme_course_date->update($att);
        return redirect()->route('every_year_setup.school_day');
    }

    public function score_setup(Request $request)
    {
        $curr_seme = get_curr_seme();
        $this_seme = ($request->input('this_seme'))?$request->input('this_seme'):$curr_seme['id'];

        $score_setups = ScoreSetup::where('year_seme',$this_seme)
            ->orderBy('class_year')
            ->get();

        for($i=1;$i<7;$i++){
            $score[$i]['times'] = "";
            $score[$i]['nor_sec'] = "";
        }

        foreach($score_setups as $score_setup){
            $ratio = explode('+',$score_setup->test_ratio);
            $score[$score_setup->class_year]['times'] = $score_setup->performance_test_times;
            $score[$score_setup->class_year]['nor_sec'] = $ratio[0]."% + ".$ratio[1]."%";
            $score[$score_setup->class_year]['sec'] = $ratio[1];
        }

        $data = [
            'this_seme'=>$this_seme,
            'score'=>$score,
        ];
        return view('every_year_setups.score_setup',$data);
    }

    public function score_edit($year_seme,$grade)
    {
        $score_setup = ScoreSetup::where('year_seme',$year_seme)
            ->where('class_year',$grade)
            ->first();
        if(empty($score_setup->id)){
            $action = "create";
            $times="";
            $nor = "";
            $sec = "";

        }else{
            $action = "edit";
            $ratio = explode('+',$score_setup->test_ratio);
            $times=$score_setup->performance_test_times;
            $nor = $ratio[0];
            $sec = $ratio[1];

        }

        $data = [
            'year_seme'=>$year_seme,
            'grade'=>$grade,
            'action'=>$action,
            'times'=>$times,
            'nor'=>$nor,
            'sec'=>$sec,
        ];
        return view('every_year_setups.score_edit',$data);
    }

    public function score_save(Request $request)
    {
        $year_seme = $request->input('year_seme');
        $grade = $request->input('grade');
        $times = $request->input('times');
        $nor = $request->input('nor');
        $sec = $request->input('sec');
        $all_the_same = $request->input('all_the_same');

        $score_setup = ScoreSetup::where('year_seme',$year_seme)
            ->where('class_year',$grade)
            ->first();

        $action = "create";
        $att['year_seme'] = $year_seme;
        $att['class_year'] = $grade;
        $att['performance_test_times'] = $times;
        $att['test_ratio'] = $nor."+".$sec;
        if($all_the_same=="on"){
            $score_setup = ScoreSetup::where('year_seme',$year_seme)
                ->delete();
            for($i=1;$i<7;$i++){
                $att['class_year'] = $i;
                ScoreSetup::create($att);
            }
        }else{
            if(empty($score_setup->id)){
                ScoreSetup::create($att);
            }else{
                $score_setup->update($att);
            }
        }

        return redirect()->route('every_year_setup.score_setup');

    }
























    public function teacher_setup(Request $request)
    {
        $curr_seme = get_curr_seme();
        $this_seme = ($request->input('this_seme'))?$request->input('this_seme'):$curr_seme['id'];

        $school_classes = SchoolClass::where('year_seme',$this_seme)
            ->orderBy('class_sn')
            ->get();



        $data = [
            'this_seme'=>$this_seme,
            'school_classes'=>$school_classes,
        ];
        return view('every_year_setups.teacher_setup',$data);
    }

    public function teacher_edit($year_seme)
    {

        $school_classes = SchoolClass::where('year_seme',$year_seme)
            ->orderBy('class_sn')
            ->get();

        $user_select = get_teacher_array();
        $data = [
            'year_seme'=>$year_seme,
            'school_classes'=>$school_classes,
            'user_select'=>$user_select,
        ];
        return view('every_year_setups.teacher_edit',$data);
    }

    public function teacher_save(Request $request)
    {
        $year_seme = $request->input('year_seme');
        $teacher_1 = $request->input('teacher_1');
        $teacher_2 = $request->input('teacher_2');

        foreach($teacher_1 as $k => $v){
            $school_class= SchoolClass::where('year_seme',$year_seme)
                ->where('class_sn',$k)
                ->first();
            $att['teacher_1'] = $teacher_1[$k];
            $att['teacher_2'] = $teacher_2[$k];
            $school_class->update($att);
        }

        return redirect()->route('every_year_setup.teacher_setup');
    }
}

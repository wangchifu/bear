<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Rap2hpoutre\FastExcel\FastExcel;
use App\NewStudent;

class TempCompileController extends Controller
{
    public function __construct()
    {
        //檢查權限
        $this->middleware('module_power');
    }

    public function index()
    {
        $years =  DB::table('new_students')
            ->select('year')
            ->groupBy('year')
            ->get();

        $this_year_seme = substr(get_date_semester(date('Y-m-d')),0,3);


            $year_data=[];
        foreach($years as $year){
            $year_data[$year->year]=$year->year;
        }

        $data = [
            'year_data'=>$year_data,
            'this_year_seme'=>$this_year_seme,
        ];
        return view('temp_compiles.index',$data);
    }

    public function csv_import(Request $request)
    {
        if($request->hasFile('csv')) {
            $file = $request->file('csv');

            //先存下來才能open
            $file->storeAs('public/new_student','new_student.csv');

            $collection = (new FastExcel)
                ->configureCsv(',', '#', '\n', 'utf-8')
                ->import(storage_path('app/public/new_student/new_student.csv'));
        }

        $i=1;
        foreach($collection as $v){
            $new_one = [
                'year'=>$v['入學年'],
                'has_study'=>'1',
                'person_id'=>$v['身份證字號'],
                'name'=>$v['姓名'],
                'sex'=>$v['性別(男生:1，女生:2)'],
                'birthday'=>$v['生日'],
                'parent'=>$v['家長姓名'],
                'residence_address'=>$v['戶籍住址'],
                'residence_date'=>$v['戶籍遷入日期'],
                'mailing_address'=>$v['通訊住址'],
                'city_call'=>$v['市話'],
                'cell_number'=>$v['手機號碼'],
                'elementary_school'=>$v['國小校名(國小新生免填)'],
                'elementary_class'=>$v['國小班級(國小新生免填)'],
                'numbering'=>'A'.sprintf("%04s", $i),
                'created_at' => now(),
                'updated_at' => now(),
            ];
            $i++;
            $all[]=$new_one;
        }

        NewStudent::insert($all);

        return redirect()->route('temp_compile.index');

    }

    public function manage($select_year)
    {
        $years =  DB::table('new_students')
            ->select('year')
            ->groupBy('year')
            ->get();

        $this_year_seme = substr(get_date_semester(date('Y-m-d')),0,3);

        $year_data=[];
        foreach($years as $year){
            $year_data[$year->year]=$year->year;
        }

        $new_students = NewStudent::where('year',$select_year)
            ->orderBy('numbering')
            ->paginate(10);

        $data=[
            'this_year_seme'=>$this_year_seme,
            'select_year'=>$select_year,
            'year_data'=>$year_data,
            'new_students'=>$new_students,
        ];
        return view('temp_compiles.manage',$data);
    }

    public function manage_all_destroy($select_year)
    {
        NewStudent::where('year',$select_year)
            ->delete();

        return redirect()->route('temp_compile.manage',$select_year);
    }

    public function manage_create()
    {
        $this_year_seme = substr(get_date_semester(date('Y-m-d')),0,3);

        $data = [
            'this_year_seme'=>$this_year_seme,
        ];
        return view('temp_compiles.manage_create',$data);
    }

    public function manage_store(Request $request)
    {
        $att = $request->all();
        $att['has_study'] = "1";
        NewStudent::create($att);
        $this_year_seme = substr(get_date_semester(date('Y-m-d')),0,3);

        return redirect()->route('temp_compile.manage',$this_year_seme);
    }
}

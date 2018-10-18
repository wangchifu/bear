<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        return view('temp_compiles.index');
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
}

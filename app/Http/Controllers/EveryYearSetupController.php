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

    public function class_setup()
    {
        $this_seme = get_curr_seme();


        $data = [
            'this_seme'=>$this_seme,
        ];
        return view('every_year_setups.class_setup',$data);
    }

    public function class_edit($year_seme)
    {
        $this_seme = get_curr_seme();

        $school_classes = SchoolClass::where('year_seme',$year_seme)
            ->get();
        if($school_classes){
            $action = "create";
        }else{
            $action = "edit";
        }

        $data = [
            'this_seme'=>$this_seme,
            'action'=>$action,
        ];
        return view('every_year_setups.class_edit',$data);
    }
}

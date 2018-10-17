<?php

namespace App\Http\Controllers;

use App\Http\Requests\SchoolTitleRequest;
use App\SchoolBase;
use App\SchoolRoom;
use App\SchoolTitle;
use Illuminate\Http\Request;

class SchoolSetupController extends Controller
{
    public function __construct()
    {
        $this->middleware('module_power');
    }

    public function index()
    {
        $school_base = SchoolBase::find(1);
        //如果尚未建立資料
        if(empty($school_base->id)){
            $school_data['code'] = null;
            $school_data['full_name'] = null;
            $school_data['name'] = null;
            $school_data['short_name']= null;
            $school_data['english_name']= null;
            $school_data['address'] = null;
            $school_data['telephone_number'] = null;
            $action = "create";
        }else{
            $school_data['code'] = $school_base->code;
            $school_data['full_name'] = $school_base->full_name;
            $school_data['name'] = $school_base->name;
            $school_data['short_name']= $school_base->short_name;
            $school_data['english_name']= $school_base->english_name;
            $school_data['address'] = $school_base->address;
            $school_data['telephone_number'] = $school_base->telephone_number;
            $action = "update";
        }

        $data = [
            'school_data'=>$school_data,
            'school_base'=>$school_base,
            'action'=>$action,
        ];
        return view('school_setups.index',$data);
    }

    public function store(Request $request)
    {
        SchoolBase::create($request->all());
        return redirect()->route('school_setup.index');
    }

    public function update(Request $request,SchoolBase $school_base)
    {
        $school_base->update($request->all());
        return redirect()->route('school_setup.index');
    }

    public function school_room()
    {
        $school_rooms = SchoolRoom::all();
        $data = [
            'school_rooms'=>$school_rooms,
        ];
        return view('school_setups.school_room',$data);
    }

    public function school_room_store(Request $request)
    {
        SchoolRoom::create($request->all());
        return redirect()->route('school_setup.school_room');
    }

    public function school_room_edit(SchoolRoom $school_room)
    {
        $school_rooms = SchoolRoom::all();
        $data = [
            'edit_school_room'=>$school_room,
            'school_rooms'=>$school_rooms,
        ];
        return view('school_setups.school_room_edit',$data);
    }

    public function school_room_update(Request $request,SchoolRoom $school_room)
    {
        $school_room->update($request->all());
        return redirect()->route('school_setup.school_room');
    }

    public function school_room_destroy(SchoolRoom $school_room)
    {
        $school_room->delete();
        return redirect()->route('school_setup.school_room');
    }

    public function school_title()
    {
        $school_titles = SchoolTitle::orderBy('order_by')->get();

        //職稱類別選項
        $title_kind_select = config('app.title_kind');

        //處室選項
        $school_room_select = SchoolRoom::all()->pluck('name','id')->toArray();

        $data = [
            'school_titles'=>$school_titles,
            'title_kind_select'=>$title_kind_select,
            'school_room_select'=>$school_room_select,
        ];
        return view('school_setups.school_title',$data);
    }

    public function school_title_store(SchoolTitleRequest $request)
    {

        $school_title = SchoolTitle::create($request->all());

        $filename = "";
        //處理檔案上傳
        if ($request->hasFile('file')) {
            $file = $request->file('file');

            $info = [
                'mime-type' => $file->getMimeType(),
                'original_filename' => $file->getClientOriginalName(),
                'extension' => $file->getClientOriginalExtension(),
                'size' => $file->getClientSize(),
            ];

            $filename = $school_title->id.".".$info['extension'];
            $file->storeAs('public/school_title',$filename);

            //有上傳檔案才寫入
            $att2['file'] = $filename;
            $school_title->update($att2);
        }

        return redirect()->route('school_setup.school_title');
    }

    public function school_title_edit(SchoolTitle $school_title)
    {
        $school_titles = SchoolTitle::orderBy('order_by')->get();

        //職稱類別選項
        $title_kind_select = config('app.title_kind');

        //處室選項
        $school_room_select = SchoolRoom::all()->pluck('name','id')->toArray();

        $data = [
            'title_kind_select'=>$title_kind_select,
            'school_room_select'=>$school_room_select,
            'school_titles'=>$school_titles,
            'edit_school_title'=>$school_title,
        ];
        return view('school_setups.school_title_edit',$data);
    }

    public function school_title_update(SchoolTitleRequest $request,SchoolTitle $school_title)
    {
        $school_title->update($request->all());

        $filename = "";
        //處理檔案上傳
        if ($request->hasFile('file')) {
            $file = $request->file('file');

            $info = [
                'mime-type' => $file->getMimeType(),
                'original_filename' => $file->getClientOriginalName(),
                'extension' => $file->getClientOriginalExtension(),
                'size' => $file->getClientSize(),
            ];

            $filename = $school_title->id.".".$info['extension'];
            $file->storeAs('public/school_title',$filename);

            //有上傳檔案才寫入
            $att2['file'] = $filename;
            $school_title->update($att2);

        }

        return redirect()->route('school_setup.school_title');
    }

    public function school_title_destroy(SchoolTitle $school_title)
    {
        $file = storage_path('app/public/school_title/'.$school_title->file);
        if(file_exists($file) and !empty($school_title->file)){
            unlink($file);
        }

        $school_title->delete();
        return redirect()->route('school_setup.school_title');
    }
}

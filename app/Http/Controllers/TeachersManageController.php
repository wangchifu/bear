<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SchoolRoom;
use App\SchoolTitle;
use App\TeacherBase;
use App\User;

class TeachersManageController extends Controller
{
    public function index($action=null)
    {
        //處室選單
        //職稱類別選項
        $school_room_select = SchoolRoom::all()->pluck('name','id')->toArray();

        //職稱選單
        $school_title_select = SchoolTitle::all()->pluck('name','id')->toArray();

        //職稱類別選項
        $title_kind_select = config('app.title_kind');

        //性別
        $sex_select = ['1'=>'男','2'=>'女'];

        $data = [
            'action'=>$action,
            'school_room_select'=>$school_room_select,
            'school_title_select'=>$school_title_select,
            'title_kind_select'=>$title_kind_select,
            'sex_select'=>$sex_select,
        ];
        return view('teachers_manage.index',$data);
    }

    public function store(Request $request)
    {
        $att['username'] = str_replace(' ','',$request->input('username'));
        $att['password'] = bcrypt(env('DEFAULT_USER_PWD'));
        $att['name'] = str_replace(' ','',$request->input('name'));
        $att['condition'] = 1;//在職

        $user = User::create($att);

        $att2 = $request->all();
        $att2['user_id'] = $user->id;


        $att2['photo']="";
        if ($request->hasFile('file')) {
            $file = $request->file('file');

            $info = [
                'mime-type' => $file->getMimeType(),
                'original_filename' => $file->getClientOriginalName(),
                'extension' => $file->getClientOriginalExtension(),
                'size' => $file->getClientSize(),
            ];

            $filename = $user->id.".".$info['extension'];
            $file->storeAs('public/teacher_photo',$filename);

            //有上傳檔案才寫入
            $att2['photo'] = $filename;

        }

        $att2['edu_key']=hash('sha256',$request->input('person_id'));

        TeacherBase::create($att2);

        return redirect()->route('teachers_manage.index');
    }

    public function check(Request $request)
    {
        $check_user = User::where('username',$request->input('username'))
            ->first();
        if(empty($check_user)){
            $result = 'success';
        }else{
            $result = 'failed';
        }
        echo json_encode($result);
        return;
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TeacherManageRequest;
use App\SchoolRoom;
use App\SchoolTitle;
use App\TeacherBase;
use App\User;

class TeachersManageController extends Controller
{
    public function __construct()
    {
        $this->middleware('module_power');
    }

    public function index(Request $request)
    {
        //若無傳值condition，則為0在職
        $condition = (empty($request->input('condition')))?"0":$request->input('condition');

        //教師選單
        $users = User::where('condition',$condition)->get();
        $user_data=[];
        foreach($users as $user){
            $order_by = $user->teacher_base->school_title->order_by;
            $user_data[$order_by]['name'] = $user->teacher_base->school_title->name."--".$user->name;
            $user_data[$order_by]['id'] = $user->id;
        }
        ksort($user_data);

        $user_select=[];
        foreach($user_data as $k=>$v){
            $user_select[$v['id']] = $v['name'];
        }

        //在職狀濡
        $condition_select = [
            '0'=>'在職',
            '1'=>'調出',
            '2'=>'退休',
            '3'=>'代課期滿',
            '4'=>'資遣',
        ];

        $data = [
            'condition'=>$condition,
            'user_select'=>$user_select,
            'condition_select'=>$condition_select,
        ];
        return view('teachers_manage.index',$data);
    }

    public function create()
    {
        //若無傳值condition，則為0在職
        $condition = 0;

        //教師選單
        $users = User::where('condition',$condition)->get();
        $user_data=[];
        foreach($users as $user){
            $order_by = $user->teacher_base->school_title->order_by;
            $user_data[$order_by]['name'] = $user->teacher_base->school_title->name."--".$user->name;
            $user_data[$order_by]['id'] = $user->id;
        }
        ksort($user_data);

        $user_select=[];
        foreach($user_data as $k=>$v){
            $user_select[$v['id']] = $v['name'];
        }


        //處室選單
        $school_room_select = SchoolRoom::all()->pluck('name','id')->toArray();

        //職稱選單
        $school_title_select = SchoolTitle::all()->pluck('name','id')->toArray();

        //職稱類別選項
        $title_kind_select = config('app.title_kind');

        //性別
        $sex_select = ['1'=>'男','2'=>'女'];

        //在職狀濡
        $condition_select = [
            '0'=>'在職',
            '1'=>'調出',
            '2'=>'退休',
            '3'=>'代課期滿',
            '4'=>'資遣',
        ];

        $data = [
            'condition'=>$condition,
            'user_select'=>$user_select,
            'school_room_select'=>$school_room_select,
            'school_title_select'=>$school_title_select,
            'title_kind_select'=>$title_kind_select,
            'sex_select'=>$sex_select,
            'condition_select'=>$condition_select,
        ];
        return view('teachers_manage.create',$data);
    }

    public function store(TeacherManageRequest $request)
    {
        $att['username'] = str_replace(' ','',$request->input('username'));
        $att['password'] = bcrypt(env('DEFAULT_USER_PWD'));
        $att['name'] = str_replace(' ','',$request->input('name'));
        $att['condition'] = $request->input('condition');//在職狀況

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

    public function check_username(Request $request)
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

    public function check_id(Request $request)
    {
        $check_user = TeacherBase::where('person_id',$request->input('person_id'))
            ->first();
        if(empty($check_user)){
            $result = 'success';
        }else{
            $result = 'failed';
        }
        echo json_encode($result);
        return;
    }

    public function edit(Request $request)
    {
        $condition = $request->input('condition');
        $this_user = User::where('id',$request->input('user_id'))->first();

        //教師選單
        $users = User::where('condition',$condition)->get();
        $user_data=[];
        foreach($users as $user){
            $order_by = $user->teacher_base->school_title->order_by;
            $user_data[$order_by]['name'] = $user->teacher_base->school_title->name."--".$user->name;
            $user_data[$order_by]['id'] = $user->id;
        }
        ksort($user_data);

        $user_select=[];
        foreach($user_data as $k=>$v){
            $user_select[$v['id']] = $v['name'];
        }


        //處室選單
        $school_room_select = SchoolRoom::all()->pluck('name','id')->toArray();

        //職稱選單
        $school_title_select = SchoolTitle::all()->pluck('name','id')->toArray();

        //職稱類別選項
        $title_kind_select = config('app.title_kind');

        //性別
        $sex_select = ['1'=>'男','2'=>'女'];

        //在職狀濡
        $condition_select = [
            '0'=>'在職',
            '1'=>'調出',
            '2'=>'退休',
            '3'=>'代課期滿',
            '4'=>'資遣',
        ];

        $data = [
            'condition'=>$condition,
            'this_user'=>$this_user,
            'user_select'=>$user_select,
            'school_room_select'=>$school_room_select,
            'school_title_select'=>$school_title_select,
            'title_kind_select'=>$title_kind_select,
            'sex_select'=>$sex_select,
            'condition_select'=>$condition_select,
        ];
        return view('teachers_manage.edit',$data);
    }

    public function update(TeacherManageRequest $request)
    {
        $user = User::where('id',$request->input('user_id'))
            ->first();
        $att['name'] = $request->input('name');
        $att['condition'] = $request->input('condition');
        $user->update($att);

        $att2 = $request->all();
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

        $user->teacher_base->update($att2);
        return redirect()->route('teachers_manage.index');
    }

    public function list()
    {
        $users = User::where('condition','0')
            ->get();
        $user_data=[];
        //職稱類別選項
        $title_kind_select = config('app.title_kind');

        foreach($users as $user){
            $order_by = $user->teacher_base->school_title->order_by;
            $user_data[$order_by]['username'] = $user->username;
            $user_data[$order_by]['name'] = $user->name;
            $user_data[$order_by]['id'] = $user->id;
            $user_data[$order_by]['title_kind'] = $title_kind_select[$user->teacher_base->title_kind_id];
            $user_data[$order_by]['school_title'] = $user->teacher_base->school_title->name;
            $user_data[$order_by]['photo'] = $user->teacher_base->photo;
        }
        ksort($user_data);

        $data = [
            'user_data'=>$user_data,
        ];
        return view('teachers_manage.list',$data);
    }
}

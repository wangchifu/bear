<?php

namespace App\Http\Controllers;

use App\Http\Requests\ModuleRequest;
use App\Module;
use App\SchoolRoom;
use App\SchoolTitle;
use App\User;
use App\Power;
use Illuminate\Http\Request;

class ModulesManageController extends Controller
{
    public function __construct()
    {
        $this->middleware('module_power');
    }

    //模組管理
    public function index($folder_id=0,$folder=null)
    {

        $folders = Module::where('type','folder')
            ->where('module_id',$folder_id)
            ->orderBy('order_by')
            ->get();

        $modules = Module::where('type','module')
            ->where('module_id',$folder_id)
            ->orderBy('order_by')
            ->get();

        $father_folder_id = $folder_id;
        while($father_folder_id != 0){
            $father_folder = Module::where('id',$father_folder_id)
                ->first();
            $breadcrumb[$father_folder_id] = $father_folder->name;
            $father_folder_id = $father_folder->module_id;
        }

        $breadcrumb[0] = '首頁';
        //倒序array
        $breadcrumb = array_reverse($breadcrumb,true);

        //如果有傳 folder 來，表示要管理此項目
        $show_folder = [];
        $power_data = [];
        if($folder){
            $show_folder = Module::where('id',$folder)
                ->first();
            $powers = Power::where('module_id',$folder)->get();

            $i=1;
            foreach($powers as $power){
                $power_data[$i]['id'] = $power->id;
                $kind = ($power->admin)?"管理權":"一般";
                $power_data[$i]['kind'] = $kind;
                if($power->type=="0"){
                    $power_data[$i]['for'] = "所有教師";
                }
                if($power->type=="1"){
                    $school_room = SchoolRoom::where('id',$power->allow_id)->first();
                    $power_data[$i]['for'] = $school_room->name;
                }
                if($power->type=="2"){
                    $school_title = SchoolTitle::where('id',$power->allow_id)->first();
                    $power_data[$i]['for'] = $school_title->name;
                }
                if($power->type=="3"){
                    $user = User::where('id',$power->allow_id)->first();
                    $power_data[$i]['for'] = $user->name;
                }
                $i++;
            }
        }


        //路徑選單
        $all_folders = Module::where('type','folder')
            ->orderBy('module_id')
            ->orderBy('order_by')
            ->get();
        $folder_path[0] = "根目錄";
        foreach($all_folders as $folder){
            $father_folder_id = $folder->module_id;
            $path_name = $folder->name;
            while($father_folder_id != 0){
                $father_folder = Module::where('id',$father_folder_id)
                    ->first();
                $path_name = $father_folder->name."/".$path_name;
                $father_folder_id = $father_folder->module_id;
            }
            $folder_path[$folder->id] = "根目錄/".$path_name;
        }

        $types = [
            ''=>'',
            '0'=>'所有教師',
            '1'=>'處室',
            '2'=>'職稱',
            '3'=>'教師'
        ];

        $power_type = [
            ''=>'',
            '1'=>'管理權',
        ];

        //處室選單
        $school_rooms_select = SchoolRoom::all()->pluck('name','id')->toArray();

        //職稱選單
        $school_titles_select = SchoolTitle::all()->pluck('name','id')->toArray();

        //所有教師
        $users_select = User::where('condition','0')->pluck('name','id')->toArray();

        $data = [
            'folder_id'=>$folder_id,
            'folders'=>$folders,
            'modules'=>$modules,
            'breadcrumb'=>$breadcrumb,
            'show_folder'=>$show_folder,
            'folder_path'=>$folder_path,
            'types'=>$types,
            'school_rooms_select'=>$school_rooms_select,
            'school_titles_select'=>$school_titles_select,
            'users_select'=>$users_select,
            'power_data'=>$power_data,
            'power_type'=>$power_type,
        ];

        return view('modules_manage.index',$data);
    }

    //新增分類
    public function folder()
    {
        $folders = Module::where('type','folder')
            ->orderBy('module_id')
            ->orderBy('order_by')
            ->get();

        //路徑選單
        $folder_path[0] = "根目錄";
        foreach($folders as $folder){
            $father_folder_id = $folder->module_id;
            $path_name = $folder->name;
            while($father_folder_id != 0){
                $father_folder = Module::where('id',$father_folder_id)
                    ->first();
                $path_name = $father_folder->name."/".$path_name;
                $father_folder_id = $father_folder->module_id;
            }
            $folder_path[$folder->id] = "根目錄/".$path_name;
        }

        $data = [
            'folder_path'=>$folder_path,
        ];
        return view('modules_manage.folder',$data);
    }

    public function folder_store(ModuleRequest $request)
    {
        $att = $request->all();
        $att['type'] = "folder";
        if($att['active']=="on") $att['action'] = "checked";
        Module::create($att);

        return redirect()->route('modules_manage.index');

    }

    public function folder_update(Request $request,Module $module)
    {
        $att['name'] = $request->input('name');
        $att['module_id'] = $request->input('module_id');
        $att['order_by'] = $request->input('order_by');
        $att['active'] = ($request->input('active')=="on")?"checked":"";

        $module->update($att);

        //有選權限才做
        if($request->input('type') != ""){
            $att2['module_id'] = $module->id;
            $att2['type'] = $request->input('type');
            if($att2['type'] =="1") $att2['allow_id'] =  $request->input('school_room_id');
            if($att2['type'] =="2") $att2['allow_id'] =  $request->input('school_title_id');
            if($att2['type'] =="3") $att2['allow_id'] =  $request->input('user_id');
            $att2['admin'] =  $request->input('admin');
            Power::create($att2);
        }

        $folder = $request->input('folder');
        $folder_id = $request->input('folder_id');
        return redirect('modules_manage/'.$att['module_id'].'/'.$folder);
    }

    public function power_delete(Request $request,Power $power)
    {
        $power->delete();
        $folder = $request->input('folder');
        $folder_id = $request->input('folder_id');
        return redirect('modules_manage/'.$folder_id.'/'.$folder);
    }
}

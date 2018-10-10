<?php

namespace App\Http\Controllers;

use App\Module;
use Illuminate\Http\Request;

class ModulesManageController extends Controller
{
    //模組管理
    public function index($folder_id=0)
    {
        $folders = Module::where('type','folder')
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
        $data = [
            'folder_id'=>$folder_id,
            'folders'=>$folders,
            'breadcrumb'=>$breadcrumb,
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

    public function folder_store(Request $request)
    {
        $att = $request->all();
        $att['type'] = "folder";
        Module::create($att);

        return redirect()->route('modules_manage.index');

    }
}

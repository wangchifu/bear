<?php

namespace App\Http\Controllers;

use App\Module;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function __construct()
    {
        //檢查權限
        $this->middleware('folder_power');
    }

    public function main(Module $folder)
    {
        $folders = Module::where('module_id',$folder->id)
            ->where('type','folder')
            ->get();
        $modules = Module::where('module_id',$folder->id)
            ->where('type','module')
            ->get();

        $father_folder_id = $folder->module_id;
        $path[$folder->id] = $folder->name;
        while($father_folder_id != "0"){
            $father_folder = Module::where('id',$father_folder_id)->first();
            $path[$father_folder->id] = $father_folder->name;
            $father_folder_id = $father_folder->module_id;
        }
        //倒序array，並保留key值
        $path = array_reverse($path,true);

        $data = [
            'folder'=>$folder,
            'folders'=>$folders,
            'modules'=>$modules,
            'path'=>$path,
        ];
        return view('main',$data);
    }
}

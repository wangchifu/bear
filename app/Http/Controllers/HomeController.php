<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use App\Module;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('folder_power');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }

    public function admin()
    {
        return view('admin');
    }

    public function main(Module $folder)
    {

        $modules = Module::where('module_id',$folder->id)->get();

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
            'modules'=>$modules,
            'path'=>$path,
        ];
        return view('main',$data);
    }

    public function getImg($path)
    {
        $path = str_replace('&','/',$path);
        $path = storage_path('app/public/'.$path);
        $file = File::get($path);
        $type = File::mimeType($path);

        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);
        return $response;
    }

    public function getFile($file)
    {
        $file = str_replace('&','/',$file);
        $file = storage_path('app/public/'.$file);
        return response()->download($file);
    }

    public function getPublicFile($file)
    {
        $file = str_replace('&','/',$file);
        $file = public_path($file);
        return response()->download($file);
    }
}

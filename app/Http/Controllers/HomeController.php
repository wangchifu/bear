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
        //$this->middleware('auth');
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

        $data = [
            'folder'=>$folder,
            'modules'=>$modules,
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

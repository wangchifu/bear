<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;
use App\Module;

class HomeController extends Controller
{

    public function index()
    {
        return view('index');
    }

    public function admin()
    {
        return view('admin');
    }

    public function other()
    {
        $modules = Module::where('type','module')
            ->get();
        foreach($modules as $module){
            if(check_power('module',$module->english_name)){
                $power_modules[$module->id]['name'] = $module->name;
                $power_modules[$module->id]['english_name'] = $module->english_name;
            }
        }

        $data = [
            'power_modules'=>$power_modules,
        ];

        return view('other',$data);
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

    public function impersonate_leave()
    {
        Auth::user()->leaveImpersonation();
        return redirect()->route('index');
    }
}

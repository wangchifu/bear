<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TempCompileController extends Controller
{
    public function __construct()
    {
        //檢查權限
        $this->middleware('module_power');
    }

    public function index()
    {
        return view('temp_compiles.index');
    }
}

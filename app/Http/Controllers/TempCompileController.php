<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TempCompileController extends Controller
{
    public function index()
    {
        return view('temp_compiles.index');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ModulesManageController extends Controller
{
    //模組管理
    public function index()
    {
        return view('modules_manage.index');
    }

    //新增分類
    public function folder()
    {
        return view('modules_manage.folder');
    }
}

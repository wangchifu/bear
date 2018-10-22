<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EveryYearSetupController extends Controller
{
    public function index()
    {
        return view('every_year_setups.index');
    }
}

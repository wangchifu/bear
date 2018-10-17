<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class SimulationController extends Controller
{
    public function __construct()
    {
        //檢查權限
        $this->middleware('module_power');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('condition','0')->get();
        $user_data = [];
        foreach($users as $user){
            $user_data[$user->teacher_base->school_title->order_by]['id'] = $user->id;
            $user_data[$user->teacher_base->school_title->order_by]['room'] = $user->teacher_base->school_room->name;
            $user_data[$user->teacher_base->school_title->order_by]['title'] = $user->teacher_base->school_title->name;
            $user_data[$user->teacher_base->school_title->order_by]['name'] = $user->name;
            $user_data[$user->teacher_base->school_title->order_by]['username'] = $user->username;
        }

        //排序
        ksort($user_data);

        $data = [
            'user_data'=>$user_data,
        ];
        return view('simulations.index',$data);
    }

    public function impersonate(User $user)
    {
        Auth::user()->impersonate($user);
        return redirect()->route('index');

    }

}

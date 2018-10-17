<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class FolderPowerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        //系統管理員直接pass
        if(auth()->user()->admin == 1){
            return $next($request);
        }
        $folder = $request->route()->parameter('folder');

        $module = \App\Module::where('id',$folder->id)->first();

        //如果授權全部教師就pass
        $power = \App\Power::where('module_id',$module->id)
            ->where('type','0')
            ->first();

        if(!empty($power->id)){
            return $next($request);
        }

        //如果授權全部教師就pass
        $powers = \App\Power::where('module_id',$module->id)
            ->get();
        foreach($powers as $power){
            if($power->allow_id == auth()->user()->teacher_base->school_room_id){
                return $next($request);
            }
            if($power->allow_id == auth()->user()->teacher_base->school_title_id){
                return $next($request);
            }
            if($power->allow_id == auth()->user()->id){
                return $next($request);
            }
        }

        $words = "你沒有權限！";
        return  response()->view('layouts.wrong',compact('words'));
    }
}

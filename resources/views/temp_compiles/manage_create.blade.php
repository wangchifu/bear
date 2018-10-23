@extends('layouts.master')
@section('title','管理新生')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="form-group col-12">
            <h2>新增新生</h2>
            @include('layouts.module_nav')
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('temp_compile.index') }}">匯入新生</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('temp_compile.manage',$this_year_seme) }}">管理新生</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('temp_compile.report',$this_year_seme) }}">統計標註</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('temp_compile.export',$this_year_seme) }}">匯出入編班檔</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('temp_compile.class',$this_year_seme) }}">編班作業</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-12">
            <div class="row">
                <div class="col-12">
                    <h4>新增名單</h4>
                    {{ Form::open(['route'=>'temp_compile.manage_store','method'=>'post','id'=>'new_student']) }}
                    @include('temp_compiles.form')
                    <a href="#" onclick="history.back()" class="btn btn-secondary btn-sm"><i class="fas fa-chevron-left"></i> 返回</a>
                    <button type="submit" class="btn btn-primary btn-sm" onclick="return confirm('確定新增？')">新增新生</button>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

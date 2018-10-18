@extends('layouts.master')
@section('title','管理新生')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="form-group col-12">
            <h2>管理新生</h2>
            @include('layouts.module_nav')
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('temp_compile.index') }}">匯入新生</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('temp_compile.manage') }}">管理新生</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">匯出編班檔</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">編班作業</a>
                </li>

            </ul>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-12">
            <div class="row">
                @foreach($year_data as $k=>$v)
                <div class="col-3">
                    [ {{ $v }}學年 ]
                </div>
                @endforeach
            </div>
        </div>
        <div class="form-group col-12">
            <div class="row">
                <div class="col-12">
                    <h4>新名名單</h4>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

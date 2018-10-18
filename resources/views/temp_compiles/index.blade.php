@extends('layouts.master')
@section('title','新生編班')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="form-group col-12">
            <h2>新生編班</h2>
            @include('layouts.module_nav')
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('temp_compile.index') }}">匯入新生</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('temp_compile.manage') }}">管理新生</a>
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
                <div class="col-6">
                    <h4>上傳新生CSV檔案</h4>
                    {{ Form::open(['route'=>'temp_compile.csv_import','method'=>'post','files'=>true]) }}
                    <div class="form-group">
                        <label for="csv">選擇檔案</label>
                        {{ Form::file('csv', ['id'=>'csv','class' => 'form-control']) }}
                    </div>
                    <button class="btn btn-primary btn-sm" type="submit" onclick="return confirm('確定？')">
                        上傳
                    </button>
                    {{ Form::close() }}
                    <div class="col-3">
                        已上傳學年：
                    </div>
                    @foreach($year_data as $k=>$v)
                        <div class="col-3">
                            [ {{ $v }}學年 ]
                        </div>
                    @endforeach
                </div>
                <div class="col-6">
                    <h4>說明</h4>
                    <ul>
                        <li>
                            本程式提供正式編班前之新生基本資料匯入。
                        </li>
                        <li>
                            匯入的新生基本資料csv檔格式，請下載範例 CSV 檔「<a href="{{ route('getPublicFile','csv&newstud.csv') }}">newstud.csv</a>」。
                        </li>
                        <li>
                            <strong class="text-danger">請使用 <a href="https://zh-tw.libreoffice.org/" target="_blank">LibreOffice</a> 開啟編輯它，文字編碼 UTF-8，切勿使用 MS Excel。</strong>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

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
                    <a class="nav-link" href="{{ route('temp_compile.manage',$this_year_seme) }}">管理新生</a>
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
                    <hr>
                    已上傳學年：
                    <div class="col-12">
                        @foreach($year_data as $k=>$v)
                        [ {{ $v }}學年 ]
                        @endforeach
                    </div>
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
                        <li>
                            CSV檔的標題列請勿更動。
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

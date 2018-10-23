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
                    <a class="nav-link" href="{{ route('temp_compile.index') }}">匯入新生</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('temp_compile.manage',$this_year_seme) }}">管理新生</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('temp_compile.report',$this_year_seme) }}">統計標註</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('temp_compile.export',$this_year_seme) }}">匯出入編班檔</a>
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
                <div class="form-group col-12">
                    <div class="row">
                        <div class="col-6">
                            <select class="form-control" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                                <option value="">請選擇學年度</option>
                                @foreach($year_data as $k=>$v)
                                    <?php $selected=($v==$select_year)?"selected":""; ?>
                                    <option value="{{ url('temp_compile/'.$k.'/report') }}" {{ $selected }}>{{ $v }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <h4>匯出本年度編班檔</h4>
                    {{ Form::open(['route'=>['temp_compile.csv_download',$select_year],'method'=>'post']) }}
                    <div class="form-group">
                        <label for="class_num">核定班級數</label>
                        {{ Form::text('class_num',null,['id'=>'class_num','class=form-control','required'=>'required']) }}
                    </div>
                    <div class="form-group">
                        <label for="teachers">一年級各班導師</label>
                        {{ Form::text('teachers',null,['id'=>'teachers','class'=>'form-control']) }}
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm"><li class="fas fa-download"></li> 下載CSV檔</button>
                    {{ Form::close() }}
                </div>
                <div class="col-6">
                    <h4>匯出編班檔說明</h4>
                    <ul>
                        <li>
                            請輸入今年一年級的「核定班級數」。
                        </li>
                        <li>
                            請輸入今年一年級「各班導師」,<strong class="text-danger">填寫格式範例為「王小明,李大同」，使用小寫逗號分隔。</strong>
                        </li>
                        <li>
                            輸出的檔案即是交由編班中心的檔案，檔名格式為：「年度_代碼_日期.csv」，如「107_074628_20180702.csv」。
                        </li>
                    </ul>
                </div>
                <hr>
            </div>
            <hr>
            <div class="row">
                <div class="col-6">
                    <h4>上傳亂數編班完成CSV檔案</h4>
                    {{ Form::open(['route'=>'temp_compile.new_student_import','method'=>'post','files'=>true]) }}
                    <div class="form-group">
                        <label for="csv">選擇檔案</label>
                        {{ Form::file('csv', ['id'=>'csv','class' => 'form-control']) }}
                    </div>
                    <button class="btn btn-primary btn-sm" type="submit" onclick="return confirm('確定？')">
                        <i class="fas fa-upload"></i> 上傳CSV檔
                    </button>
                    <input type="hidden" name="select_year" value="{{ $select_year }}">
                    {{ Form::close() }}
                </div>
                <div class="col-6">
                    <h4>上傳亂數編班完成檔說明</h4>
                    <ul>
                        <li>
                            匯入的檔名格式為：「年度_代碼_日期_OK.csv」，如「107_074628_20180702_OK.csv」。
                        </li>
                        <li>
                            若要自行編輯，請下載範例 CSV 檔「<a href="{{ route('getPublicFile','csv&107_07xxxx_20180702_OK.csv') }}">107_07xxxx_20180702_OK.csv</a>」
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

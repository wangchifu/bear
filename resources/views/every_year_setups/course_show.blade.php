@extends('layouts.master')
@section('title','學期初設定')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="form-group col-12">
            <h2>學期初設定</h2>
            @include('layouts.module_nav')
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('every_year_setup.index') }}">開學日設定</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('every_year_setup.class_setup') }}">班級設定</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('every_year_setup.school_day') }}">上課日設定</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('every_year_setup.score_setup') }}">成績設定</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('every_year_setup.course_setup') }}">課程設定</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('every_year_setup.curriculum_setup') }}">課表設定</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('every_year_setup.teacher_setup') }}">設定導師</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-12">
            <h4>{{ cht_seme_name($year_seme) }} {{ cht_class_name($year_seme,$class_sn) }}課程設定</h4>
            <a href="{{ route('every_year_setup.course_setup') }}" class="btn btn-secondary btn-sm">返回</a>
            <a href="" class="btn btn-success btn-sm">新增科目</a>
            <a href="" class="btn btn-danger btn-sm">清除重設</a>
            <br><br>
            <table cellspacing='1' cellpadding='3' border="1">
                <thead>
                <tr bgcolor="#c4e1ff">
                    <th rowspan="2">
                        科目
                    </th>
                    <th rowspan="2">
                        分科
                    </th>
                    <th rowspan="2">
                        課程代碼
                    </th>
                    <th rowspan="2">
                        節數
                    </th>
                    <th rowspan="2">
                        計分
                    </th>
                    <th rowspan="2">
                        完整
                    </th>
                    <th rowspan="2">
                        加權
                    </th>
                    <th rowspan="2">
                        排序
                    </th>
                    <th rowspan="2">
                        課綱對應
                    </th>
                    <th colspan="4" bgcolor="#FFCE3C">
                        國教署人力資源網對應
                    </th>
                </tr>
                <tr bgcolor="#fff0ac">
                    <th>
                        類別
                    </th>
                    <th>
                        領域
                    </th>
                    <th>
                        科目
                    </th>
                    <th>
                        語言別
                    </th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
@endsection

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
                    <a class="nav-link active" href="{{ route('every_year_setup.school_day') }}">上課日設定</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('every_year_setup.score_setup') }}">成績設定</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('every_year_setup.course_setup') }}">課程設定</a>
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
            <h4>上課日設定</h4>
            @if($action=="create")
            {{ Form::open(['route'=>'every_year_setup.school_day_store','method'=>'post']) }}
            @elseif($action=="edit")
            {{ Form::model($seme_course_date,['route'=>['every_year_setup.school_day_update',$seme_course_date->id],'method'=>'patch']) }}
            @endif
            <table class="table table-striped table-hover">
                <thead>
                <tr bgcolor="#cccccc">
                    <th>
                        學年學期
                    </th>
                    <th>
                        學校年級
                    </th>
                    <th width="100">
                        上課日數
                    </th>
                    <th>
                        動作
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        {{ substr($year_seme,0,3) }}學年第{{ substr($year_seme,3,1) }}學期
                    </td>
                    <td>
                        {{ cht_number($grade) }}年級
                    </td>
                    <td>
                        {{ Form::text('days',null,['class'=>'form-control','required'=>'required','maxlength'=>'3']) }}
                    </td>
                    <td>
                        <a href="{{ route('every_year_setup.school_day') }}" class="btn btn-secondary btn-sm">返回</a>
                        <button type="submit" class="btn btn-primary btn-sm" onclick="return confirm('確定嗎？')">儲存</button>
                    </td>
                </tr>
                </tbody>
            </table>
            <input type="hidden" name="year_seme" value="{{ $year_seme }}">
            <input type="hidden" name="class_year" value="{{ $grade }}">
            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection

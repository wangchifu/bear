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
                    <a class="nav-link active" href="{{ route('every_year_setup.score_setup') }}">成績設定</a>
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
            <h4>成績設定</h4>
            {{ Form::open(['route'=>'every_year_setup.score_save','method'=>'post']) }}
            <table class="table table-striped table-hover">
                <thead>
                <tr bgcolor="#cccccc">
                    <th>
                        欲設定的學年度
                    </th>
                    <th>
                        年級
                    </th>
                    <th>
                        定期評量次數
                    </th>
                    <th>
                        計分比例 (平時% + 定期%)
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
                        <input type="text" name="times" size="1" maxlength="1" value="{{ $times }}">
                    </td>
                    <td>
                        <input type="text" name="nor" size="1" maxlength="3" value="{{ $nor }}">% + <input type="text" name="sec" size="1" maxlength="3" value="{{ $sec }}">%
                        <input type="checkbox" name="all_the_same" id="check"> <label for="check">所有年級均同</label>
                    </td>
                    <td>
                        <a href="{{ route('every_year_setup.score_setup') }}" class="btn btn-secondary btn-sm">返回</a>
                        <button type="submit" class="btn btn-primary btn-sm" onclick="return confirm('確定嗎？')">儲存</button>
                    </td>
                </tr>
                </tbody>
            </table>
            <input type="hidden" name="year_seme" value="{{ $year_seme }}">
            <input type="hidden" name="grade" value="{{ $grade }}">
            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection

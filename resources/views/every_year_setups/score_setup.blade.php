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
            {{ Form::open(['route'=>'every_year_setup.score_setup','method'=>'post']) }}
            {!! get_seme_menu($this_seme) !!} <button type="submit">切換學期</button>
            {{ Form::close() }}
            <br>
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
                        {{ substr($this_seme,0,3) }}學年第{{ substr($this_seme,3,1) }}學期
                    </td>
                    <td>
                        一年級
                    </td>
                    <td>
                        {{ $score[1]['times'] }}
                    </td>
                    <td>
                        {{ $score[1]['nor_sec'] }}
                    </td>
                    <td>
                        <a href="{{ route('every_year_setup.score_edit',['year_seme'=>$this_seme,'grade'=>1]) }}" class="btn btn-success btn-sm">編輯</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        {{ substr($this_seme,0,3) }}學年第{{ substr($this_seme,3,1) }}學期
                    </td>
                    <td>
                        二年級
                    </td>
                    <td>
                        {{ $score[2]['times'] }}
                    </td>
                    <td>
                        {{ $score[2]['nor_sec'] }}
                    </td>
                    <td>
                        <a href="{{ route('every_year_setup.score_edit',['year_seme'=>$this_seme,'grade'=>2]) }}" class="btn btn-success btn-sm">編輯</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        {{ substr($this_seme,0,3) }}學年第{{ substr($this_seme,3,1) }}學期
                    </td>
                    <td>
                        三年級
                    </td>
                    <td>
                        {{ $score[3]['times'] }}
                    </td>
                    <td>
                        {{ $score[3]['nor_sec'] }}
                    </td>
                    <td>
                        <a href="{{ route('every_year_setup.score_edit',['year_seme'=>$this_seme,'grade'=>3]) }}" class="btn btn-success btn-sm">編輯</a>
                    </td>
                </tr>
                @if(env('IS_JHORES')==0)
                <tr>
                    <td>
                        {{ substr($this_seme,0,3) }}學年第{{ substr($this_seme,3,1) }}學期
                    </td>
                    <td>
                       四年級
                    </td>
                    <td>
                        {{ $score[4]['times'] }}
                    </td>
                    <td>
                        {{ $score[4]['nor_sec'] }}
                    </td>
                    <td>
                        <a href="{{ route('every_year_setup.score_edit',['year_seme'=>$this_seme,'grade'=>4]) }}" class="btn btn-success btn-sm">編輯</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        {{ substr($this_seme,0,3) }}學年第{{ substr($this_seme,3,1) }}學期
                    </td>
                    <td>
                        五年級
                    </td>
                    <td>
                        {{ $score[5]['times'] }}
                    </td>
                    <td>
                        {{ $score[5]['nor_sec'] }}
                    </td>
                    <td>
                        <a href="{{ route('every_year_setup.score_edit',['year_seme'=>$this_seme,'grade'=>5]) }}" class="btn btn-success btn-sm">編輯</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        {{ substr($this_seme,0,3) }}學年第{{ substr($this_seme,3,1) }}學期
                    </td>
                    <td>
                        六年級
                    </td>
                    <td>
                        {{ $score[6]['times'] }}
                    </td>
                    <td>
                        {{ $score[6]['nor_sec'] }}
                    </td>
                    <td>
                        <a href="{{ route('every_year_setup.score_edit',['year_seme'=>$this_seme,'grade'=>6]) }}" class="btn btn-success btn-sm">編輯</a>
                    </td>
                </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

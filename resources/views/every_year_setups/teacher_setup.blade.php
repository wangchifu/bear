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
                    <a class="nav-link" href="{{ route('every_year_setup.course_setup') }}">課程設定</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('every_year_setup.curriculum_setup') }}">課表設定</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('every_year_setup.teacher_setup') }}">設定導師</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-12">
            <h4>教師設定</h4>
            {{ Form::open(['route'=>'every_year_setup.teacher_setup','method'=>'post']) }}
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
                        班級
                    </th>
                    <th>
                        導師一
                    </th>
                    <th>
                        導師二(選填)
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($school_classes as $school_class)
                <tr>
                    <td>
                        {{ substr($this_seme,0,3) }}學年第{{ substr($this_seme,3,1) }}學期
                    </td>
                    <td>
                        {{ cht_class_name($this_seme,$school_class->class_sn) }} ({{ $school_class->class_sn }})
                    </td>
                    <td>

                    </td>
                    <td>

                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

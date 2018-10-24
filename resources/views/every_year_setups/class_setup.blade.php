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
                    <a class="nav-link active" href="{{ route('every_year_setup.class_setup') }}">班級設定</a>
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
                    <a class="nav-link" href="{{ route('every_year_setup.teacher_setup') }}">設定導師</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-12">
            <h4>班級設定</h4>
            {{ Form::open(['route'=>'every_year_setup.class_setup','method'=>'post']) }}
            {!! get_seme_menu($this_seme) !!} <button type="submit">切換學期</button>
            {{ Form::close() }}
            <br>
            <a href="{{ route('every_year_setup.class_edit',$this_seme) }}" class="btn btn-success btn-sm">設定本學期</a>
            <br>
            <table class="table table-striped table-hover">
                <thead>
                <tr bgcolor="#cccccc">
                    <th>
                        學校年級
                    </th>
                    <th>
                        班級數
                    </th>
                    <th>
                        名稱種類
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($grade as $k=>$v)
                    <tr>
                        <td>
                            {{ cht_number($k) }}年級
                        </td>
                        <td>
                            {{ $v['num'] }}
                        </td>
                        <td>
                            {{ $v['class_type'] }}
                        </td>
                    </tr>
                @endforeach
                @if($special['num'])
                <tr>
                    <td>
                        <strong class="text-danger">特教班</strong>
                    </td>
                    <td>
                        {{ $special['num'] }}
                    </td>
                    <td>
                    </td>
                </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

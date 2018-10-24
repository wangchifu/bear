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
                    <a class="nav-link active" href="{{ route('every_year_setup.index') }}">開學日設定</a>
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
                    <a class="nav-link" href="{{ route('every_year_setup.teacher_setup') }}">設定導師</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-12">
            <h4>學期設定</h4>
            <a href="{{ route('every_year_setup.day_create') }}" class="btn btn-success btn-sm">新增學期設定</a>
            <br><br>
            <table class="table table-striped">
                <thead>
                <tr bgcolor="#cccccc">
                    <th>
                        學期
                    </th>
                    <th>
                        學期開始日
                    </th>
                    <th>
                        學期結束日
                    </th>
                    <th>
                        開學日
                    </th>
                    <th>
                        結業日
                    </th>
                    <th>
                        動作
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($school_days as $school_day)
                    <tr>
                        <td>
                            @if(!empty($school_day->active))
                                <i class="fas fa-check-circle text-success"></i>
                            @endif
                            {{ $school_day->year_seme }}
                        </td>
                        <td>
                            {{ $school_day->seme_start_date }}
                        </td>
                        <td>
                            {{ $school_day->seme_stop_date }}
                        </td>
                        <td>
                            {{ $school_day->start_date }}
                        </td>
                        <td>
                            {{ $school_day->stop_date }}
                        </td>
                        <td>
                            <a href="{{ route('every_year_setup.day_set_active',$school_day->id) }}" class="btn btn-success btn-sm"><i class="fas fa-cog"></i> 設為本學期</a>
                            <a href="{{ route('every_year_setup.day_edit',$school_day->id) }}" class="btn btn-primary btn-sm">修改</a>
                            <a href="{{ route('every_year_setup.day_destroy',$school_day->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('確定刪除？')">刪除</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $school_days->links() }}
        </div>
    </div>
</div>
@endsection

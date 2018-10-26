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
            <h4>課綱領域設定</h4>
            {{ Form::open(['route'=>'every_year_setup.curriculum_guideline_store','method'=>'post']) }}
            <input type="text" name="name" size="7" required> <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('確定教育部有修改領域課程才能新增！！！')">新增領域</button>
            <a href="{{ route('every_year_setup.course_setup') }}" class="btn btn-secondary btn-sm">返回</a>
            {{ Form::close() }}
            <table class="table table-striped table-hover">
                <thead>
                <tr bgcolor="#cccccc">
                    <th>
                        序號
                    </th>
                    <th>
                        領域名稱
                    </th>
                    <th>
                        狀態
                    </th>
                    <th>
                        動作
                    </th>
                </tr>
                </thead>
                <tbody>
                <?php $i=1; ?>
                @foreach($curriculum_guidelines as $curriculum_guideline)
                    <tr>
                        <td>
                            {{ $i }}
                        </td>
                        <td>
                            {{ $curriculum_guideline->name }}
                        </td>
                        <td>
                            @if($curriculum_guideline->enable==1)
                                <i class="fas fa-check-circle text-success"></i> 啟用
                            @else
                                <i class="fas fa-times-circle text-danger"></i> 停用
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('every_year_setup.curriculum_guideline_change',$curriculum_guideline->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('確定嗎？這很重要喔！')">更改啟用狀態</a>
                        </td>
                    </tr>
                    <?php $i++; ?>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

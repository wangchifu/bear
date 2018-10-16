@extends('layouts.master')
@section('title','教師管理')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="form-group col-12">
            <h2>教師管理</h2>
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('teachers_manage.index') }}">基本任職資料</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('teachers_manage.list') }}">在職教師一覽表</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                    <div class="row">
                        <div class="col-3">
                            @include('teachers_manage.teacher_menu')
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{ Form::close() }}
</div>
@endsection

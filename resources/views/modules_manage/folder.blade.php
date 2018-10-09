@extends('layouts.master')
@section('title','首頁')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="form-group">
            <h2>模組權限管理</h2>
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('modules_manage.index') }}">模組管理</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('modules_manage.folder') }}">新增分類</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="form-group">
            <label for="name">輸入分類名稱：</label>
            {{ Form::text('name',null,['class' => 'form-control', 'required' => 'required']) }}
            <small id="emailHelp" class="form-text text-muted">用來放置模組功能</small>
        </div>
    </div>
    <div class="row">
        <div class="form-group">
            <label for="name">將此分類放到：</label>
            {{ Form::text('name',null,['class' => 'form-control', 'required' => 'required']) }}
            <small id="emailHelp" class="form-text text-muted">之下</small>
        </div>
    </div>
    <div class="row">
        <div class="form-group form-check col-4">
            <input type="checkbox" class="form-check-input" id="Check1">
            <label class="form-check-label" for="Check1">立即啟用</label>
        </div>
    </div>
    <div class="row">
        <button type="submit" class="btn btn-primary" onclick="return confirm('確定新增？')">新增模組分類</button>
    </div>
</div>
@endsection

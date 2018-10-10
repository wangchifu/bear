@extends('layouts.master')
@section('title','首頁')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="form-group col-12">
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
    {{ Form::open(['route'=>'modules_manage.folder_store','method'=>'post']) }}
    <div class="row">
        <div class="form-group">
            <label for="name">輸入分類名稱：</label>
            {{ Form::text('name',null,['id'=>'name','class' => 'form-control', 'required' => 'required']) }}
            <small id="emailHelp" class="form-text text-muted">用來放置模組功能</small>
        </div>
    </div>
    <div class="row">
        <div class="form-group">
            <label for="module_id">將此分類放到：</label>
            {{ Form::select('module_id',$folder_path,null,['id'=>'module_id','class' => 'form-control', 'required' => 'required']) }}
            <small id="emailHelp" class="form-text text-muted">之下</small>
        </div>
    </div>
    <div class="row">
        <div class="form-group">
            <label for="order_by">排序：</label>
            {{ Form::text('order_by','1',['id'=>'order_by','class' => 'form-control', 'required' => 'required']) }}
            <small id="emailHelp" class="form-text text-muted">用來放置模組功能</small>
        </div>
    </div>
    <div class="row">
        <div class="form-group form-check col-12">
            <input type="checkbox" name="active" class="form-check-input" id="Check1" checked>
            <label class="form-check-label" for="Check1">立即啟用</label>
        </div>
    </div>
    <div class="row">
        <div class="form-group">
            <button type="submit" class="btn btn-primary" onclick="return confirm('確定新增？')">新增模組分類</button>
        </div>
    </div>
    {{ Form::close() }}
</div>
@endsection

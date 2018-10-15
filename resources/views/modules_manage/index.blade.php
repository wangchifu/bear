@extends('layouts.master')
@section('title','模組權限管理')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="form-group col-12">
            <h2>模組權限管理</h2>
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('modules_manage.index') }}">模組管理</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('modules_manage.folder') }}">新增分類</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-6">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    @foreach($breadcrumb as $k=>$v)
                        @if($k==$folder_id)
                            <li class="breadcrumb-item active" aria-current="page">{{ $v }}</li>
                        @else
                            <li class="breadcrumb-item"><a href="{{ route('modules_manage.index',$k) }}">{{ $v }}</a></li>
                        @endif
                    @endforeach
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-6">
            <table class="table table-striped table-bordered col-6">
                <thead class="card-header">
                <tr>
                    <th>
                        順序
                    </th>
                    <th>
                        啟用
                    </th>
                    <th>
                        模組名稱
                    </th>
                    <th>
                        模組管理
                    </th>
                    <th>
                        變數調整
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($folders as $folder)
                <tr>
                    <td>
                        {{ $folder->order_by }}
                    </td>
                    <td>
                        @if($folder->active == "checked")
                            <i class="fas fa-check-circle text-success"></i>
                        @else
                            <i class="fas fa-times-circle text-danger"></i>
                        @endif
                    </td>
                    <td>
                        @if($folder->active == "checked")
                            <a href="{{ url('modules_manage/'.$folder->id) }}">{{ $folder->name }}</a>
                        @else
                            <a href="{{ url('modules_manage/'.$folder->id) }}" class="text-secondary">{{ $folder->name }}</a>
                        @endif
                    </td>
                    <td>
                        <a href="{{ url('modules_manage/'.$folder_id.'/'.$folder->id) }}">管理</a>
                    </td>
                    <td>

                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        @if(!empty($show_folder))
        <div class="col-6">
            {{ Form::open(['route'=>'modules_manage.folder_update','method'=>'patch']) }}
            <div class="form-control">
                <lable for="name">中文名稱</lable>
                {{ Form::text('name',$show_folder->name,['id'=>'name','class' => 'form-control']) }}
                <hr>
                <lable for="name">所屬分類</lable>
                {{ Form::select('module_id',$folder_path,$folder_id,['id'=>'module_id','class' => 'form-control', 'required' => 'required']) }}
                <hr>
                <label for="order_by">排序：</label>
                {{ Form::text('order_by',$show_folder->order_by,['id'=>'order_by','class' => 'form-control', 'required' => 'required']) }}
                <hr>
                <div class="form-group form-check">
                    <input type="checkbox" name="active" class="form-check-input" id="Check1" {{ $show_folder->active }}>
                    <label class="form-check-label" for="Check1">立即啟用</label>
                </div>
                <hr>
                <lable for="name">模組授權</lable>
                {{ Form::text('name',null,['id'=>'name','class' => 'form-control']) }}
                <hr>
                <a href="" class="btn btn-primary btn-sm">儲存</a>
            </div>
            {{ Form::close() }}
        </div>
        @endif
    </div>
</div>
@endsection

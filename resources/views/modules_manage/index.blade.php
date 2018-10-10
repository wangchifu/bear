@extends('layouts.master')
@section('title','首頁')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="form-group">
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
    <div class="row">
        <table class="table table-striped col-6">
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
                    @if($folder->active == "on")
                        <i class="fas fa-check-circle text-success"></i>
                    @else
                        <i class="fas fa-times-circle text-danger"></i>
                    @endif
                </td>
                <td>
                    <a href="{{ url('modules_manage/'.$folder->id) }}">{{ $folder->name }}</a>
                </td>
                <td>
                    <a href="{{ url('modules_manage/'.$folder->id.'/'.$folder->id) }}">管理</a>
                </td>
                <td>

                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
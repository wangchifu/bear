@extends('layouts.master')
@section('title','學校設定')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="form-group">
            <h2>學校設定</h2>
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('school_setup.index') }}">基本資料</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('school_setup.school_room') }}">處室資料</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('school_setup.school_title') }}">職稱資料</a>
                </li>
            </ul>
        </div>
    </div>
    @include('layouts.form_error')
    <div class="row">
        <table class="table table-striped table-bordered">
            <thead class="bg-light">
            <tr>
                <th nowrap width="80">
                    排序
                </th>
                <th nowrap>
                    職位名稱
                </th>
                <th nowrap>
                    簡稱
                </th>
                <th nowrap width="160">
                    職稱類別
                </th>
                <th nowrap width="120">
                    所在處室
                </th>
                <th nowrap>
                    上傳簽章檔
                </th>
                <th nowrap>
                    動作
                </th>
            </tr>
            </thead>
            <tbody>
            {{ Form::open(['route'=>'school_setup.school_title_store','method'=>'store','files'=>true]) }}
            <tr>
                <td>
                    {{ Form::text('order_by',null,['id'=>'order_by','class'=>'form-control','required'=>'required']) }}
                </td>
                <td>
                    {{ Form::text('name',null,['id'=>'name','class'=>'form-control','required'=>'required']) }}
                </td>
                <td>
                    {{ Form::text('short_name',null,['id'=>'short_name','class'=>'form-control','required'=>'required']) }}
                </td>
                <td>
                    {{ Form::select('title_kind',$title_kind_select,null,['class'=>'form-control']) }}
                </td>
                <td>
                    {{ Form::select('school_room_id',$school_room_select,null,['class'=>'form-control']) }}
                </td>
                <td>
                    {{ Form::file('file', ['class' => 'form-control']) }}
                </td>
                <td>
                    <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('確定新增？')">新增</button>
                </td>
            </tr>
            {{ Form::close() }}
            @foreach($school_titles as $school_title)
                <tr>
                    <td>
                        {{ $school_title->order_by }}
                    </td>
                    <td>
                        {{ $school_title->name }}
                    </td>
                    <td>
                        {{ $school_title->short_name }}
                    </td>
                    <td>
                        {{ $title_kind_select[$school_title->title_kind] }}
                    </td>
                    <td>
                        {{ $school_title->school_room->name }}
                    </td>
                    <td>
                        @if(!empty($school_title->file))
                        <img src="{{ url('img/school_title&'.$school_title->file) }}" height="30">
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('school_setup.school_title_edit',$school_title->id) }}" class="btn btn-info btn-sm">編輯</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
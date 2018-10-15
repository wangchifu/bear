@extends('layouts.master')
@section('title','學校設定')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="form-group col-12">
            <h2>學校設定</h2>
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('school_setup.index') }}">基本資料</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('school_setup.school_room') }}">處室資料</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('school_setup.school_title') }}">職稱資料</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-12">
            <table class="table table-striped table-bordered">
            <thead class="bg-light">
            <tr>
                <th>
                    編號
                </th>
                <th>
                    處室名稱
                </th>
                <th>
                    電話
                </th>
                <th>
                    傳真
                </th>
                <th>
                    動作
                </th>
            </tr>
            </thead>
            <tbody>
            {{ Form::open(['route'=>'school_setup.school_room_store','method'=>'store']) }}
            <tr>
                <td>

                </td>
                <td>
                    {{ Form::text('name',null,['id'=>'name','class'=>'form-control','required'=>'required']) }}
                </td>
                <td>
                    {{ Form::text('telephone_number',null,['id'=>'telephone_number','class'=>'form-control']) }}
                </td>
                <td>
                    {{ Form::text('fax',null,['id'=>'fax','class'=>'form-control']) }}
                </td>
                <td>
                    <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('確定新增？')">新增</button>
                </td>
            </tr>
            {{ Form::close() }}
            @foreach($school_rooms as $school_room)
                <tr>
                    <td>
                        {{ $school_room->id }}
                    </td>
                    <td>
                        {{ $school_room->name }}
                    <td>
                        {{ $school_room->telephone_number }}
                    </td>
                    <td>
                        {{ $school_room->fax }}
                    </td>
                    <td>
                       <a href="{{ route('school_setup.school_room_edit',$school_room->id) }}" class="btn btn-info btn-sm">編輯</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        </div>
    </div>
</div>
@endsection

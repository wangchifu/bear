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
                            <div class="col-9">
                                {{ Form::open(['route'=>'teachers_manage.update','method'=>'patch','id'=>'add_teacher','files'=>true]) }}
                                <table class="table table-striped">
                                    <tr>
                                        <td width="90">
                                            <label for="username">教師代號</label>
                                        </td>
                                        <td>
                                            {{ Form::text('username',$this_user->username,['id'=>'username','class'=>'form-control','readonly'=>'readonly']) }}
                                        </td>
                                        <td width="90">
                                            <label for="name">姓名</label>
                                        </td>
                                        <td>
                                            {{ Form::text('name',$this_user->name,['id'=>'name','class'=>'form-control','required'=>'required']) }}
                                        </td>
                                        <td rowspan="5" width="200">
                                            @if(empty($this_user->teacher_base->photo))
                                                <img src="{{ asset('img/user.svg') }}" width="200">
                                            @else
                                                <img src="{{ url('img/teacher_photo&'.$this_user->teacher_base->photo) }}" width="200">
                                            @endif

                                            {{ Form::file('file', ['class' => 'form-control']) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="school_room_id">所在處室</label>
                                        </td>
                                        <td>
                                            {{ Form::select('school_room_id',$school_room_select,$this_user->teacher_base->school_room_id,['id'=>'school_room_id','class'=>'form-control']) }}
                                        </td>
                                        <td>
                                            <label for="title_kind_id">職別編號</label>
                                        </td>
                                        <td>
                                            {{ Form::select('title_kind_id',$title_kind_select,$this_user->teacher_base->title_kind_id,['id'=>'title_kind_id','class'=>'form-control']) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="school_title_id">職稱</label>
                                        </td>
                                        <td>
                                            {{ Form::select('school_title_id',$school_title_select,$this_user->teacher_base->school_title_id,['id'=>'school_title_id','class'=>'form-control']) }}
                                        </td>
                                        <td>
                                            在職狀況
                                        </td>
                                        <td>
                                            {{ Form::select('condition',$condition_select,$this_user->condition,['id'=>'condition_id','class'=>'form-control']) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="person_id">身分證號</label>
                                        </td>
                                        <td>
                                            {{ Form::text('person_id',$this_user->teacher_base->person_id,['id'=>'person_id','class'=>'form-control','maxlength'=>'10']) }}
                                        </td>
                                        <td>
                                            <label for="sex">性別</label>
                                        </td>
                                        <td>
                                            {{ Form::select('sex',$sex_select,$this_user->teacher_base->sex,['id'=>'sex','class'=>'form-control']) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="birthday">生日</label>
                                        </td>
                                        <td>
                                            {{ Form::text('birthday',$this_user->teacher_base->birthday,['id'=>'birthday','class'=>'form-control','placeholder'=>'如：1978-1026','maxlength'=>'10']) }}
                                        </td>
                                        <td>
                                            <label for="telephone_number">電話號碼</label>
                                        </td>
                                        <td>
                                            {{ Form::text('telephone_number',$this_user->teacher_base->telephone_number,['id'=>'telephone_number','class'=>'form-control']) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="cell_number">手機號碼</label>
                                        </td>
                                        <td>
                                            {{ Form::text('cell_number',$this_user->teacher_base->cell_number,['id'=>'cell_number','class'=>'form-control']) }}
                                        </td>
                                        <td>
                                            <label for="email">email</label>
                                        </td>
                                        <td colspan="2">
                                            {{ Form::text('email',$this_user->teacher_base->email,['id'=>'email','class'=>'form-control']) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="address">住址</label>
                                        </td>
                                        <td colspan="4">
                                            {{ Form::text('address',$this_user->teacher_base->address,['id'=>'address','class'=>'form-control']) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            edu_key
                                        </td>
                                        <td colspan="4">
                                            {{ $this_user->teacher_base->edu_key }}
                                        </td>
                                    </tr>
                                </table>
                                <button type="submit" class="btn btn-primary btn-sm" onclick="return confirm('確定嗎？')">儲存</button>
                                <input type="hidden" name="user_id" value="{{ $this_user->id }}">
                                {{ Form::close() }}
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

@extends('layouts.master')
@section('title','教師管理')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="form-group col-12">
            <h2>教師管理</h2>
            @include('layouts.module_nav')
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
                            @include('layouts.form_error')
                            {{ Form::open(['route'=>'teachers_manage.store','method'=>'post','id'=>'add_teacher','files'=>true]) }}
                            <table class="table table-striped">
                                <tr>
                                    <td width="90">
                                        <label for="username">教師代號</label>
                                    </td>
                                    <td>
                                        {{ Form::text('username',null,['id'=>'username','class'=>'form-control','required'=>'required','onchange'=>'check_username()']) }}
                                    </td>
                                    <td width="90">
                                        <label for="name">姓名</label>
                                    </td>
                                    <td>
                                        {{ Form::text('name',null,['id'=>'name','class'=>'form-control','required'=>'required']) }}
                                    </td>
                                    <td rowspan="5" width="200">
                                        {{ Form::file('file', ['class' => 'form-control']) }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="school_room_id">所在處室</label>
                                    </td>
                                    <td>
                                        {{ Form::select('school_room_id',$school_room_select,null,['id'=>'school_room_id','class'=>'form-control']) }}
                                    </td>
                                    <td>
                                        <label for="title_kind_id">職別編號</label>
                                    </td>
                                    <td>
                                        {{ Form::select('title_kind_id',$title_kind_select,null,['id'=>'title_kind_id','class'=>'form-control']) }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="school_title_id">職稱</label>
                                    </td>
                                    <td>
                                        {{ Form::select('school_title_id',$school_title_select,null,['id'=>'school_title_id','class'=>'form-control']) }}
                                    </td>
                                    <td>
                                        在職狀況
                                    </td>
                                    <td>
                                        {{ Form::select('condition',$condition_select,null,['id'=>'condition_id','class'=>'form-control']) }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="person_id">身分證號</label>
                                    </td>
                                    <td>
                                        {{ Form::text('person_id',null,['id'=>'person_id','class'=>'form-control','maxlength'=>'10','onchange'=>'check_id()']) }}
                                    </td>
                                    <td>
                                        <label for="sex">性別</label>
                                    </td>
                                    <td>
                                        {{ Form::select('sex',$sex_select,null,['id'=>'sex','class'=>'form-control']) }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="birthday">生日</label>
                                    </td>
                                    <td>
                                        {{ Form::text('birthday',null,['id'=>'birthday','class'=>'form-control','placeholder'=>'如：1978-10-26','maxlength'=>'10']) }}
                                    </td>
                                    <td>
                                        <label for="telephone_number">電話號碼</label>
                                    </td>
                                    <td>
                                        {{ Form::text('telephone_number',null,['id'=>'telephone_number','class'=>'form-control']) }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="cell_number">手機號碼</label>
                                    </td>
                                    <td>
                                        {{ Form::text('cell_number',null,['id'=>'cell_number','class'=>'form-control']) }}
                                    </td>
                                    <td>
                                        <label for="email">email</label>
                                    </td>
                                    <td colspan="2">
                                        {{ Form::text('email',null,['id'=>'email','class'=>'form-control']) }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="address">住址</label>
                                    </td>
                                    <td colspan="4">
                                        {{ Form::text('address',null,['id'=>'address','class'=>'form-control']) }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        edu_key
                                    </td>
                                    <td colspan="4">

                                    </td>
                                </tr>
                            </table>
                            <button type="submit" class="btn btn-primary btn-sm" onclick="return confirm('確定嗎？')">儲存</button>
                            {{ Form::close() }}
                        </div>
                        <script>
                            function check_username(){
                                $.ajax({
                                    type: "POST",
                                    url: "{{ route('teachers_manage.check_username') }}",
                                    dataType: 'json',
                                    data: $("#add_teacher").serialize(),

                                    error: function (result) {
                                        alert("連接失敗");
                                        $('#username').val('');
                                        $('#username').focus();
                                    },
                                    success: function (result) {
                                        if (result == 'success') {


                                        } else {
                                            alert("此帳號已被使用");
                                            $('#username').val('');
                                            $('#username').focus();

                                        }
                                    }
                                });
                            }

                            function check_id(){
                                $.ajax({
                                    type: "POST",
                                    url: "{{ route('teachers_manage.check_id') }}",
                                    dataType: 'json',
                                    data: $("#add_teacher").serialize(),

                                    error: function (result) {
                                        alert("連接失敗");
                                        $('#person_id').val('');
                                        $('#person_id').focus();
                                    },
                                    success: function (result) {
                                        if (result == 'success') {


                                        } else {
                                            alert("此身分證號已被使用");
                                            $('#person_id').val('');
                                            $('#person_id').focus();

                                        }
                                    }
                                });
                            }
                        </script>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{ Form::close() }}
</div>
@endsection

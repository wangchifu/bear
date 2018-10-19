@extends('layouts.master')
@section('title','管理新生')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="form-group col-12">
            <h2>新增新生</h2>
            @include('layouts.module_nav')
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('temp_compile.index') }}">匯入新生</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('temp_compile.manage',$this_year_seme) }}">管理新生</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">統計資訊</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">匯出編班檔</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">編班作業</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-12">
            <div class="row">
                <div class="col-12">
                    <h4>新增名單</h4>
                    {{ Form::open(['route'=>'temp_compile.manage_store','method'=>'post']) }}
                    <table class="table table-striped table-bordered">
                        <tr>
                            <td rowspan="2">
                                <label for="year">學年度</label>
                                {{ Form::text('year',null,['id'=>'year','class'=>'form-control','required'=>'required']) }}
                                <br>
                                <label for="numbering">臨時編號</label>
                                {{ Form::text('numbering',null,['id'=>'numbering','class'=>'form-control','placeholder'=>'如：A0001','required'=>'required']) }}
                            </td>
                            <td>
                                <label for="elementary_school">學校名稱</label>
                                {{ Form::text('elementary_school',null,['id'=>'elementary_school','class'=>'form-control']) }}
                            </td>
                            <td>
                                <label for="name">姓名</label>
                                {{ Form::text('name',null,['id'=>'name','class'=>'form-control','required'=>'required']) }}
                            </td>
                            <td>
                                <label for="sex">性別</label>
                                {{ Form::text('sex',null,['id'=>'sex','class'=>'form-control']) }}
                            </td>
                            <td>
                                <label for="birthday">生日</label>
                                {{ Form::text('birthday',null,['id'=>'birthday','class'=>'form-control']) }}
                            </td>
                            <td>
                                <label for="parent">家長</label>
                                {{ Form::text('parent',null,['id'=>'parent','class'=>'form-control']) }}
                            </td>
                            <td>
                                <label for="city_call">市話</label>
                                {{ Form::text('city_call',null,['id'=>'city_call','class'=>'form-control']) }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="elementary_class">國小班級</label>
                                {{ Form::text('elementary_class',null,['id'=>'elementary_class','class'=>'form-control']) }}
                            </td>
                            <td>
                                <label for="person_id">身份證字號</label>
                                {{ Form::text('person_id',null,['id'=>'person_id','class'=>'form-control']) }}
                            </td>
                            <td colspan="3">
                                <lable for="residence_address">戶籍地址</lable>
                                {{ Form::text('residence_address',null,['id'=>'residence_address','class'=>'form-control']) }}
                                <br>
                                <label for="residence_date">戶籍遷入日期</label>
                                {{ Form::text('residence_date',null,['id'=>'residence_date','class'=>'form-control']) }}
                                <br>
                                <lable for="mailing_address">通訊地址</lable>
                                {{ Form::text('mailing_address',null,['id'=>'mailing_address','class'=>'form-control']) }}
                            </td>
                            <td>
                                <lable for="cell_number">手機</lable>
                                {{ Form::text('cell_number',null,['id'=>'cell_number','class'=>'form-control']) }}
                            </td>
                        </tr>
                    </table>
                    <button type="submit" class="btn btn-primary btn-sm" onclick="return confirm('確定新增？')">新增新生</button>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

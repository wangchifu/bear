@extends('layouts.master')
@section('title','學校設定')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="form-group col-12">
            <h2>學校設定</h2>
            @include('layouts.module_nav')
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('school_setup.index') }}">基本資料</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('school_setup.school_room') }}">處室資料</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('school_setup.school_title') }}">職稱資料</a>
                </li>
            </ul>
        </div>
    </div>
    @if($action == "create")
        {{ Form::open(['route'=>'school_setup.store','method'=>'post']) }}
    @elseif($action == "update")
        {{ Form::model($school_base,['route'=>['school_setup.update',$school_base->id],'method'=>'patch']) }}
    @endif
    <div class="row">
        <div class="form-group col-12">
            <div class="row">
                <div class="col-12">
                    <table class="table table-striped table-bordered">
                        <tr>
                            <td>
                                <label for="code">學校代碼</label>
                                {{ Form::text('code',null,['id'=>'code','class' => 'form-control', 'required' => 'required','maxlength'=>'6']) }}
                            </td>
                            <td>
                                <label for="full_name">中文全銜名稱</label>
                                {{ Form::text('full_name',null,['id'=>'full_name','class' => 'form-control', 'required' => 'required']) }}
                            </td>
                            <td>
                                <label for="name">中文名稱</label>
                                {{ Form::text('name',null,['id'=>'name','class' => 'form-control', 'required' => 'required']) }}
                            </td>
                            <td>
                                <label for="short_name">中文簡稱</label>
                                {{ Form::text('short_name',null,['id'=>'short_name','class' => 'form-control', 'required' => 'required']) }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="telephone_number">電話</label>
                                {{ Form::text('telephone_number',null,['id'=>'telephone_number','class' => 'form-control', 'required' => 'required']) }}
                            </td>
                            <td>
                                <label for="english_name">英文名稱</label>
                                {{ Form::text('english_name',null,['id'=>'english_name','class' => 'form-control', 'required' => 'required']) }}
                            </td>
                            <td colspan="2">
                                <label for="address">地址</label>
                                {{ Form::text('address',null,['id'=>'address','class' => 'form-control', 'required' => 'required']) }}
                            </td>
                        </tr>
                    </table>
                    <button type="submit" class="btn btn-primary" onclick="return confirm('確定儲存？')">儲存設定</button>
                </div>
            </div>
        </div>
    </div>
    {{ Form::close() }}
</div>
@endsection

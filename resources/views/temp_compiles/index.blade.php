@extends('layouts.master')
@section('title','新生編班')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="form-group col-12">
            <h2>新生編班</h2>
            @include('layouts.module_nav')
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="">匯入新生</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">管理新生</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">臨時編班</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">正式編班</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">資料匯出</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-12">

        </div>
    </div>
</div>
@endsection

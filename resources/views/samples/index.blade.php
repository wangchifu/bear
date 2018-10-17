@extends('layouts.master')
@section('title','示範視圖')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="form-group col-12">
            <h2>示範視圖</h2>
            @include('layouts.module_nav')
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="">頁籤一</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">頁籤二</a>
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

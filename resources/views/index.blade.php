@extends('layouts.master')
@section('title','首頁')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="form-group col-md-12">
            <h2>歡迎光臨 {{ env('APP_NAME') }}</h2>
            <p>請由左側選單開始</p>
        </div>
    </div>
</div>
@endsection

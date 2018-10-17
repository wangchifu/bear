@extends('layouts.master')
@section('title','全部授權模組')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="form-group col-12">
            <h2>全部授權模組</h2>
            <div class="row">
                @foreach($power_modules as $k=>$v)
                    <div class="col-2">
                        <div>
                            <a href="{{ route($v['english_name'].'.index') }}"><img class="img-thumbnail" src="{{ asset('img/theme/'.$v['english_name'].'.svg') }}">
                            <br>
                            {{ $v['name'] }}</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

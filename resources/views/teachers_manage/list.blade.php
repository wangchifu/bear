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
                    <a class="nav-link" href="{{ route('teachers_manage.index') }}">基本任職資料</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('teachers_manage.list') }}">在職教師一覽表</a>
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
                        <div class="col-12">
                            <?php $last_title=""; ?>
                            <div class="row">
                                @foreach($user_data as $v)
                                    @if($last_title != $v['title_kind'])
                                        @if($v['title_kind'] != "校長")
                                            </div><hr><div class="row">
                                        @endif
                                        <h4 class="col-12 text-success">職別：{{ $v['title_kind'] }}</h4>
                                    @endif
                                    <div class="col-3">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>{{ $v['school_title'] }}</h5>
                                            </div>
                                            <div class="card-body">
                                                @if(empty($v['photo']))
                                                    <img class="align-self-start mr-3" src="{{ asset('img/user.svg') }}" alt="Generic placeholder image" width="100">
                                                @else
                                                    <img class="align-self-start mr-3" src="{{ url('img/teacher_photo&'.$v['photo']) }}" alt="Generic placeholder image" width="100">
                                                @endif
                                                <h6 class="mt-0">{{ $v['name'] }}({{ $v['username'] }})</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $last_title=$v['title_kind']; ?>
                                @endforeach
                            </div>

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

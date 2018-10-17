@extends('layouts.master')
@section('title','首頁')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="form-group col-12">
            <h2>{{ $folder->name }}</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    @foreach($path as $k=>$v)
                        @if($k==$folder->id)
                            <li class="breadcrumb-item active" aria-current="page">{{ $v }}</li>
                        @else
                            <li class="breadcrumb-item"><a href="{{ route('main',$k) }}">{{ $v }}</a></li>
                        @endif
                    @endforeach
                </ol>
            </nav>
            <div class="row">
                @foreach($folders as $folder)
                    @if(check_power('folder',$folder->id))
                        <div class="col-2">
                            <div>
                                <a href="{{ route('main',$folder->id) }}"><img class="img-thumbnail" src="{{ asset('img/theme/folder.svg') }}">
                                    <br>
                                    {{ $folder->name }}</a>
                            </div>
                        </div>
                    @endif
                @endforeach
                @foreach($modules as $module)
                    @if(check_power('module',$module->english_name))
                        <div class="col-2">
                            <div>
                                <a href="{{ route($module->english_name.'.index') }}"><img class="img-thumbnail" src="{{ asset('img/theme/'.$module->english_name.'.svg') }}">
                                <br>
                                {{ $module->name }}</a>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

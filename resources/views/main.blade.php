@extends('layouts.master')
@section('title','首頁')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="form-group col-12">
            <h2>{{ $folder->name }}</h2>
            <div class="row">
                @foreach($modules as $module)
                <div class="col-2">
                    @if($module->type=="folder")
                        <div class="card">
                            <div class="card-body">
                                <a href="{{ route('main',$module->id) }}"><img class="mr-3" src="{{ asset('img/theme/1/folder.svg') }}" alt="Generic placeholder image" width="100">
                                {{ $module->name }}</a>
                            </div>
                        </div>
                    @else
                        <div class="card">
                            <div class="card-body">
                                <a href="{{ route($module->english_name.'.index') }}"><img class="mr-3" src="{{ asset('img/theme/1/'.$module->english_name.'.svg') }}" alt="Generic placeholder image" width="100">
                                {{ $module->name }}</a>
                            </div>
                        </div>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

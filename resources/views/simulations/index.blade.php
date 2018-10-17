@extends('layouts.master')
@section('title','身分模擬')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="form-group col-12">
            <h2>身分模擬</h2>
            @include('layouts.module_nav')
        </div>
    </div>
    <div class="row">
        <div class="form-group col-12">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>
                        處室
                    </th>
                    <th>
                        職稱
                    </th>
                    <th>
                        教師姓名
                    </th>
                    <th>
                        教師代號
                    </th>
                    <th>
                        動作
                    </th>
                </tr>
                <tbody>
                @foreach($user_data as $k=>$v)
                <tr>
                    <td>
                        {{ $v['room'] }}
                    </td>
                    <td>
                        {{ $v['title'] }}
                    </td>
                    <td>
                        {{ $v['name'] }}
                    </td>
                    <td>
                        {{ $v['username'] }}
                    </td>
                    <td>
                        <a href="{{ route('simulation.impersonate',$v['id']) }}" class="btn btn-primary btn-sm" onclick="return confirm('確定？')">模擬身分</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
                </thead>
            </table>
        </div>
    </div>
</div>
@endsection

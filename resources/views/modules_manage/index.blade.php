@extends('layouts.master')
@section('title','模組權限管理')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="form-group col-12">
            <h2>模組權限管理</h2>
            @include('layouts.module_nav')
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('modules_manage.index') }}">模組管理</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('modules_manage.folder') }}">新增分類</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    @foreach($breadcrumb as $k=>$v)
                        @if($k==$folder_id)
                            <li class="breadcrumb-item active" aria-current="page">{{ $v }}</li>
                        @else
                            <li class="breadcrumb-item"><a href="{{ route('modules_manage.index',$k) }}">{{ $v }}</a></li>
                        @endif
                    @endforeach
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-6">
            <table class="table table-striped table-bordered col-6">
                <thead class="card-header">
                <tr>
                    <th>
                        順序
                    </th>
                    <th>
                        啟用
                    </th>
                    <th>
                        模組名稱
                    </th>
                    <th>
                        模組管理
                    </th>
                    <th>
                        變數調整
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($folders as $folder)
                <tr>
                    <td>
                        {{ $folder->order_by }}
                    </td>
                    <td>
                        @if($folder->active == "checked")
                            <i class="fas fa-check-circle text-success"></i>
                        @else
                            <i class="fas fa-times-circle text-danger"></i>
                        @endif
                    </td>
                    <td>
                        @if($folder->active == "checked")
                            <a href="{{ url('modules_manage/'.$folder->id) }}">{{ $folder->name }}</a>
                        @else
                            <a href="{{ url('modules_manage/'.$folder->id) }}" class="text-secondary">{{ $folder->name }}</a>
                        @endif
                    </td>
                    <td>
                        <a href="{{ url('modules_manage/'.$folder_id.'/'.$folder->id) }}">管理</a>
                    </td>
                    <td>

                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        @if(!empty($show_folder))
        <div class="col-6">
            {{ Form::open(['route'=>['modules_manage.folder_update',$show_folder->id],'method'=>'patch']) }}
            <div class="form-control">
                <table>
                    <tr>
                        <td>
                            <lable for="name">中文名稱</lable>
                        </td>
                        <td>
                            {{ Form::text('name',$show_folder->name,['id'=>'name','class' => 'form-control','required' => 'required']) }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <lable for="name">所屬分類</lable>
                        </td>
                        <td>
                            {{ Form::select('module_id',$folder_path,$folder_id,['id'=>'module_id','class' => 'form-control', 'required' => 'required']) }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="order_by">排序：</label>
                        </td>
                        <td>
                            {{ Form::text('order_by',$show_folder->order_by,['id'=>'order_by','class' => 'form-control', 'required' => 'required']) }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="Check1">啟用？</label>
                        </td>
                        <td>
                            <div class="form-group form-check">
                                <input type="checkbox" name="active" class="form-check-input" id="Check1" {{ $show_folder->active }}>
                                <label class="form-check-label" for="Check1">立即啟用</label>
                            </div>
                        </td>
                    </tr>
                </table>
                <lable for="name">模組授權</lable>
                <div class="row">
                    <div class="col-6">
                    {{ Form::select('type',$types,null,['id'=>'type','class' => 'form-control','onchange'=>'show_type(this);']) }}
                    </div>
                    <div id='room' class="col-6" style="display:none">
                    {{ Form::select('school_room_id',$school_rooms_select,null,['id'=>'school_room','class' => 'form-control']) }}
                    </div>
                    <div id='title' class="col-6" style="display:none">
                    {{ Form::select('school_title_id',$school_titles_select,null,['id'=>'school_title','class' => 'form-control']) }}
                    </div>
                    <div id='user' class="col-6" style="display:none">
                        {{ Form::select('user_id',$users_select,null,['id'=>'school_title','class' => 'form-control']) }}
                    </div>
                    <div class="col-6">
                        {{ Form::select('admin',$power_type,null,['id'=>'admin','class' => 'form-control']) }}
                    </div>
                </div>
                <hr>
                <button type="submit" class="btn btn-primary btn-sm" onclick="return confirm('確定嗎？')">儲存</button>
                <hr>
            </div>
            <input type="hidden" name="folder" value="{{ $show_folder->id }}">
            <input type="hidden" name="folder_id" value="{{ $folder_id }}">
            {{ Form::close() }}
            <hr>
            <h3>「{{ $show_folder->name }}」授權</h3>
            <div class="col-10">
                <table class="table table-bordered">
                    <thead class="bg-dark text-light">
                    <tr>
                        <th>
                            授權對象
                        </th>
                        <th>
                            授權種類
                        </th>
                        <th>
                            功能
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($power_data as $k=>$v)
                        <tr>
                            <td>
                                {{ $v['for'] }}
                            </td>
                            <td>
                                {{ $v['kind'] }}
                            </td>
                            <td>
                                <a href="#" onclick="if(confirm('確定刪除？')) $('#delete{{ $v['id'] }}').submit();else return false"><i class="fas fa-times-circle text-danger"></i> 刪除</a>
                            </td>
                        </tr>
                        {{ Form::open(['route'=>['modules_manage.power_delete',$v['id']],'method'=>'delete','id'=>'delete'.$v['id']]) }}
                        <input type="hidden" name="folder" value="{{ $show_folder->id }}">
                        <input type="hidden" name="folder_id" value="{{ $folder_id }}">
                        {{ Form::close() }}
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif
    </div>
</div>
<script>
    function show_type(G) {
        if(G.value == '0' || G.value == ''){
            $("#room").hide();
            $("#title").hide();
            $("#user").hide();
        }
        if(G.value == '1'){
            $("#room").show();
            $("#title").hide();
            $("#user").hide();
        }
        if(G.value == '2'){
            $("#room").hide();
            $("#title").show();
            $("#user").hide();
        }
        if(G.value == '3'){
            $("#room").hide();
            $("#title").hide();
            $("#user").show();
        }
    }
</script>
@endsection

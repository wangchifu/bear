@extends('layouts.master')
@section('title','管理新生')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="form-group col-12">
            <h2>管理新生</h2>
            @include('layouts.module_nav')
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('temp_compile.index') }}">匯入新生</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('temp_compile.manage',$this_year_seme) }}">管理新生</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">統計資訊</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">匯出編班檔</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">編班作業</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-12">
            <div class="row">
                <div class="col-6">
                    <select class="form-control" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                        <option value="">請選擇學年度</option>
                        @foreach($year_data as $k=>$v)
                            <?php $selected=($v==$select_year)?"selected":""; ?>
                            <option value="{{ url('temp_compile/'.$k.'/manage') }}" {{ $selected }}>{{ $v }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group col-12">
            <div class="row">
                <div class="col-12">
                    <h4>新生名單</h4>
                    <a href="{{ route('temp_compile.manage_create') }}" class="btn btn-success btn-sm"><i class="fas fa-plus-circle"></i> 增加一位</a>
                    <a href="{{ route('temp_compile.manage_all_destroy',$select_year) }}" class="btn btn-danger btn-sm" onclick="return confirm('確定刪除全部？')"><i class="fas fa-times-circle"></i> 全部刪除</a>
                    <table class="table table-striped table-bordered">
                        <thead class="bg-secondary">
                        <tr>
                            <th rowspan="2">
                                臨時編號
                            </th>
                            <th rowspan="2">
                                就讀狀態
                            </th>
                            <th>
                                學校名稱
                            </th>
                            <th>
                                姓名
                            </th>
                            <th>
                                性別
                            </th>
                            <th>
                                生日
                            </th>
                            <th>
                                家長姓名
                            </th>
                            <th>
                                電話
                            </th>
                            <th>
                                動作
                            </th>
                        </tr>
                        <tr>
                            <th>
                                國小班級
                            </th>
                            <th>
                                身分證字號
                            </th>
                            <th colspan="4">
                                戶籍住址<br>
                                通訊住址
                            </th>
                            <th>

                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($new_students as $new_student)
                            <tr>
                                <td rowspan="2">
                                    {{ $new_student->numbering }}
                                </td>
                                <td rowspan="2">
                                    @if($new_student->has_study=="0")
                                        <input type="radio" name="has_study" value="1" id="r1"> <label for="r1">就讀</label><br>
                                        <input type="radio" name="has_study" value="2" id="r2"> <label for="r2">特教班</label><br>
                                        <strong class="text-danger">不就讀</strong>
                                        {{ $new_student->reason }}
                                    @elseif($new_student->has_study=="1")
                                        <strong class="text-success">就讀</strong><br>
                                        <input type="radio" name="has_study" value="2" id="r2"> <label for="r2">特教班</label><br>
                                        <input type="radio" name="has_study" value="0" id="r3"> <label for="r3">不就讀</label>
                                    @elseif($new_student->has_study=="2")
                                        <input type="radio" name="has_study" value="1" id="r1"> <label for="r1">就讀</label><br>
                                        <strong class="text-info">特教班</strong><br>
                                        <input type="radio" name="has_study" value="0" id="r3"> <label for="r3">不就讀</label>
                                    @endif
                                </td>
                                <td>
                                    {{ $new_student->elementary_school }}
                                </td>
                                <td>
                                    {{ $new_student->name }}
                                </td>
                                <td>
                                    @if($new_student->sex==1)
                                        <img src="{{ asset('img/boy.png') }}"> <span class="text-primary">男</span>
                                    @elseif($new_student->sex==2)
                                        <img src="{{ asset('img/girl.png') }}"> <span class="text-danger">女</span>
                                    @endif
                                </td>
                                <td>
                                    {{ $new_student->birthday }}
                                </td>
                                <td>
                                    {{ $new_student->parent }}
                                </td>
                                <td>
                                    {{ $new_student->city_call }}<br>
                                    {{ $new_student->cell_number }}
                                </td>
                                <td>
                                    <a href="{{ route('temp_compile.manage_edit',$new_student->id) }}" class="btn btn-primary btn-sm">編輯</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    {{ $new_student->elementary_class }}
                                </td>
                                <td>
                                    {{ $new_student->person_id }}
                                </td>
                                <td colspan="4">
                                    {{ $new_student->residence_address }}
                                    @if(!empty($new_student->residence_date))
                                        ({{ $new_student->residence_date }})
                                    @endif
                                    <br>
                                    {{ $new_student->mailing_address }}
                                </td>
                                <td>
                                    <a href="{{ route('temp_compile.manage_destroy',$new_student->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('確定刪除 {{ $new_student->name }}?')">刪除</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $new_students->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

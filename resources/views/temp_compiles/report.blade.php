@extends('layouts.master')
@section('title','管理新生')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="form-group col-12">
            <h2>統計標注</h2>
            @include('layouts.module_nav')
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('temp_compile.index') }}">匯入新生</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('temp_compile.manage',$this_year_seme) }}">管理新生</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('temp_compile.report',$this_year_seme) }}">統計標註</a>
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
                <div class="form-group col-12">
                    <div class="row">
                        <div class="col-6">
                            <select class="form-control" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                                <option value="">請選擇學年度</option>
                                @foreach($year_data as $k=>$v)
                                    <?php $selected=($v==$select_year)?"selected":""; ?>
                                    <option value="{{ url('temp_compile/'.$k.'/report') }}" {{ $selected }}>{{ $v }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <h4>就讀學生名單列表</h4>
                    <table cellspacing='1' cellpadding='3' border="1">
                        <tr bgcolor='#cccccc'>
                            <th>
                                臨時編號
                            </th>
                            <th>
                                姓名
                            </th>
                            <th>
                                身分證字號
                            </th>
                            <th>
                                性別
                            </th>
                            <th>
                                特殊類別標註
                            </th>
                            <th>
                                另名雙胞胎編號
                            </th>
                        </tr>
                        <?php $people=0;$boy=0;$girl=0; ?>
                        @foreach($new_student1s as $new_student)
                            <?php $people++; ?>
                            <tr bgcolor='#ffffff' onMouseOver=this.style.backgroundColor='#FFCE3C'
                                onMouseOut=this.style.backgroundColor='#ffffff'>
                                <td>
                                    {{ $new_student->numbering }}
                                </td>
                                <td>
                                    {{ $new_student->name }}
                                </td>
                                <td>
                                    {{ $new_student->person_id }}
                                </td>
                                <td>
                                    @if($new_student->sex==1)
                                        <?php $boy++; ?>
                                        <img src="{{ asset('img/boy.png') }}"> <span class="text-primary">男</span>
                                    @elseif($new_student->sex==2)
                                        <?php $girl++; ?>
                                        <img src="{{ asset('img/girl.png') }}"> <span class="text-danger">女</span>
                                    @endif
                                </td>
                                <td>
                                    <select name="type">
                                        <option value="1">一般生</option>
                                        <option value="0">特教生</option>
                                        <option value="2">雙胞胎同班</option>
                                        <option value="3">雙胞胎不同班</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" name="another" size="10" maxlength="5">
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td>
                                合計
                            </td>
                            <td>
                                {{ $people }} 人
                            </td>
                            <td colspan="4">
                                男：{{ $boy }} 人 女：{{ $girl }} 人
                            </td>
                        </tr>
                    </table>
                    <br>
                    <button type="submit" class="btn btn-primary btn-sm">儲存</button>
                </div>
                <div class="col-6">
                    <h4>未就讀學生名單列表</h4>
                    <table cellspacing='1' cellpadding='3' border="1">
                        <tr bgcolor='#cccccc'>
                            <th>
                                臨時編號
                            </th>
                            <th>
                                姓名
                            </th>
                            <th>
                                身分證字號
                            </th>
                            <th>
                                性別
                            </th>
                            <th>
                                原因
                            </th>
                        </tr>
                        @foreach($new_student0s as $new_student)
                        <tr bgcolor='#ffffff' onMouseOver=this.style.backgroundColor='#FFCE3C'
                            onMouseOut=this.style.backgroundColor='#ffffff'>
                            <td>
                                {{ $new_student->numbering }}
                            </td>
                            <td>
                                {{ $new_student->name }}
                            </td>
                            <td>
                                {{ $new_student->person_id }}
                            </td>
                            <td>
                                @if($new_student->sex==1)
                                    <img src="{{ asset('img/boy.png') }}"> <span class="text-primary">男</span>
                                @elseif($new_student->sex==2)
                                    <img src="{{ asset('img/girl.png') }}"> <span class="text-danger">女</span>
                                @endif
                            </td>
                            <td>
                                <input type="text" name="reason" size="20">
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    <br>
                    <button type="submit" class="btn btn-primary btn-sm">儲存</button>
                    <hr>
                    <h4>特教班學生名單列表</h4>
                    <table cellspacing='1' cellpadding='3' border="1">
                        <tr bgcolor='#cccccc'>
                            <th>
                                臨時編號
                            </th>
                            <th>
                                姓名
                            </th>
                            <th>
                                身分證字號
                            </th>
                            <th>
                                性別
                            </th>
                        </tr>
                        @foreach($new_student2s as $new_student)
                            <tr bgcolor='#ffffff' onMouseOver=this.style.backgroundColor='#FFCE3C'
                                onMouseOut=this.style.backgroundColor='#ffffff'>
                                <td>
                                    {{ $new_student->numbering }}
                                </td>
                                <td>
                                    {{ $new_student->name }}
                                </td>
                                <td>
                                    {{ $new_student->person_id }}
                                </td>
                                <td>
                                    @if($new_student->sex==1)
                                        <img src="{{ asset('img/boy.png') }}"> <span class="text-primary">男</span>
                                    @elseif($new_student->sex==2)
                                        <img src="{{ asset('img/girl.png') }}"> <span class="text-danger">女</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

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
                    <a class="nav-link" href="{{ route('temp_compile.export',$this_year_seme) }}">匯出入編班檔</a>
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
                    {{ Form::open(['route'=>'temp_compile.change_type','method'=>'patch']) }}
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
                                另名雙胞胎
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
                                    <?php
                                    $selected0 = ($new_student->type ==0)?"selected":"";
                                    $selected1 = ($new_student->type ==1)?"selected":"";
                                    $selected2 = ($new_student->type ==2)?"selected":"";
                                    $selected3 = ($new_student->type ==3)?"selected":"";
                                    ?>
                                    <select name="type[{{ $new_student->id }}]">
                                        <option value="1" {{ $selected1 }}>一般生</option>
                                        <option value="0" {{ $selected0 }}>特教生</option>
                                        <option value="2" {{ $selected2 }}>雙胞胎同班</option>
                                        <option value="3" {{ $selected3 }}>雙胞胎不同班</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" name="another[{{ $new_student->id }}]" size="5" maxlength="5" value="{{ $new_student->another }}">
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
                    <button type="submit" class="btn btn-primary btn-sm" onclick="return confirm('確定嗎？')">儲存</button>
                    <input type="hidden" name="select_year" value="{{ $select_year }}">
                    {{ Form::close() }}
                </div>
                <div class="col-6">
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
                    <hr>
                    <h4>未就讀學生名單列表</h4>
                    {{ Form::open(['route'=>'temp_compile.key_reason','method'=>'patch']) }}
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
                                    <input type="text" name="reason[{{ $new_student->id }}]" size="20" value="{{ $new_student->reason }}">
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    <br>
                    <button type="submit" class="btn btn-primary btn-sm" onclick="return confirm('確定嗎？')">儲存</button>
                    <input type="hidden" name="select_year" value="{{ $select_year }}">
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

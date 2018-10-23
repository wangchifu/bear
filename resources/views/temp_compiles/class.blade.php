@extends('layouts.master')
@section('title','編班作業')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="form-group col-12">
            <h2>編班作業</h2>
            @include('layouts.module_nav')
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('temp_compile.index') }}">匯入新生</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('temp_compile.manage',$this_year_seme) }}">管理新生</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('temp_compile.report',$this_year_seme) }}">統計標註</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('temp_compile.export',$this_year_seme) }}">匯出入編班檔</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('temp_compile.class',$this_year_seme) }}">編班作業</a>
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
                    <h4>各編班學生名單</h4>
                    {{ Form::open(['route'=>'temp_compile.student_sn_set']) }}
                    <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('確定嗎？會覆寫喔！')"><i class="fas fa-list-ol"></i> 依一般班班序座號填入六碼學號</button>
                    <input type="hidden" name="select_year" value="{{ $select_year }}">
                    {{ Form::close() }}
                    <br>
                    本年度一般班級學生共：{{ count($new_students) }}人
                    @foreach($student_data as $k1=>$v1)
                        {{ Form::open(['route'=>'temp_compile.student_sn_change','method'=>'patch']) }}
                        <table cellspacing='1' cellpadding='3' border="1">
                            <tr bgcolor='#cccccc'>
                                <th>
                                    班級
                                </th>
                                <th>
                                    座號
                                </th>
                                <th>
                                    學號
                                </th>
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
                            <?php $boy=0;$girl=0; ?>
                            @foreach($v1 as $k2=>$v2)
                                <tr onMouseOver=this.style.backgroundColor='#FFCE3C'
                                    onMouseOut=this.style.backgroundColor='#ffffff'>
                                    <td>
                                        <input type="text" name="new_class[{{ $v2['id'] }}]" value="{{ $k1 }}" size="1" maxlength="2" required>
                                    </td>
                                    <td>
                                        <input type="text" name="new_num[{{ $v2['id'] }}]" value="{{ $k2 }}" size="1" maxlength="2" required>
                                    </td>
                                    <td>
                                        <input type="text" name="student_sn[{{ $v2['id'] }}]" value="{{ $v2['student_sn'] }}" size="3" maxlength="6" required>
                                    </td>
                                    <td>
                                        {{ $v2['numbering'] }}
                                    </td>
                                    <td>
                                        {{ $v2['name'] }}
                                    </td>
                                    <td>
                                        {{ $v2['person_id'] }}
                                    </td>
                                    <td>
                                        @if($v2['sex']==1)
                                            <?php $boy++; ?>
                                            <img src="{{ asset('img/boy.png') }}"> <span class="text-primary">男</span>
                                        @elseif($v2['sex']==2)
                                            <?php $girl++; ?>
                                            <img src="{{ asset('img/girl.png') }}"> <span class="text-danger">女</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        共：{{ $boy+$girl }}人 (男生：{{ $boy }}人；女生：{{ $girl }}人)
                        <br>
                        <button type="submit" class="btn btn-primary btn-sm" onclick="return confirm('確定嗎？')">儲存 {{ $k1 }} 班</button>
                        <input type="hidden" name="select_year" value="{{ $select_year }}">
                        {{ Form::close() }}
                        <hr>
                    @endforeach
                </div>
                <div class="col-6">
                    <h4>說明</h4>
                    <ol>
                        <li>
                            請先在左側按「一般班填入學號」。
                        </li>
                        <li>
                            必要時可修改相關資訊。
                        </li>
                        <li>
                            特教班學生請在下方表單填入學號後，按「儲存」。
                        </li>
                        <br>
                        {{ Form::open(['route'=>'temp_compile.student_sn_change','method'=>'patch']) }}
                        <table cellspacing='1' cellpadding='3' border="1">
                            <tr bgcolor='#cccccc'>
                                <th>
                                    班級
                                </th>
                                <th>
                                    學號
                                </th>
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
                            @foreach($special_students as $special_student)
                                <tr onMouseOver=this.style.backgroundColor='#FFCE3C'
                                    onMouseOut=this.style.backgroundColor='#ffffff'>
                                    <td>
                                        特教班
                                    </td>
                                    <td>
                                        <input type="text" name="student_sn[{{ $special_student->id }}]" value="{{ $special_student->student_sn }}" size="3" maxlength="6" required>
                                    </td>
                                    <td>
                                        {{ $special_student->numbering }}
                                    </td>
                                    <td>
                                        {{ $special_student->name }}
                                    </td>
                                    <td>
                                        {{ $special_student->person_id }}
                                    </td>
                                    <td>
                                        @if($special_student->sex==1)
                                            <img src="{{ asset('img/boy.png') }}"> <span class="text-primary">男</span>
                                        @elseif($special_student->sex==2)
                                            <img src="{{ asset('img/girl.png') }}"> <span class="text-danger">女</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        <br>
                        <button type="submit" class="btn btn-primary btn-sm" onclick="return confirm('確定嗎？')">儲存 特教班</button>
                        <input type="hidden" name="select_year" value="{{ $select_year }}">
                        <input type="hidden" name="new_class[{{ $special_student->id }}]" value="">
                        <input type="hidden" name="new_num[{{ $special_student->id }}]" value="">
                        {{ Form::close() }}
                        <br>
                        <li>
                            <strong>最後，檢查「一般班」、「特教班」學號是否都填入了？確認無誤後，按「寫入學籍表」。</strong>
                        </li>
                        <br>
                        <a href="" class="btn btn-danger btn-sm"><i class="fas fa-exclamation-circle"></i> 我確認無誤，請寫入學籍表！</a>
                    </ol>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

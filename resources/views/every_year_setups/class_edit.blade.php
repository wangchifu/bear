@extends('layouts.master')
@section('title','學期初設定')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="form-group col-12">
            <h2>學期初設定</h2>
            @include('layouts.module_nav')
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('every_year_setup.index') }}">開學日設定</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('every_year_setup.class_setup') }}">班級設定</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('every_year_setup.school_day') }}">上課日設定</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('every_year_setup.score_setup') }}">成績設定</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('every_year_setup.course_setup') }}">課程設定</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('every_year_setup.curriculum_setup') }}">課表設定</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('every_year_setup.teacher_setup') }}">設定導師</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-12">
            <h4>{{ substr($year_seme,0,3) }}學年第{{ substr($year_seme,3,1) }}學期 班級設定</h4>
            @if($action=="create")
                {{ Form::open(['route'=>'every_year_setup.class_store','method'=>'post']) }}
            @elseif($action=="edit")
                {{ Form::open(['route'=>'every_year_setup.class_update','method'=>'post']) }}
            @endif
            <table class="table table-striped">
                <thead>
                <tr bgcolor="#cccccc">
                    <th>
                        學校年級
                    </th>
                    <th>
                        班級數
                    </th>
                    <th>
                        名稱種類
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        一年級
                    </td>
                    <td>
                        共 <input type="text" name="grade[1]" value="{{ $grade[1] }}" size="2" maxlength="2" required> 班
                    </td>
                    <td>
                        <?php
                        $selected1 = ($class_type[1]==1)?"selected":"";
                        $selected2 = ($class_type[1]==2)?"selected":"";
                        $selected3 = ($class_type[1]==3)?"selected":"";
                        ?>
                        <select name="class_type[1]" required>
                            <option></option>
                            <option value="1" {{ $selected1 }}>一、二、三</option>
                            <option value="2" {{ $selected2 }}>甲、乙、丙</option>
                            <option value="3" {{ $selected3 }}>忠、孝、仁</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        二年級
                    </td>
                    <td>
                        共 <input type="text" name="grade[2]" value="{{ $grade[2] }}" size="2" maxlength="2" required> 班
                    </td>
                    <td>
                        <?php
                        $selected1 = ($class_type[2]==1)?"selected":"";
                        $selected2 = ($class_type[2]==2)?"selected":"";
                        $selected3 = ($class_type[2]==3)?"selected":"";
                        ?>
                        <select name="class_type[2]" required>
                            <option></option>
                            <option value="1" {{ $selected1 }}>一、二、三</option>
                            <option value="2" {{ $selected2 }}>甲、乙、丙</option>
                            <option value="3" {{ $selected3 }}>忠、孝、仁</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        三年級
                    </td>
                    <td>
                        共 <input type="text" name="grade[3]" value="{{ $grade[3] }}" size="2" maxlength="2" required> 班
                    </td>
                    <td>
                        <?php
                        $selected1 = ($class_type[3]==1)?"selected":"";
                        $selected2 = ($class_type[3]==2)?"selected":"";
                        $selected3 = ($class_type[3]==3)?"selected":"";
                        ?>
                        <select name="class_type[3]" required>
                            <option></option>
                            <option value="1" {{ $selected1 }}>一、二、三</option>
                            <option value="2" {{ $selected2 }}>甲、乙、丙</option>
                            <option value="3" {{ $selected3 }}>忠、孝、仁</option>
                        </select>
                    </td>
                </tr>
                @if(env('IS_JHORES')==0)
                <tr>
                    <td>
                        國小四年級
                    </td>
                    <td>
                        共 <input type="text" name="grade[4]" value="{{ $grade[4] }}" size="2" maxlength="2" required> 班
                    </td>
                    <td>
                        <?php
                        $selected1 = ($class_type[4]==1)?"selected":"";
                        $selected2 = ($class_type[4]==2)?"selected":"";
                        $selected3 = ($class_type[4]==3)?"selected":"";
                        ?>
                        <select name="class_type[4]" required>
                            <option></option>
                            <option value="1" {{ $selected1 }}>一、二、三</option>
                            <option value="2" {{ $selected2 }}>甲、乙、丙</option>
                            <option value="3" {{ $selected3 }}>忠、孝、仁</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        國小五年級
                    </td>
                    <td>
                        共 <input type="text" name="grade[5]" value="{{ $grade[5] }}" size="2" maxlength="2" required> 班
                    </td>
                    <td>
                        <?php
                        $selected1 = ($class_type[5]==1)?"selected":"";
                        $selected2 = ($class_type[5]==2)?"selected":"";
                        $selected3 = ($class_type[5]==3)?"selected":"";
                        ?>
                        <select name="class_type[5]" required>
                            <option></option>
                            <option value="1" {{ $selected1 }}>一、二、三</option>
                            <option value="2" {{ $selected2 }}>甲、乙、丙</option>
                            <option value="3" {{ $selected3 }}>忠、孝、仁</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        國小六年級
                    </td>
                    <td>
                        共 <input type="text" name="grade[6]" value="{{ $grade[6] }}" size="2" maxlength="2" required> 班
                    </td>
                    <td>
                        <?php
                        $selected1 = ($class_type[6]==1)?"selected":"";
                        $selected2 = ($class_type[6]==2)?"selected":"";
                        $selected3 = ($class_type[6]==3)?"selected":"";
                        ?>
                        <select name="class_type[6]" required>
                            <option></option>
                            <option value="1" {{ $selected1 }}>一、二、三</option>
                            <option value="2" {{ $selected2 }}>甲、乙、丙</option>
                            <option value="3" {{ $selected3 }}>忠、孝、仁</option>
                        </select>
                    </td>
                </tr>
                @endif
                <tr>
                    <td>
                        <strong class="text-danger">特教班</strong>
                    </td>
                    <td>
                        共 <input type="text" name="special" value="{{ $special }}" size="2" maxlength="2" required> 班
                    </td>
                    <td>

                    </td>
                </tr>
                </tbody>
            </table>
            <br>
            <input type="hidden" name="year_seme" value="{{ $year_seme }}">
            <a href="{{ route('every_year_setup.class_setup') }}" class="btn btn-secondary btn-sm">返回</a>
            <button type="submit" class="btn btn-primary btn-sm" onclick="return confirm('確定？')">儲存</button>
            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection

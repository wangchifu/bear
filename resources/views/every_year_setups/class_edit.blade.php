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
            <h4>班級設定</h4>
            <form action="index.php">
            {!! get_seme_menu() !!} <button type="submit">切換學期</button>
            </form>
            @if($action=="create")
            {{ Form::open(['route'=>'every_year_setup.class_store','method'=>'post']) }}
            @elseif($action=="edit")

            @endif
            <table cellspacing='1' cellpadding='3' border="1">
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
                @if(env('IS_JHORES')==0)
                <tr>
                    <td>
                        國小一年級
                    </td>
                    <td>
                        共 <input type="text" name="grade1" size="2" maxlength="2" required> 班
                    </td>
                    <td>
                        <select name="class_type" required>
                            <option></option>
                            <option value="1">一、二、三</option>
                            <option value="2">甲、乙、丙</option>
                            <option value="3">忠、孝、仁</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        國小二年級
                    </td>
                    <td>
                        共 <input type="text" name="grade2" size="2" maxlength="2"> 班
                    </td>
                    <td>
                        <select name="class_type" required>
                            <option></option>
                            <option value="1">一、二、三</option>
                            <option value="2">甲、乙、丙</option>
                            <option value="3">忠、孝、仁</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        國小三年級
                    </td>
                    <td>
                        共 <input type="text" name="grade3" size="2" maxlength="2"> 班
                    </td>
                    <td>
                        <select name="class_type" required>
                            <option></option>
                            <option value="1">一、二、三</option>
                            <option value="2">甲、乙、丙</option>
                            <option value="3">忠、孝、仁</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        國小四年級
                    </td>
                    <td>
                        共 <input type="text" name="grade4" size="2" maxlength="2"> 班
                    </td>
                    <td>
                        <select name="class_type" required>
                            <option></option>
                            <option value="1">一、二、三</option>
                            <option value="2">甲、乙、丙</option>
                            <option value="3">忠、孝、仁</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        國小五年級
                    </td>
                    <td>
                        共 <input type="text" name="grade5" size="2" maxlength="2"> 班
                    </td>
                    <td>
                        <select name="class_type" required>
                            <option></option>
                            <option value="1">一、二、三</option>
                            <option value="2">甲、乙、丙</option>
                            <option value="3">忠、孝、仁</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        國小六年級
                    </td>
                    <td>
                        共 <input type="text" name="grade6" size="2" maxlength="2"> 班
                    </td>
                    <td>
                        <select name="class_type" required>
                            <option></option>
                            <option value="1">一、二、三</option>
                            <option value="2">甲、乙、丙</option>
                            <option value="3">忠、孝、仁</option>
                        </select>
                    </td>
                </tr>
                @elseif(env('IS_JHORES')==1)
                    <tr>
                        <td>
                            國中一年級
                        </td>
                        <td>
                            共 <input type="text" name="grade1" size="2" maxlength="2"> 班
                        </td>
                        <td>
                            <select name="class_type" required>
                                <option></option>
                                <option value="1">一、二、三</option>
                                <option value="2">甲、乙、丙</option>
                                <option value="3">忠、孝、仁</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            國中二年級
                        </td>
                        <td>
                            共 <input type="text" name="grade2" size="2" maxlength="2"> 班
                        </td>
                        <td>
                            <select name="class_type" required>
                                <option></option>
                                <option value="1">一、二、三</option>
                                <option value="2">甲、乙、丙</option>
                                <option value="3">忠、孝、仁</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            國中三年級
                        </td>
                        <td>
                            共 <input type="text" name="grade3" size="2" maxlength="2"> 班
                        </td>
                        <td>
                            <select name="class_type" required>
                                <option></option>
                                <option value="1">一、二、三</option>
                                <option value="2">甲、乙、丙</option>
                                <option value="3">忠、孝、仁</option>
                            </select>
                        </td>
                    </tr>
                @endif
                </tbody>
            </table>
            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection

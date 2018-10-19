<table class="table table-striped table-bordered">
    <tr>
        <td rowspan="2">
            <label for="year">學年度</label>
            {{ Form::text('year',null,['id'=>'year','class'=>'form-control','required'=>'required']) }}
            <br>
            <label for="numbering">臨時編號</label>
            {{ Form::text('numbering',null,['id'=>'numbering','class'=>'form-control','placeholder'=>'如：A0001','required'=>'required']) }}
        </td>
        <td>
            <label for="elementary_school">學校名稱</label>
            {{ Form::text('elementary_school',null,['id'=>'elementary_school','class'=>'form-control']) }}
        </td>
        <td>
            <label for="name">姓名</label>
            {{ Form::text('name',null,['id'=>'name','class'=>'form-control','required'=>'required']) }}
        </td>
        <td width="90">
            <label for="sex">性別</label>
            <?php $sex = ['1'=>'男','2'=>'女']; ?>
            {{ Form::select('sex',$sex,null,['class'=>'form-control']) }}
        </td>
        <td>
            <label for="birthday">生日</label>
            {{ Form::text('birthday',null,['id'=>'birthday','class'=>'form-control']) }}
        </td>
        <td>
            <label for="parent">家長</label>
            {{ Form::text('parent',null,['id'=>'parent','class'=>'form-control']) }}
        </td>
        <td>
            <label for="city_call">市話</label>
            {{ Form::text('city_call',null,['id'=>'city_call','class'=>'form-control']) }}
        </td>
    </tr>
    <tr>
        <td>
            <label for="elementary_class">國小班級</label>
            {{ Form::text('elementary_class',null,['id'=>'elementary_class','class'=>'form-control']) }}
        </td>
        <td>
            <label for="person_id">身份證字號</label>
            {{ Form::text('person_id',null,['id'=>'person_id','class'=>'form-control','onchange'=>'check_id()']) }}
        </td>
        <td colspan="3">
            <label for="residence_address">戶籍地址</label>
            {{ Form::text('residence_address',null,['id'=>'residence_address','class'=>'form-control']) }}
            <br>
            <label for="residence_date">戶籍遷入日期</label>
            {{ Form::text('residence_date',null,['id'=>'residence_date','class'=>'form-control']) }}
            <br>
            <label for="mailing_address">通訊地址</label>
            {{ Form::text('mailing_address',null,['id'=>'mailing_address','class'=>'form-control']) }}
        </td>
        <td>
            <label for="cell_number">手機</label>
            {{ Form::text('cell_number',null,['id'=>'cell_number','class'=>'form-control']) }}
        </td>
    </tr>
</table>
<script>
    function check_id(){
        $.ajax({
            type: "POST",
            url: "{{ route('temp_compile.check_id') }}",
            dataType: 'json',
            data: $("#new_student").serialize(),

            error: function (result) {
                alert("連接失敗");
                $('#person_id').val('');
                $('#person_id').focus();
            },
            success: function (result) {
                if (result == 'success') {


                } else {
                    alert("此身分證號已被使用");
                    $('#person_id').val('');
                    $('#person_id').focus();

                }
            }
        });
    }
</script>

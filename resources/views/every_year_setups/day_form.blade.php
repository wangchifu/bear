<table class="table table-striped">
    <tr>
        <td colspan="2">
            <div class="form-group">
                <label for="year_seme">學年學期 (格式 1071 代表107學年第1學期)</label>
                {{ Form::text('year_seme',null,['class'=>'form-control','required'=>'required','maxlength'=>'4']) }}
            </div>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            日期格式如 2017-08-01
        </td>
    </tr>
    <tr>
        <td>
            <div class="form-group">
                <label for="year_seme">請填入「學期開始日期」</label>
                {{ Form::text('seme_start_date',null,['class'=>'form-control','required'=>'required','maxlength'=>'10']) }}
            </div>
        </td>
        <td>
            <div class="form-group">
                <label for="year_seme">請填入「學期結束日期」</label>
                {{ Form::text('seme_stop_date',null,['class'=>'form-control','required'=>'required','maxlength'=>'10']) }}
            </div>
        </td>
    </tr>
    <tr>
        <td>
            <div class="form-group">
                <label for="year_seme">請填入「開學日」</label>
                {{ Form::text('start_date',null,['class'=>'form-control','required'=>'required','maxlength'=>'10']) }}
            </div>
        </td>
        <td>
            <div class="form-group">
                <label for="year_seme">請填入「結業日」</label>
                {{ Form::text('stop_date',null,['class'=>'form-control','required'=>'required','maxlength'=>'10']) }}
            </div>
        </td>
    </tr>
</table>

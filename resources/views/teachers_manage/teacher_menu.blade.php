<div class="card">
    {{ Form::open(['route'=>'teachers_manage.index','method'=>'post','id'=>'change']) }}
    <div class="card-header">
        {{ Form::select('condition',$condition_select,$condition,['class'=>'form-control','onchange'=>"$('#change').submit()"]) }}
    </div>
    {{ Form::close() }}
    {{ Form::open(['route'=>'teachers_manage.edit','method'=>'post','id'=>'show_one']) }}
    <div class="card-body">
        {{ Form::select('user_id',$user_select,null,['size'=>'16','class'=>'form-control','onchange'=>"$('#show_one').submit()"]) }}
    </div>
    <input type="hidden" name="condition" value="{{ $condition }}">
    {{ Form::close() }}
    <div class="card-footer">
        <a href="{{ route('teachers_manage.create') }}" class="btn btn-success btn-sm">新增教師</a>
    </div>
</div>
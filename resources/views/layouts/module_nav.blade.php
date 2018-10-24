<?php
$this_module = explode('/',$_SERVER['REQUEST_URI']);
$module_name = explode('?',$this_module[1]);
$folder = \App\Module::where('english_name',$module_name[0])->first();
$father_folder_id = $folder->module_id;
$path[$folder->id] = $folder->name;
while($father_folder_id != "0"){
    $father_folder = \App\Module::where('id',$father_folder_id)->first();
    $path[$father_folder->id] = $father_folder->name;
    $father_folder_id = $father_folder->module_id;
}
//倒序array，並保留key值
$path = array_reverse($path,true);
?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        @foreach($path as $k=>$v)
            @if($k==$folder->id)
                <li class="breadcrumb-item active" aria-current="page">{{ $v }}</li>
            @else
                <li class="breadcrumb-item"><a href="{{ route('main',$k) }}">{{ $v }}</a></li>
            @endif
        @endforeach
    </ol>
</nav>

<?php
///////////////////2.檔案管理///////////////////////////////

//顯示某目錄下的所有的檔案
if (! function_exists('get_folders_files')) {
    function get_folders_files($folder){
        $folders_files = [];
        $i=0;
        $k=0;
        if (is_dir($folder)) {
            if ($handle = opendir($folder)) { //開啟現在的資料夾
                while (false !== ($name = readdir($handle))) {
                    //避免搜尋到的資料夾名稱是false,像是0
                    if ($name != "." && $name != "..") {
                        //去除掉..跟.
                        if(is_dir($folder."/".$name)){
                            $folders_files['folders'][$i] = $name;
                            $i++;
                        }else{
                            $folders_files['files'][$k] = $name;
                            $k++;
                        }
                    }
                }
                closedir($handle);
            }
        }
        return $folders_files;
    }
}

//刪除某目錄下的任何東西
if (! function_exists('delete_dir')) {
    function delete_dir($dir)
    {
        if (!file_exists($dir))
        {
            return true;
        }

        if (!is_dir($dir) || is_link($dir))
        {
            return unlink($dir);
        }

        foreach (scandir($dir) as $item)
        {
            if ($item == '.' || $item == '..')
            {
                continue;
            }

            if (!delete_dir($dir . "/" . $item))
            {
                chmod($dir . "/" . $item, 0777);

                if (!delete_dir($dir . "/" . $item))
                {
                    return false;
                }
            }
        }

        return rmdir($dir);
    }
}

//轉為kb
if(! function_exists('filesizekb')) {
    function filesizekb($file)
    {
        return number_format(filesize($file) / pow(1024, 1), 2, '.', '');
    }
}
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

//讀取csv檔
if(! function_exists('__fgetcsv')){
    /**
     * fgetcsv
     *
     * 修正原生fgetcsv讀取中文函式
     *
     * @param CSV文件檔案
     * @param length 每一行所讀取的最大資料長度
     * @param d 資料分隔符號(預設為逗號)
     * @param e 字串包含符號(預設為雙引號)
     * @return $_csv_data
     */
    function __fgetcsv(&$handle, $length = null, $d = ",", $e = '"') {
        $d = preg_quote($d);
        $e = preg_quote($e);
        $_line = "";
        $eof=false;
        while ($eof != true) {
            $_line .= (empty ($length) ? fgets($handle) : fgets($handle, $length));
            $itemcnt = preg_match_all('/' . $e . '/', $_line, $dummy);
            if ($itemcnt % 2 == 0){
                $eof = true;
            }
        }

        $_csv_line = preg_replace('/(?: |[ ])?$/', $d, trim($_line));

        $_csv_pattern = '/(' . $e . '[^' . $e . ']*(?:' . $e . $e . '[^' . $e . ']*)*' . $e . '|[^' . $d . ']*)' . $d . '/';
        preg_match_all($_csv_pattern, $_csv_line, $_csv_matches);
        $_csv_data = $_csv_matches[1];

        for ($_csv_i = 0; $_csv_i < count($_csv_data); $_csv_i++) {
            $_csv_data[$_csv_i] = preg_replace("/^" . $e . "(.*)" . $e . "$/s", "$1", $_csv_data[$_csv_i]);
            $_csv_data[$_csv_i] = str_replace($e . $e, $e, $_csv_data[$_csv_i]);
        }

        return empty ($_line) ? false : $_csv_data;
    }
}

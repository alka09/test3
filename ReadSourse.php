<?php


class ReadSourse
{
    function filelist($dir, $array_ext)
    {

        function GetDirFilesR($dir)
        {
            $dir_iterator = new RecursiveDirectoryIterator($dir);
            $iterator = new RecursiveIteratorIterator($dir_iterator, RecursiveIteratorIterator::SELF_FIRST);
            return $iterator;
        }


        $scaner = GetDirFilesR($dir);
        foreach ($scaner as $v) {

            if ($v->isFile()) {
                $ext = $v->getExtension();
                if (in_array($ext, $array_ext)) {
                    if(!file_exists($v . '.pdf')) {
                        $fp = fopen($v . 'pdf', 'w');
                        fwrite($fp, $v);
                        fclose($fp);
                    }
                    echo "Директория: " . $dir  . "<br>";
                    echo "Найден файл по пути " . $v . "<br>";
//                $fs = "|" . filesize($v);
                    echo "Создан новый файл " . $v . '.' . 'pdf' . "<br>";
                    //            echo $v . $fs . $separator;
                }
            }
        }

    }

}
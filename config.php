<?php

require_once 'ReadSourse.php';

$reader = new ReadSourse();

$dir = 'test';
$array_ext = ['php', 'html', 'js'];
echo $reader->filelist($dir, $array_ext);
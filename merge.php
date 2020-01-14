<?php

header('Access-Control-Allow-Origin:*');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

// mkfile.php
$filename = $_POST['name'];
$chunks = $_POST['chunks'];
$basename = pathinfo($filename, PATHINFO_FILENAME);
for($i = 0; $i < $chunks; $i++){
    $file = './tmp/'.$basename.'/'.$i; // 读取单个切块
    $content = file_get_contents($file);
    unlink($file);
    if(!file_exists($filename)){
        $fd = fopen($filename, "w+");
    }else{
        $fd = fopen($filename, "a");
    }
    fwrite($fd, $content);
}
echo $filename;
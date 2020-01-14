<?php

header('Access-Control-Allow-Origin:*');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

$file = $_FILES['file'];
$filename = $file['name'];
$index = $_POST['index'];
$baseName = pathinfo($filename, PATHINFO_FILENAME);
$dirname = './tmp/'.$baseName;
if (is_dir($dirname)) {
    if ($index === 0) {
        print_r(glob($dirname.'/*'));
        array_map('unlink', glob($dirname.'/*'));
    }
} else if (!is_dir($dirname)) {
    mkdir($dirname, 0777, true);
}
$filename = $dirname.'/'.$index;
move_uploaded_file($_FILES['file']['tmp_name'], $filename);
echo 'success';
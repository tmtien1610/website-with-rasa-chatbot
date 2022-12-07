<?php
function copy_dir($src, $dst)
{
    $dir = opendir($src);
    @mkdir($dst);
    while ($file = readdir($dir)) {
        if (($file != '.') && ($file != '..')) {
            if (is_dir($src . '/' . $file)) {
                copy_dir($src . '/' . $file, $dst . '/' . $file);
            } else {
                copy($src . '/' . $file, $dst . '/' . $file);
            }
        }
    }
    closedir($dir);
}

function create_view($name, $content)
{
    $dir_name = '../../view/' . $name;
    copy_dir('../../view/example', $dir_name);
    $content_file = fopen($dir_name . '/content.html', "w");
    fwrite($content_file, $content);
    fclose($content_file);
}

function delete_view($dir)
{
    if (is_dir($dir)) {
        $objects = scandir($dir);
        foreach ($objects as $object) {
            if ($object != "." && $object != "..") {
                if (is_dir($dir . DIRECTORY_SEPARATOR . $object) && !is_link($dir . "/" . $object)) {
                    delete_view($dir . DIRECTORY_SEPARATOR . $object);
                } else {
                    unlink($dir . DIRECTORY_SEPARATOR . $object);
                }
            }
        }
        rmdir($dir);
    }
}

function file_handling($name)
{
    $target_dir = "../../assets/uploads/";
    $target_file = $target_dir . trim(basename($_FILES[$name]["name"]), ' ');
    if (!file_exists($target_file)) {
        move_uploaded_file($_FILES[$name]["tmp_name"], $target_file);
    }
}

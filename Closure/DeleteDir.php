<?php
/**
 * 删除文件夹下的子文件夹以及文件.
 *
 * @author joe.scyll.gmail.com.
 *
 * @source php.net.
 */

$deleteDirectory = null;
$deleteDirectory = function($path) use ($deleteDirectory) {
    $resoure = opendir($path);
    while (($item = readdir($resource)) !== false) {
        $filePath = $path . '/'. $item;
        if ($item !== '.' && $item !== '..') {
            $deleteDirectory($filePath);
        } else {
            unlink($filePath);
        }
    }
    closedir($resource);
    rmdir($path);
};


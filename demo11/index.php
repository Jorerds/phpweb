<?php
date_default_timezone_set('Asia/Shanghai');
/*
 * is_file()判断是否是一个文件
 * is_dir() 判断是否是一个目录
 * file_exists()判断文件或目录是否存在
 * filesize()判断取得普通文件的大小(字节)
 * is_readable()判断指定文件名是否可读
 * is_writable()判断指定文件名是否可写
 * filectime()获取文件的创建时间
 * filemtime()获取文件的修改时间
 * stat()获取文件大部分属性值
 */
    var_dump(is_file('index.php'));
    var_dump(is_dir('inde.php'));
    var_dump(file_exists('../demo7_1'));
    var_dump(filesize('../demo7_1/index.php'));
    var_dump(is_readable('index.php'));
    var_dump(is_writable('index.php'));
    echo date('Y-m-d G:i:s',filectime('index.php')).'<br />';
    echo date('Y-m-d G:i:s',filemtime('index.php')).'<br />';
    var_dump(stat('index.php'));

<?php 
header('Content-type:text/html;charset=utf-8');
    /*
     * fopen()打开文件或者URL
     * fread()读取文件
     * fgets()从文件指针中读取一行
     * feof()测试文件指针是否到了文件结束位置
     * fwrite()写入文件（可安全用于二进制文件）
     * fseek()在文件指针中定位
     * rewind()倒回文件指针位置
     * flock()轻便的咨询文件锁定
     * ftruncate()将文件截断到给定的长度
     * fclose()关闭一个已打开的文件指针
     * file()把整个文件读入一个数组中
     * copy()拷贝文件
     * unlink()删除文件
     * file_get_contents()将整个文件读入一个字符串
     * file_put_contents()将字符串写入文件中
     * rename() 重命名一个文件或目录
     * eadfile()读入一个文件并写入到输出缓冲
     */

    $file=fopen('test.txt', 'r');
    //var_dump(fread($file, 6));
    //var_dump(fgets($file));
    //var_dump(feof($file));
    if ($file) {
        while (($file2=fgets($file))!= false){
            var_dump($file2);
       }
        var_dump(feof($file));
    }
    


?>
<?php 
/*
 * basename()返回路径中的文件名部分
 * dirname()返回路径中的目录部分
 * pathinfo()返回文件路径的信息
 * opendir()打开目录句柄
 * readdir()从目录句柄中读取条目
 * rewinddir()返回目录句柄
 * closedir()关闭目录句柄
 * mkdir()新建目录
 * rmdir()删除指定空目录
 *scandir()列出指定路径中的文件和目录
 */
    
    echo basename(__FILE__).'<br />';
    echo dirname(__FILE__).'<br />';
    var_dump(pathinfo(__FILE__));
    $dir=opendir('../demo11');

   /* for($i=0;$i<6;$i++){
        if ($i>=3){
            rewinddir($dir);
        }
    var_dump(readdir($dir));
    
    } */
    
        /* 这是正确地遍历目录方法 */
        while (false !== ($file = readdir($dir))) {
            //echo "$file\n"; 
            var_dump($file);
        }
       var_dump(scandir('../demo11'));
?>
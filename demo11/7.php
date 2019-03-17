<?php 
    /*
     * finfo_open()创建一个 fileinfo 资源
     * finfo_file() 返回一个文件的信息
     * finfo_close() 关闭fileinfo资源 
     */
   if (!function_exists('finfo_open')) {
        header('Content-type:text/html;charset=utf-8');
        exit('请开启PHP扩展:fileinfo!');
    } 
    $file='../demo11/uploads/a.zip';
    $fin=finfo_open(FILEINFO_MIME_TYPE); //创建一个 fileinfo 资源 FILEINFO_MIME_TYPE：返回 mime 类型
    $Finfo_Type=finfo_file($fin, $file); //返回指定文件的mime类型
    finfo_close($fin); //释放资源句柄
    header('Content-type:'.$Finfo_Type); //指定的文件mime类型的头部信息
    header('Content-Disposition:attachement;filename='.basename($file));//指定下载文件的描述
    header('Content-Length:'.filesize($file)); //指定文件的大小
    readfile($file);
    
    

?>
<?php
        header('Content-type:text/html;charset=utf-8');
            //连接mysql数据库 @符号为去除PHP的报错提示
            $link=@mysqli_connect('localhost','root','','test',3306);
            //连接的错误提示
            if (mysqli_connect_errno()){
                exit(mysqli_connect_error());
            }
            //设置默认的字符编码
            mysqli_set_charset($link,'utf8');
            //切换数据库，如果没有特殊需求在mysqli_connect选择操作数据库就可以了
            //mysqli_select_db($link,'test');
            /*关闭数据库连接*/
            mysqli_close($link);
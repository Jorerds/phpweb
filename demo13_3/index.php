<?php
    header('Content-type:text/html;charset=utf-8');

    $link=mysqli_connect('localhost','root','','test',3306);

    if (mysqli_connect_errno()){
        exit(mysqli_connect_error());
    }

    mysqli_set_charset($link,'utf8');



    //可以一次运行多条SQL语句 多条SQL语句用 ; 隔开

    $query='SELECT * FROM xuesheng; INSERT INTO xuesheng(usr_name,xuehao,sex) VALUES("老王","78号","男")';
    mysqli_multi_query($link,$query);


    mysqli_close($link);

?>
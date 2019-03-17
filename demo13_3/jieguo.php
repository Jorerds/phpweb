<?php
    header('Content-type:text/html;charset=utf-8');
    $link=mysqli_connect('localhost','root','','test',3306);
    if (mysqli_connect_error()){
        mysqli_connect_errno();
    }
    mysqli_set_charset($link,'utf8');

/*
//从一个prepared语句返回结果集元数据，配合相关函数，可以用来获得字段信息
    $qure='SELECT * FROM xuesheng WHERE  id=? or id=?';
    $stmt=mysqli_prepare($link,$qure);
    mysqli_stmt_bind_param($stmt,'ii',$val1,$val2);

    $val1=1;
    $val2=10;
    if (mysqli_stmt_execute($stmt)){
        $result=mysqli_stmt_result_metadata($stmt);
        var_dump(mysqli_fetch_field($result));
        var_dump(mysqli_fetch_field($result));
    }
*/

//返回一个结果集中的函数 mysqli_stmt_store_result需要这个函数
    $qure='SELECT * FROM xuesheng WHERE id>?';
    $stmt=mysqli_prepare($link,$qure);
    mysqli_stmt_bind_param($stmt,'i',$val1);

    $val1=5;
    if (mysqli_stmt_execute($stmt)){
        mysqli_stmt_store_result($stmt);
        var_dump(mysqli_stmt_num_rows($stmt));

    }
        //释放给指定语句预处理存储的结果集所占的内存
        mysqli_stmt_free_result($stmt);

        //关闭prepare预处理语句(关闭后后面就不能继续调用这个预处理语句了)
        mysqli_stmt_close($stmt);




    mysqli_close($link);

    ?>
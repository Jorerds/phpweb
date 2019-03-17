<?php
    header('Content-type:text/html;charset=utf-8');
    $link=mysqli_connect('localhost','root','','test',3306);
    if (mysqli_connect_error()){
        exit(mysqli_connect_errno());
    }
    mysqli_set_charset($link,'utf8');
    /*预处理语句*/
    //准备mysql语句 在准备的mysql语句中将会发生改变的参数用 ? 来表示
    $qure='INSERT INTO xuesheng(usr_name,xuehao,sex) VALUES (?,?,?)';
    //准备执行sql语句
    $smt=mysqli_prepare($link,$qure);

    //为可变参数? 绑定变量
    mysqli_stmt_bind_param($smt,'sss',$var1,$var2,$var3);



            $var1='老耿';
            $var2='88号';
            $var3='男';
            var_dump(mysqli_stmt_execute($smt));

            $var1='特色是';
            $var2='8号';
            $var3='女';
            var_dump(mysqli_stmt_execute($smt));





mysqli_close($link);
?>

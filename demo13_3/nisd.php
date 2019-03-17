<?php
    header('Content-type:text/html;charset=utf-8');
    $link=mysqli_connect('localhost','root','','test',3306);
    if (mysqli_connect_error()){
        mysqli_connect_errno();
    }

    mysqli_set_charset($link,'utf8');

    $qur='SELECT * FROM xuesheng WHERE id=?';
    $stmt=mysqli_prepare($link,$qur);
    //
    mysqli_stmt_bind_param($stmt,'i',$_POST['chaozhao']);

    if (isset($_POST['submit'])) {
        if ($_POST['chaozhao'] != '') {
            if (mysqli_stmt_execute($stmt)) {
                //注意这里变量赋值需要与SQL语句上面操作的字段等同
                mysqli_stmt_bind_result($stmt, $id, $usr_name, $xuehao, $sex);
                while (mysqli_stmt_fetch($stmt)) {
                    echo "{$id}-{$usr_name}-{$xuehao}-{$sex}<br />";
                }
            }
        }
    }
    mysqli_close($link);
    ?>

<!DOCTYPE html>
<html>
<head> 
    <meta charset="utf-8"> 
    <title>留言提交</title> 
</head>
<body>

<form method="post" action="nisd.php" >
    <input type="text" name="chaozhao" />
    <input type="submit"  name ="submit" value="提交" />

</form>
</body>
</html>


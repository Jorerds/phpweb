<?php
    header('Content-type:text/html;charset=utf-8');
    $link=mysqli_connect('localhost','root','','test',3306);
    if (mysqli_connect_errno()){
        exit(mysqli_connect_error());
    }
    mysqli_set_charset($link,'utf8');
if(isset($_POST['submit'])) {
    if ($_POST['liuyang'] != '') {
        if ($srt = mysqli_real_escape_string($link, $_POST['liuyang'])) {

            if ($qur = "INSERT INTO liuyang(liuyang) VALUES('{$_POST['liuyang']}')") {
                if (mysqli_query($link, $qur)){
                    header('Location:skip.php?url=liuyang.php&info=提交成功！');
                }

            }
        }
    }else{
        header('Location:skip.php?url=liuyang.php&info=留言不能为空！');
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

<form method="post" action="liuyang.php" >

    <textarea rows="10" cols="30" name="liuyang"></textarea>
    <input type="submit"  name ="submit" value="提交" />
</form>
</body>
</html>

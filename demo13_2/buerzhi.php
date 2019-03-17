        <?php
        header('Content-type:text/html;charset=utf-8');
        /*连接数据库*/
        $link=mysqli_connect('localhost','root','','test',3306);
        /*判断连接是否成功*/
        if(mysqli_connect_errno()){
            exit(mysqli_connect_error());
        }
        /*设置数据库编码*/
        mysqli_set_charset($link,'utf8');
        /*执行mysql语句*/
        if(isset($_POST['submit'])) { //设置判断是否有点提交按钮（防止刷新网页 空白提交数据）
            if ($_POST['usr_name'] != '' && $_POST['xuehao']!='' && $_POST['sex']!='') {
                if (mysqli_real_query($link, "INSERT INTO xuesheng(usr_name,xuehao,sex) VALUES ('$_POST[usr_name]','$_POST[xuehao]','$_POST[sex]')")) {
                    header('Location:skip.php?url=buerzhi.php&info=数据填写成功');
                }

            }else{
                header('Location:skip.php?url=buerzhi.php&info=请完整填写信息');
            }
        }

        /*关闭数据的连接*/
        mysqli_close($link);

        ?>
        <html>
        <head>
            <meta charset="utf-8">
            <title>学生信息记录</title>
        </head>
        <body>

        <form method="post" action="buerzhi.php" >
            学生姓名：<input type="text" name="usr_name" /><br />
            学生学号：<input type="text" name="xuehao" /><br />
            学生性别：<input type="text" name="sex" /><br />
            <input type="submit"  name ="submit" value="提交" />
        </form>

        </body>
        </html>

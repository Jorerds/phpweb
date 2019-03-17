<!-- 删除处理页面 -->
<?php
    include  '../inc/config.inc.php';
    include  '../inc/mysql.inc.php';
    include '../inc/tool.inc.php';
    $link=connect();
    //设置判断id传递是否存在，is_numeric 检测变量是否为一个数字字符串 防止出现恶意删除
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])){
        skip('father_bang.php','error','id参数错误！');
    }
$query="SELECT * FROM  son_bang WHERE  father_id={$_GET['id']}";
    $son=execute($link,$query);
    if (mysqli_num_rows($son)){
        skip('father_bang.php','error','对不起，这个父板块下存在子版块 删除失败！');
    }
    $query="DELETE FROM  father_bang WHERE  id={$_GET['id']}";
    execute($link,$query);
    if (mysqli_affected_rows($link)==1){
        skip('father_bang.php','ok','删除成功！');
    }else{
        skip('father_bang.php','error','对不起，删除失败！');
    }

?>
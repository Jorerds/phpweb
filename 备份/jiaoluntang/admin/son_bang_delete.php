<?php
include  '../inc/config.inc.php';
include  '../inc/mysql.inc.php';
include '../inc/tool.inc.php';
$link=connect();
//设置判断id传递是否存在，is_numeric 检测变量是否为一个数字字符串 防止出现恶意删除
if (!isset($_GET['id']) || !is_numeric($_GET['id'])){
    skip('son_bang.php','error','id参数错误！');
}
$query="DELETE FROM  son_bang WHERE  id={$_GET['id']}";
execute($link,$query);
if (mysqli_affected_rows($link)==1){
    skip('son_bang.php','ok','删除成功！');
}else{
    skip('son_bang.php','error','对不起，删除失败！');
}

<?php
if (empty($_POST['son_id']) || !is_numeric($_POST['son_id'])){
    skip('publish.php','error','板块id参数错误！');
}
$query="SELECT * FROM  son_bang WHERE  id={$_POST['son_id']}";
$result=execute($link,$query);
if (mysqli_num_rows($result)!=1){
    skip('publish.php','error','板块不存在！');
}
if (empty($_POST['title'])){
    skip('publish.php','error','标题不能为空！');
}
if (mb_strlen($_POST['title'])>255){
    skip('publish.php','error','标题长度不得超过255个字符！');
}
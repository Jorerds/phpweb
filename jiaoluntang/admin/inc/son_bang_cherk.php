<?php
$url=basename($_SERVER['REQUEST_URI']);
if (!is_numeric($_POST['father_id'])){
    skip("{$url}",'error','请选择子板块所要归属的父板块');
}
$query="SELECT * FROM  father_bang WHERE  id={$_POST['father_id']}";
$father_id=execute($link,$query);
if (mysqli_num_rows($father_id)==0){
    skip("{$url}",'error','请选择正确的父板块！！');
}
if (empty($_POST['son_bang_name'])){
    skip("{$url}",'error','子板块名称不能为空！');
}
if (mb_strlen($_POST['son_bang_name'])>66){
    skip("{$url}",'error','子板块名称不能超过66个字符！');
}
if (mb_strlen($_POST['info'])>255){
    skip("{$url}",'error','子板块简介不能超过255个字符！');
}
if (!is_numeric($_POST['sort'])){
    skip("{$url}",'error','排序只能是个数字');
}
$_POST=escape($link,$_POST);

switch ($cherk){
    case 'ind':
        $query="SELECT  *FROM son_bang WHERE  son_bang_name='{$_POST['son_bang_name']}'";
        break;
    case 'updata':
        $query="SELECT  *FROM son_bang WHERE  son_bang_name='{$_POST['son_bang_name']}' and  id!={$_GET['id']}";
        break;
    default:
        skip("{$url}",'error','$cherk参数错误');

}
$result_son=execute($link,$query);
if (mysqli_num_rows($result_son)){
    skip("{$url}",'error','这个子板块已经存在了！');
}



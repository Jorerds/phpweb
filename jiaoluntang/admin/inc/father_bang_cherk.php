<?php
//设置返回上一页的变量
$url=basename($_SERVER['REQUEST_URI']);
if (empty($_POST['bang_name'])){
    skip("{$url}",'error','父板块名称不能为空！');
}
if (mb_strlen($_POST['bang_name'])>66){
    skip("{$url}",'error','父板块名称不能超过66个字符！');
}
if (!is_numeric($_POST['sort'])){
    skip("{$url}",'error','排序只能是个数字');
}
//对添加数据进行转义
$_POST=escape($link,$_POST);

//对版块名称进行验证，防止重复名字的版块
switch ($cherk){
    case 'ind':
        $query="SELECT  *FROM father_bang WHERE  bang_name='{$_POST['bang_name']}'";
        break;
    case 'updata':
        $query="SELECT  *FROM father_bang WHERE  bang_name='{$_POST['bang_name']}' and  id!={$_GET['id']}";
        break;
    default:
        skip("{$url}",'error','$cherk参数错误');

}

$result=execute($link,$query);
if (mysqli_num_rows($result)){
    skip("{$url}",'error','这个版块已经存在了！');
}

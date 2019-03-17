<!-- 后台头部公共文件 -->
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <title><?php echo $head['title']?></title>
    <meta name="keywords" content="<?php echo $head['keywords']?>" />
    <meta name="description" content="<?php echo $head['description']?>" />
    <link rel="stylesheet" type="text/css" href="style/css/public.css" />
</head>
<body>
<div id="top">
    <div class="logo">
        管理中心
    </div>
    <ul class="nav">
        <li><a href="#" target="_blank">备用链接</a></li>
        <li><a href="#" target="_blank">备用链接</a></li>
    </ul>
    <div class="login_info">
        <a href="#" style="color:#fff;">网站首页</a>&nbsp;|&nbsp;
        管理员： admin <a href="#">[注销]</a>
    </div>
</div>
<div id="sidebar">
    <ul>
        <li>
            <div class="small_title">系统</div>
            <ul class="child">
                <li><a <?php  if (basename($_SERVER['SCRIPT_NAME'])==''){echo"class='current'";}?> href="#">系统信息</a></li>
                <li><a  <?php  if (basename($_SERVER['SCRIPT_NAME'])==''){echo"class='current'";}?>href="#">管理员</a></li>
                <li><a <?php  if (basename($_SERVER['SCRIPT_NAME'])==''){echo"class='current'";}?>href="#">添加管理员</a></li>
                <li><a <?php  if (basename($_SERVER['SCRIPT_NAME'])==''){echo"class='current'";}?>href="#">站点设置</a></li>
            </ul>
        </li>
        <li><!--  class="current" -->
            <div class="small_title">内容管理</div>
            <ul class="child">
                <li><a <?php  if (basename($_SERVER['SCRIPT_NAME'])=='father_bang.php'){echo"class='current'";}?> href="father_bang.php">父板块列表</a></li>
                <li><a <?php  if (basename($_SERVER['SCRIPT_NAME'])=='father_bang_ind.php'){echo"class='current'";}?> href="father_bang_ind.php">添加父板块</a></li>
                <li><a  <?php  if (basename($_SERVER['SCRIPT_NAME'])=='son_bang.php'){echo"class='current'";}?> href="son_bang.php">子板块列表</a></li>
                <li><a <?php  if (basename($_SERVER['SCRIPT_NAME'])=='son_bang_ind.php'){echo"class='current'";}?>href="son_bang_ind.php">添加子板块</a></li>
                <li><a <?php  if (basename($_SERVER['SCRIPT_NAME'])==''){echo"class='current'";}?>href="#">帖子管理</a></li>
            </ul>
        </li>
        <li>
            <div class="small_title">用户管理</div>
            <ul class="child">
                <li><a href="#">用户列表</a></li>
            </ul>
        </li>
    </ul>
</div>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <title><?php echo $head['title']?></title>
    <meta name="keywords" content="<?php echo $head['keywords']?>" />
    <meta name="description" content="<?php echo $head['description']?>" />
    <?php
        foreach ($template['css'] as $val){
            echo "<link rel='stylesheet' type='text/css' href='{$val}' />";
        }
    ?>
    <script type="text/javascript" src="style/js/prompt.js"></script>
    <script charset="utf-8" src="editor/kindeditor-all.js"></script>
    <script charset="utf-8" src="editor/lang/zh-CN.js"></script>
</head>
<body>
<div class="header_wrap">
    <div id="header" class="auto">
        <div class="logo">镜</div>
        <div class="nav">
            <a class="hover" href="index.php">首页</a>
            <a href="publish.php">新帖</a>
            <a>话题</a>
        </div>
        <div class="serarch">
            <form>
                <input class="keyword" type="text" name="keyword" placeholder="搜索其实很简单" />
                <input class="submit" type="submit" name="submit" value="" />
            </form>
        </div>
        <div class="login"><?php

              if (isset($urs_id) && $urs_id==true){
$html=<<<A
                        <a href="">您好！{$_SESSION['urs_name']}</a> <span style="color: #fff">|</span> <a href="logout.php">退出</a>
A;
                echo $html;
                }   else{
$html=<<<A
            <a href="login.php">登录</a>&nbsp;
            <a href="register.php">注册</a>
A;
            echo $html;
                }
            ?>

        </div>
    </div>
</div>
<?php

?>

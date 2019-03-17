<?php

    if (empty($_POST['urs_name'])){
        skip('register.php','error','用户名不得为空！');
    }
    if (mb_strlen($_POST['urs_name'])>20){
        skip('register.php','error','用户名长度不得超过20个字符！');
    }
    /*if (!preg_match('/^[a-zA-Z0-9_\u4e00-\u9fa5]+$/u',$_POST['urs_name'])){
        skip('register.php','error','用户名只能是中文、英文、数字和下划线！');
    }*/


    if (empty($_POST['password'])){
        skip('register.php','error','密码不得为空！');
    }
    if (mb_strlen($_POST['password'])<6 || mb_strlen($_POST['password'])>16){
        skip('register.php','error','密码长度不得少于6个字符或大于16个字符');
    }

    /*$pw=$_POST['password'];
    preg_match_all('/[a-zA-Z]/',$pw,$pp_zimu);
    preg_match_all('/[0-9]/',$pw,$pp_shuzi);

    if ($pp_zimu[0][0]=='' or  $pp_shuzi[0][0]=='' ){
        skip('register.php', 'error', '密码必须包含字母和数字的组合(区分大小写)');
    }*/

    if (!preg_match('/[a-zA-Z\.\_]/',$_POST['password']) or !preg_match('/[0-9]/',$_POST['password'])){
        skip('register.php', 'error', '密码必须包含字母和数字的组合(区分大小写)');
    }


    if ($_POST['confirm_pw']!=$_POST['password']){
        skip('register.php','error','两次输入的密码不一致！');
    }

    if (strtolower($_POST['vcode'])!=strtolower($_SESSION['vcode'])){
        skip('register.php','error','验证码不正确！');
    }


    $_POST=escape($link,$_POST);

    $query="SELECT * FROM member WHERE  urs_name='{$_POST['urs_name']}'";
    $result=execute($link,$query);
    if (mysqli_num_rows($result)){
        skip('register.php','error','用户名已经被注册！');
    }


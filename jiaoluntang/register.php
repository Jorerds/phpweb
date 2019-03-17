<!-- 注册页面 -->
<?php
    include 'inc/config.inc.php';
    include 'inc/mysql.inc.php';
    include 'inc/tool.inc.php';

$head=array(
    'title'=>'注册会员',
    'keywords'=>'镜会员注册页面',
    'description'=>'镜会员注册页面'
);
$template['css']=array('style/css/public.css','style/css/register.css','style/css/tishi.css');
    $link=connect();

    if ($urs_id=isLogin($link)){
        skip('index.php','error','您已经登录了！请不要重复注册');
    }
    if (isset($_POST['submit'])) {
        /*引入判断文件*/
        include 'inc/check_register.inc.php';
            $query = "INSERT INTO  member(urs_name,password,rt_time) VALUES ('{$_POST['urs_name']}',md5('{$_POST['password']}'),now())";
            execute($link, $query);
            if (mysqli_affected_rows($link)==1) {
                /*设置注册时候的session写入*/
                $_SESSION['urs_name'] = $_POST['urs_name'];
                $_SESSION['password'] =sha1(md5($_POST['password']));
                skip('index.php', 'ok', '注册成功！');
            } else {
                skip('register.php', 'error', '注册失败！');
            }

    }
?>
<?php include 'inc/header.inc.php'?>
<div style="margin-top:55px;"></div>
<div id="register" class="auto">
    <h2>欢迎注册成为 镜会员</h2>
    <form method="post">
        <label >用户名：<input type="text"  name="urs_name" maxlength="20" id="name" onblur="checkName()"/><span id="nameMsg">*请输入用户名</span></label>
        <label >密码：<input type="password"  name="password" id="pwd" maxlength="16" onblur="checkPwd()"/><span id="pwdMsg">*请输入由至少1位英文和4位数字组成的密码</span></label>
        <label >确认密码：<input type="password"  name="confirm_pw" maxlength="16" id="pwd2" onblur="checkPwd2()"/><span id="pwdMsg2">*请新输入一遍上面的密码</span></label>
        <label>验证码：<input type="text" name="vcode" id="vcode" onabort="checkVcode()"/><span id="vcodeMsg">*请输入下方验证码</span></label>
        <img class="vcode" id="vcode" src="show_code.php" title="点击刷新验证码"  alt="请点击刷新验证码" border="0" align="absmiddle" onclick="this.src='show_code.php?rnd=' + Math.random();" />
        <div style="clear:both;" ></div>
        <input class="btn" type="submit" name="submit" value="确定注册" />
    </form>
</div>
<?php include 'inc/footer.inc.php'?>

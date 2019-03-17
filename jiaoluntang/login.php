<?php
include 'inc/config.inc.php';
include 'inc/mysql.inc.php';
include 'inc/tool.inc.php';
$link=connect();

$template['css']=array('style/css/public.css','style/css/register.css','style/css/tishi.css');
$head=array(
    'title'=>'欢迎登陆',
    'keywords'=>'镜会员登陆页面',
    'description'=>'镜会员登陆页面'
);
if ($urs_id=isLogin($link)){
    skip('index.php','error','您已经登录了！请不要重复登陆！');
}
if (isset($_POST['submit'])){
   include 'inc/check_login.inc.php';
    escape($link,$_POST);
    $query="SELECT * FROM member WHERE urs_name='{$_POST['urs_name']}' AND password=md5('{$_POST['password']}')";
    $result=execute($link,$query);
    if (mysqli_num_rows($result)==1){
        $_SESSION['urs_name'] = $_POST['urs_name'];
        $_SESSION['password'] =sha1(md5($_POST['password']));
        skip('index.php','ok','登陆成功！');
    }else{
        skip('login.php','error','用户名或密码错误！');
    }

}


?>

<?php include 'inc/header.inc.php'?>
<div style="margin-top:55px;"></div>
<div id="register" class="auto">
    <h2>欢迎登陆 镜会员</h2>
    <form method="post">
        <label>用户名：<input type="text" name="urs_name"  maxlength="20"id="name" onblur="checkName()" /><span id="nameMsg"></span></label>
        <label>密码：<input type="password"  name="password" id="pwd" maxlength="16" onblur="checkPwd()"/><span id="pwdMsg"></span></label>
        <label>验证码：<input name="vcode" type="text"  /><span>*请输入下方验证码</span></label>
        <img class="vcode" id="vcode" src="show_code.php" title="点击刷新验证码"  alt="请点击刷新验证码" border="0" align="absmiddle" onclick="this.src='show_code.php?rnd=' + Math.random();" />
        <!--<label>自动登录：
            <select style="width:236px;height:25px;" name="lifeTime">
                <option value="3600">1小时内</option>
                <option value="86400">1天内</option>
                <option value="259200">3天内</option>
                <option value="2592000">30天内</option>
            </select>
            <span>*公共电脑上请勿长期自动登录</span>
        </label>-->
        <div style="clear:both;"></div>
        <input class="btn" type="submit" name="submit" value="登陆" />
    </form>
</div>
<?php include 'inc/footer.inc.php'?>

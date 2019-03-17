<!-- 确认删除页面 -->
<?php
include  '../inc/config.inc.php';
include  '../inc/mysql.inc.php';
        if (!isset($_GET['delete_name']) or !isset($_GET['url']) or  !isset($_GET['return_url'])){
        exit();
    }


?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <title>删除确认</title>
    <meta name="keywords" content="确认删除" />
    <meta name="description" content="确认删除" />
    <link rel="stylesheet" type="text/css" href="style/css/remind.css" />
</head>
<body>
        <div class="notice"><span class="pic ask"></span> <?php  echo $_GET['delete_name']?><br />
            <a href="<?php echo $_GET['url'] ?>" style="color: #ff2b21">确认</a>&nbsp; | &nbsp;<a href=" <?php  echo $_GET['return_url']?>">取消</a>
        </div>
</body>
</html>

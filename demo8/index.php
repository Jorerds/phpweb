<html>
<head>
<meta charset="utf-8">
<title></title>
</head>
<body>

        <?php
           date_default_timezone_set('Asia/Shanghai'); //date_default_timezone_set设置时区
           $NowTime=time(); 
           $Time=mktime(17,0,0,7,24,2017);  //取得一个日期的Unix时间戳
           echo '当前时间戳：'.time();  //time()获取当前Unix时间戳 
           echo '<br />';
           echo '距离5点钟还剩'.(($Time-$NowTime)/60).'分钟'.'<br />';
           echo '当前时间'.date('Y年-m月-d日 G:i:s').'<br />';  //自定义格式Unix时间戳为指定的时间格式
           echo '当前Unix时间戳的微秒数：'.microtime(true);  //返回当前Unix时间戳的微秒数
           
        ?>
</body>
</html>

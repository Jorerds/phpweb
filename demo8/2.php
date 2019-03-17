<html>
<head>
<meta charset="utf-8">
<title></title>
</head>
<body>
<!-- -------------------------------------------可用microtime计算程序运行秒数---------------------------------------------------------- -->
<?php 
    date_default_timezone_set('Asia/Shanghai');
    $kaishi=microtime(true);
    for($i=0;$i<1000000;$i++){
        
    }
    $jiesu=microtime(true);
    echo 'for循环用了：'.round(($jiesu-$kaishi),4).'秒'; 

 ?>




</body>
</html>
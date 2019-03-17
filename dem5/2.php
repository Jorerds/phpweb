<?php 
    $var='/t.*t/';   //.*组合默认是贪婪匹配  .*后面加上?可变成懒惰匹配
    $str='asdtestsdartsdtesdst';
    var_dump(preg_match_all($var, $str,$arr));
    var_dump($arr);
?>
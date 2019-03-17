<?php 
    /*
     遍历多维数组可用foreach嵌套foreach的方法
     格式：foreach(数组变量 as 变量1){
                    foreach(变量1 as 变量2){
                     //循环执行语句
                    }
                }
     */
        $arr=array(
            array('a','b','c'),
            array('d','e','f')
        );
        foreach ($arr as $val1){
            foreach ($val1 as $val2){
                echo $val2.'<br />';
            }
        }
?>
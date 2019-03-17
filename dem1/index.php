<?php
    //使用for循环可以遍历数组
    /*
     count(数组[,1])返回数组里面数据的个数，还可以获取多维数组的个数，当然一般我们只传一个数组进去就可以了
     $arr1=array(
            array(1,2,3),
            array(4,5,6)
     )
     echo count($arr1,1); //数组$arr1一共有8个数据，因为除了$arr1[0]和$arr1[1]各有3个数据外，它们两个本身也是属于$arr1的两个数据
     */
    
    $arr=array(
        'a','b','c','d','e'
);
        echo '数组$arr一共有：'. count($arr).'条数据<br />'; //使用函数count统计数组$arr的数据个数
        echo '其中有以下几条数据：<br />';
        for($i=0;$i<count($arr);$i++){  //使用for循环可以输出$arr里面的数组
           echo $arr[$i].'<br />'; 
           
  }
  


    
    
?>
<?php 
    /*
     foreach来遍历数组 //比较常用，因为是PHP专门为我们来遍历数组的
     格式：   foreach(数组变量 as 变量1){
                //每次循环执行的语句
                 变量1代表正在经历的数据
     }
     */
    
    $arr=array(
            'Name'=>'崔斯特',
            'Nex'=>30
    );
        foreach ($arr as $value){
            echo $value.'<br />';
        }
        echo '<br />';
        
        $arr1=array(
            'Name2'=>'卢锡安',
            'Nex2'=>6300
        );
        foreach ($arr1 as $value1=>$value2){
            echo $value1.'='.$value2.'<br />';
        }
            
     
?>
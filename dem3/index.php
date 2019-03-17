<html>
<head>
<meta charset="utf-8">
<title>测试项目</title>
</head>
<!-- ------------------------- array_count_values统计数组中所有的值的出现次数 ------------------------------------ -->		
        <?php
        $Max=array(16,'老王','老李','老李');
        print_r(array_count_values($Max));  //统计数组中所有的值的出现次数
        echo '<br />';
        ?>
		
<!-- ------------------------- array_key_exists检查键名是否存在于数组中 ------------------------------------ -->		
		<?php 
    		$Nex=array(100,'老王');
    		if(array_key_exists(2, $Nex)){ //检查键名是否存在于数组中
    		    echo '键存在<br />';
    		}else {
    		    echo '键不存在<br />';
    		}
		?>
		
<!-- ------------------------- array_search数组函数 ------------------------------------ -->
		<?php 
		     $ar=array(10,'你好','大佬',30);
		     var_dump(array_search('30', $ar,true));  //在数组中搜索键值并返回他的键名 如果涉及数据类型的 var_dump(array_search('30', $ar,true))(其中'30'是一个字符串类型而数组中30是个整型 所以在后面加上true来验证是否存在)
		     echo '<br />';
		?>
		
<!----------------------------- count数组数据统计 --------------------------------------- -->
		<?php 
		     $ard=array(10,'你好','大佬',30);
		     echo  '数组中一共有：'.count($ard).'个数据'.'<br />';  //统计数组中的数据
		?>
		
		
<!-- ---------------------------------- in_array 数组搜索数据--------------------------------------------- -->
		<?php 
		  $vex=array('老王','老李',10,50,'Nxd');
		 /* if(in_array('老', $vex)){     //在数组中搜索数据
		      echo '找到';
		  }else {
		      echo '未找到';
		  } */
		  var_dump(in_array('nxd', $vex,true)); //加上true可以验证数据是否相等
		  echo '<br />';
		?>
		
<!-- ---------------------------------- list 数组值赋值给变量 --------------------------------------------- -->
		<?php 
		$v1=array('老王','小李','小明');
		list($Laowang,$Xiaoli,$Xiaoming)=$v1;  //把数组中的值赋值给变量
		echo $Laowang.'<br />';
		?>
		
<!-- ---------------------------------- 数组的排序 --------------------------------------------- -->
		<?php 
		  $arrd=array(
		      'laowang'=>80,
		      'liming'=>100,
		      'hanghon'=>94,
		      'hanghan'=>75
		  );
		  asort($arrd);    //对数组按键值升序进行排序
		 //arsort($arrd); //对数组按键值降序进行排序
		 //ksort($arrd);   //对数组按键名进行排序
		 //krsort($arrd);  //对数组按键名逆向排序
		  print_r($arrd);
		  echo '<br />';
		  print_r(array_reverse($arrd));//以相反的元素顺序返回数组
            echo '<br />';
		?>
<!-- ----------------------------------------array_filter回调函数--------------------------------------------------------- -->
			<?php 
			     function adp($var){
			         return ($var % 2 ==1);
			     }
			     function adp2($var){
			         return($var%2==0);
			     }
			     $arrdd1=array('a'=>1,'b'=>2,'c'=>3,'d'=>4,'e'=>5,'f'=>6,'g'=>7);
			     $arrdd2=array(8,9,10,11,12);
			     echo "adp: \n";
			     print_r(array_filter($arrdd1,"adp"));  //把值传递到回调函数里面 如果是true，则把输入数组中的当前键值返回结果数组中，数组键名保持不变。
			     echo "adp2: \n";
			     print_r(array_filter($arrdd2,"adp2")); //把值传递到回调函数里面 如果是true，则把输入数组中的当前键值返回结果数组中，数组键名保持不变。
			
			
			?>
</html>
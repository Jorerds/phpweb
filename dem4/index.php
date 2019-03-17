<html>
<head>
<meta charset="utf-8" >
<title>字符串处理函数</title>
</head>
<body>
<!-- ---------------------------trim移除字符串函数--------------------------------------- -->
	<?php 
	   $de1='   卡莉斯塔   ';
	   var_dump(trim($de1)); //trim移除字符串两侧的字符
	   //var_dump(ltrim($de1));  //ltim移除字符串左侧的字符
	   //var_dump(rtrim($de1));  //rtim移除字符串右侧的字符
	   $sd='asdddwfwew';
	   var_dump(trim($sd,'adf'));  //后面加上条件可达到去除指定字符串(多个字符可连写)
	   echo '<br />';
	?>

<!-- -----------------------------------字符串转换函数------------------------------------------------------------ -->
		<?php 
		      $vd='hello word';
		      $vd2='LODSW';
		      echo strtoupper($vd).'<br />';   //将字符串转换为大写
		      echo strtolower($vd2).'<br />';  //将字符串转换为小写

		?>
<!-- -----------------------------------字符搜索函数--------------------------------------------------------------- -->		
		<?php 
		      $ed='And slowly read,and dream of the soft look';
		      echo substr_count($ed,'ad').'<br />'; 
		      //substr_count(被查找的字符串,规定搜索的字符串,规定在字符串何处开始搜索,规定字符串搜索长度)
		      // substr_count($ed,'s',2,3) 2是从字符串的第二位开始，3是从开始字符串到第三个结束
		      
		      echo strpos($ed, 'A'); //查找字符串首次出现位置(区分大小写)
		      /*
		       * stripos() - 查找字符串在另一字符串中第一次出现的位置（不区分大小写）
                  strripos() - 查找字符串在另一字符串中最后一次出现的位置（不区分大小写）
                  strpos()- 查找字符串在另一字符串中第一次出现的位置（区分大小写）
                  strrpos() - 查找字符串在另一字符串中最后一次出现的位置（区分大小写）
                    */
		      echo '<br />';
		      $sdd='t1sdwsdasa';
		      if(strpos($sdd, 't')!==false){  //如果不加上!==false 那么无法正常判断
		          echo '找到了<br />';
		      }else {
		          echo '未找到<br />';
		      }
		      
		      echo strstr($sdd, 'd').'<br />'; /*查找字符串在另一字符串中的第一次出现（区分大小写）加上true的话会返回搜索字符串的前面的字符串*/
		     ?>
	<!--------------------------------------------字符串替换函数-----------------------------------------------------------  --> 
	<?php      
		      var_dump(str_replace('t', 'T',$sdd));  /*查找并替换字符串*/
		      $ws='t1sdwsdasa';
		      $vss=str_replace(array('t',1,'s'), array('T','一','S'), $ws,$count); /*可用数组的方法对多个字符串进行替换 加上$count可对字符串替换计数*/
		      echo $count;
		      var_dump($vss);
		      echo '<br />';
		      
		      $ws1=array(              /*srt_replace也可以对一个字符串的数组进行字符串替换*/
		          't1sdwsdasa',  
		          'dswt1dassa',
		          'swasasdst1'
		      );
		      var_dump($ws1);
		      $we=str_replace(array('t',1,'s'), array('T','一','S'), $ws1);
		      echo '<br />';
		      var_dump($we);
		?>
			
</body>
</html>
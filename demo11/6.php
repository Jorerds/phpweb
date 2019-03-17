<?php 
    /*
     * $_FILES  HTTP 文件上传变量
     * isset()检测变量是否设置
     * is_uploaded_file()判断文件是否是通过 HTTP POST 上传的
     * move_uploaded_file()把一个上传的文件移动到一个新的位置
     * pathinfo()函数以数组的形式返回关于文件路径的信息    [dirname]：为文件所在的文件夹，[basename]：文件的全名称，[extension]：文件的扩展名
     */
    header('Content-type:text/html;charset=utf-8');
    date_default_timezone_set('Asia/Shanghai');
   if (isset($_POST['submit'])){ //检测是否有点击这个变量的按钮有就继续执行
    if (is_uploaded_file($_FILES['myfile']['tmp_name'])){//判断文件是否是通过 HTTP POST 上传的['myfile']['tmp_name']为$_FILES中的数组名称
            $arr=pathinfo($_FILES['myfile']['name']); //把这个返回的数据保存到一个数组
            $New_Name=date('YmdGis').rand(1000,9999); //设置以上传时间作为把上传的文件重新命名防止重名
            if(move_uploaded_file($_FILES['myfile']['tmp_name'], "uploads/{$New_Name}.{$arr['extension']}")){ //把一个上传的文件移动到一个新的位置 格式：move_uploaded_file(上传的文件名,移动的目标文件)
                   echo '上传成功';                                                      /*                  $arr['extension']; //调用文件信息的扩展名            */
    }else {                                               
           echo '上传失败';
    }
        }else {
            exit('上传错误！');
        }
   }  
         
?>
<html>
<head>
<meta charset="utf-8" />
<title>上传页面</title>
</head>
<body>
	<form action="" method="post" enctype="multipart/form-data">
		<input type="file" name="myfile" />
		<input type="submit" name="submit" value="开始上传">
</form>

</body>
</html>
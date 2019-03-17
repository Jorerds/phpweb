<?php
        header('Content-type:text/html;charset=utf-8');
        $link=mysqli_connect('localhost','root','','test',3306);
        if(mysqli_connect_errno()){
            exit(mysqli_connect_error());
        }
        mysqli_set_charset($link,'utf8');
        /*$query= 'SELECT usr_name,xuehao,sex FROM xuesheng';
        $rds=mysqli_query($link,$query);*/


        /*以索引数组的方式来获取数据*/
        /*while ($date=mysqli_fetch_row($rds)){
            var_dump($date);
        }*/

        /*以关联数组的方式来获取数据*/
        /*while ($date=mysqli_fetch_assoc($rds)){
            var_dump($date);
        }*/



        /*
         * 以关联或索引数组的方式来获取数据
         * MYSQLI_BOTH 默认以两种方式来获取和输出数据
         *MYSQLI_ASSOC 以关联数组的方式
         * MYSQLI_NUM 以索引数组的方式
        */
        /*while($date=mysqli_fetch_array($rds,MYSQL_BOTH)){
            var_dump($date);
        } */


        /*
         * 以关联或索引数组的方式来获取全部数据
         *MYSQLI_BOTH 以两种方式来获取和输出数据
         *MYSQLI_ASSOC 以关联数组的方式
         * MYSQLI_NUM 以索引数组的方式
        */
        /*$date=mysqli_fetch_all($rds);
        var_dump($date);
        //用foreach来输出获取数据库的具体信息 list嵌套的数组解包
        foreach ($date as list($usr_name,$xuehao,$sex)){
            echo "学生姓名：&nbsp; $usr_name 学号：&nbsp; $xuehao 性别：&nbsp; $sex<br />";

        }*/


        /*
         *从结果集中的一个字段的信息
         */
        /*
         * $fsisd=mysqli_fetch_field($rds);
        var_dump($fsisd);
        echo $fsisd->name;
        */


        /*
         *返回一个结果集字段的对象数组
         */
        /*$sields=mysqli_fetch_fields($rds);
        var_dump($sields);
        echo $sields[1]->name;
         */


        /*
         *获取结果中行的数量
         * MYSQLI_USE_RESULT模式下必须先获取完所有数据才能获取行数
        */
        /*$rows=mysqli_num_rows($rds);
        var_dump($rows);
        */
        /*$res=mysqli_query($link,$query,MYSQLI_USE_RESULT);
        while ($date=mysqli_fetch_row($res)){
            var_dump($date);
        }
        var_dump(mysqli_num_rows($res));*/


        //mysqli_real_query适用于返回布尔值 判断有没有执行成功
        /*$qust='SELECT * FROM xuesheng ';
        if(mysqli_real_query($link,$qust)){
            //获取结果集对象
            $result=mysqli_store_result($link);
            var_dump($result);
            var_dump( mysqli_fetch_row($result));

        }*/

        $qure='SELECT * FROM xuesheng';
        if (mysqli_query($link,$qure)){
            var_dump(mysqli_affected_rows($link));
        }else{
            //输出错误代号
            var_dump(mysqli_errno($link));
            //输出错误原因
            var_dump(mysqli_error($link));
}



        /*
         * 释放一个与结果值相关的内存
         */
        //mysqli_free_result($link);


        mysqli_close($link);

?>
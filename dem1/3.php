<?php 
    /*
     ������ά�������foreachǶ��foreach�ķ���
     ��ʽ��foreach(������� as ����1){
                    foreach(����1 as ����2){
                     //ѭ��ִ�����
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
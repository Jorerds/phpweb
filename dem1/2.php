<?php 
    /*
     foreach���������� //�Ƚϳ��ã���Ϊ��PHPר��Ϊ���������������
     ��ʽ��   foreach(������� as ����1){
                //ÿ��ѭ��ִ�е����
                 ����1�������ھ���������
     }
     */
    
    $arr=array(
            'Name'=>'��˹��',
            'Nex'=>30
    );
        foreach ($arr as $value){
            echo $value.'<br />';
        }
        echo '<br />';
        
        $arr1=array(
            'Name2'=>'¬����',
            'Nex2'=>6300
        );
        foreach ($arr1 as $value1=>$value2){
            echo $value1.'='.$value2.'<br />';
        }
            
     
?>
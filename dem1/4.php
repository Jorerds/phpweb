<?php 
    $std=array(
            array('��ʥ��',1,true,84.1),
            array('����',2,true,91.4),
            array('����',3,false,45.5)
    );
    echo '<table border=10>';
    foreach ($std as $val){ 
        
        if($val[2]===true){   //��if������true��false�ֱ���Ϊ�к�Ů
                $val[2]='��';
        }else {
                $val[2]='Ů';
        }
        
        echo "<tr>
                         <td>{$val[0]}</td>
                         <td>{$val[1]}</td> 
                         <td>{$val[2]}</td>
                         <td>{$val[3]}</td>
                   </tr>";
                            
    }
    
    echo '</table>';

?>
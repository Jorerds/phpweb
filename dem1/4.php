<?php 
    $std=array(
            array('王圣堂',1,true,84.1),
            array('王朗',2,true,91.4),
            array('韩红',3,false,45.5)
    );
    echo '<table border=10>';
    foreach ($std as $val){ 
        
        if($val[2]===true){   //用if来处理true和false分别处理为男和女
                $val[2]='男';
        }else {
                $val[2]='女';
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
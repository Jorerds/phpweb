<?php 

    $max=array(
      'Han'=>array('����','6��',false,88.5),
      'Hha'=>array('����','10��',true,91.5)
    );
     
         echo '<table border="1">';
    foreach ($max as $val){
        if ($val[2]===true){
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
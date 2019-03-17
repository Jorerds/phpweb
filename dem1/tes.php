<?php 

    $max=array(
      'Han'=>array('º«ºì','6ºÅ',false,88.5),
      'Hha'=>array('º«º®','10ºÅ',true,91.5)
    );
     
         echo '<table border="1">';
    foreach ($max as $val){
        if ($val[2]===true){
                $val[2]='ÄÐ';
            }else {
                $val[2]='Å®';
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
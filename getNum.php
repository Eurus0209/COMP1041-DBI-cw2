<?php
function getNumOfRegion($sql,$conn){
    $result = $conn -> query($sql);
    $num = array(0,0,0);
    
    if($result ->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $num[0] += $row['type1'];
            $num[1] += $row['type2'];
            $num[2] += $row['type3'];
        }
        
    }
    return $num;
}
echo 'hhhhhh';
?>
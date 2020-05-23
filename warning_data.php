<?php
    include 'conntodb.php';
    $sr_sql = "SELECT * FROM user WHERE role = 2";
    $sr_result = $conn->query($sr_sql);
    $w_str = "";
    if($sr_result->num_rows >0){
        while($row = $sr_result->fetch_assoc()){
            $info_list = getDetailSoldMask($row['name'],$conn,$row['quota1'],$row['quota2'],$row['quota3']);
            if($info_list[0][0]>$row['quota1']){
                $w_str = $w_str.'<tr class = "table-row">
                <td>'.$row['name'].'</td>
                <td>N95 respirator</td>
                <td style="color:red; font-weight:700;">'.$info_list[0][0].'/'.$row['quota1'].'</td>
                <td><input type="text" onkeyup = "value=value.replace(/[^\d]/g,'."''".')" value="'.($info_list[0][0]-$row['quota1']).'"></td>
            </tr>';
            }
            if($info_list[1][0]>$row['quota2']){
                $w_str = $w_str.'<tr class = "table-row">
                <td>'.$row['name'].'</td>
                <td>Surgial mask</td>
                <td style="color:red; font-weight:700;">'.$info_list[1][0].'/'.$row['quota2'].'</td>
                <td><input type="text" onkeyup = "value=value.replace(/[^\d]/g,'."''".')" value="'.($info_list[1][0]-$row['quota2']).'"></td>
            </tr>';
            }
            if($info_list[2][0]>$row['quota3']){
                $w_str = $w_str.'<tr class = "table-row">
                <td>'.$row['name'].'</td>
                <td>N95 Surgial</td>
                <td style="color:red; font-weight:700;" >'.$info_list[2][0].'/'.$row['quota3'].'</td>
                <td><input type="text" onkeyup = "value=value.replace(/[^\d]/g,'."''".')" value="'.($info_list[2][0]-$row['quota3']).'"></td>
            </tr>';
            }
        }
    }
    if($w_str!=''){
        $flag_warning = 1;
    }else{
        $flag_warning = 0;
    }
?>
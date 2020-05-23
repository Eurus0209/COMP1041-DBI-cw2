<?php
    include 'conntodb.php';
    $sql = "SELECT * FROM user WHERE role = 2";
    $info_list = array();
    if(($result=$conn->query($sql))==true){
        while($row = $result->fetch_assoc()){
            $sr_info[0] = $row['employeeid'];
            $sr_info[1] = $row['name'];
            $sr_info[2] = $row['phone'];
            $sr_info[3] = $row['realname'];
            $sr_info[4] = $row['region'];
            $sr_info[5] = $row['quota1'];
            $sr_info[6] = $row['quota2'];
            $sr_info[7] = $row['quota3'];
            $dateArray = getDateList();
            $sr_info[8]= getDateMaskNumBySR($dateArray,$sr_info[1],$conn);
            $sr_info[9] = getDetailSoldMask($sr_info[1],$conn,$sr_info[5],$sr_info[6],$sr_info[7]);
            $info_list[] = $sr_info;
            
        }
        
    }else{
        echo "failed";
    }
    $srInfoList = $info_list;
?>
<?php
include 'conntodb.php';
$sql = "SELECT * FROM ordering WHERE status = 'processing'";
    $result = $conn -> query($sql);
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $odtime = $row["date"];
            $todtime = strtotime($odtime);
            $nodtime = date('Y-m-d H:i:s',$todtime);
            $comtime = $todtime + 24*60*60;
            date_default_timezone_set('PRC');
            $nowtime = strtotime(date('Y-m-d H:i:s'));
            if($nowtime>$comtime){
                $up_sql = "UPDATE ordering SET status = 'completed' WHERE date = '$odtime'";
                $conn->query($up_sql);
            }

        }
    }
    ?>
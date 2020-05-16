<?php
include 'conntodb.php';
$sql = "select * from ordering where status = 'processing'";
    $result = $conn -> query($sql);
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $odtime = $row["date"];
            $todtime = strtotime($odtime);
            $nodtime = date('Y-m-d H:i:s',$todtime);
            // echo $odtime;
            // echo $nodtime;
            $comtime = $todtime + 24*60*60;
            date_default_timezone_set('PRC');
            $nowtime = strtotime(date('Y-m-d H:i:s'));
            // echo "订单时间：".date('Y-m-d H:i:s',$todtime)." 订单时间+30min:".$comtime." 现在时间：".$nowtime." ".date('Y-m-d H:i:s');
            if($nowtime>$comtime){
                $up_sql = "update ordering SET status = 'completed' WHERE date = '$odtime'";
                $conn->query($up_sql);
            }

        }
    }
    ?>
<?php
include 'conntodb.php';
date_default_timezone_set('PRC');
$now_date = date("Y-m-d");
$startdate = '2020-5-10';
function getDateFromRange($startdate, $enddate){
    $stimestamp = strtotime($startdate);
    $etimestamp = strtotime($enddate);
    // 计算日期段内有多少天
    $days = ($etimestamp-$stimestamp)/86400+1;
    // 保存每天日期
    $date = array();
    for($i=0; $i<$days; $i++){
      $date[] = date('Y-m-d', $stimestamp+(86400*$i));
    }
    return $date;
}


function getDateMaskNum($dateArray,$region,$conn){
    $days = count($dateArray);
    $num1 = array();
    $num2 = array();
    $num3 = array();
    for($i=0; $i<$days; $i++){
        $today = $dateArray[$i];
        // $region = array('$region');
        $sql = "select * from ordering where custregion = '$region' and ( datediff ( date , '$today' ) = 0 ) and status in ('processing','completed')";
        $result = $conn->query($sql);
        
        $t1 = 0;
        $t2 = 0;
        $t3 = 0;
        if($result->num_rows >0){
            while($row = $result->fetch_assoc()){
                $t1 += $row['type1'];
                $t2 += $row['type2'];
                $t3 += $row['type3'];
            }
        }
        $num1[] = $t1;
        $num2[] = $t2;
        $num3[] = $t3;

        // $maskNum[] = $num;
    }
    $maskNum = array($num1,$num2,$num3);
    return $maskNum;
}

function getDateAllMaskNum($dateArray,$conn){
    $days = count($dateArray);
    $num1 = array();
    $num2 = array();
    $num3 = array();
    for($i=0; $i<$days; $i++){
        $today = $dateArray[$i];
        // $region = array('$region');
        $sql = "select * from ordering where ( datediff ( date , '$today' ) = 0 )";
        $result = $conn->query($sql);
        
        $t1 = 0;
        $t2 = 0;
        $t3 = 0;
        if($result->num_rows >0){
            while($row = $result->fetch_assoc()){
                $t1 += $row['type1'];
                $t2 += $row['type2'];
                $t3 += $row['type3'];
            }
        }
        $num1[] = $t1;
        $num2[] = $t2;
        $num3[] = $t3;

        // $maskNum[] = $num;
    }
    $maskNum = array($num1,$num2,$num3);
    return $maskNum;
}



?>
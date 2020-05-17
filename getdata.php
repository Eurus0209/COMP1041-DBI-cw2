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

function getDateList(){
    date_default_timezone_set('PRC');
    $enddate = date("Y-m-d");
    $startdate = '2020-5-10';
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

function getDateMaskNumBySR($dateArray,$srname,$conn){
    $days = count($dateArray);
    $num1 = array();
    $num2 = array();
    $num3 = array();
    for($i=0; $i<$days; $i++){
        $today = $dateArray[$i];
        // $srname = array('$srname');
        $sql = "select * from ordering where salerep = '$srname' and ( datediff ( date , '$today' ) = 0 ) and status in ('processing','completed')";
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

function getDetailSoldMask($name,$conn,$quota1,$quota2,$quota3){
    $pro_num1 = 0;
    $pro_num2 = 0;
    $pro_num3 = 0;
    $com_num1 = 0;
    $com_num2 = 0;
    $com_num3 = 0;
    $processing_sql = "SELECT * FROM ordering WHERE salerep = '$name' and status = 'processing'";
    $result = $conn -> query($processing_sql);
    if($result ->num_rows >0){
        while($row = $result->fetch_assoc()){
            $pro_num1 += $row['type1'];
            $pro_num2 += $row['type2'];
            $pro_num3 += $row['type3'];
        }
    }
    $completed_sql = "SELECT * FROM ordering WHERE salerep = '$name' and status = 'completed'";
    $result2 = $conn -> query($completed_sql);
    if($result2 ->num_rows >0){
        while($row = $result->fetch_assoc()){
            $com_num1 += $row['type1'];
            $com_num2 += $row['type2'];
            $com_num3 += $row['type3'];
        }
    }
    $num1 = $pro_num1+$com_num1;
    $num2 = $pro_num2+$com_num2;
    $num3 = $pro_num3+$com_num3;
    $exceed1 = 0;
    $exceed2 = 0;
    $exceed3 = 0;
    $remain1 = $quota1 - $num1;
    $remain2 = $quota2 - $num2;
    $remain3 = $quota3 - $num3;
    if($num1>$quota1){
        $exceed1 = $num1-$quota1;
        $remain1 = 0;
    }
    if($num2>$quota2){
        $exceed2 = $num2-$quota2;
        $remain2 = 0;
    }
    if($num3>$quota3){
        $exceed3 = $num3-$quota3;
        $remain3 = 0;
    }

    $sold_list = array();
    $sold_list[0] = array($com_num1,$pro_num1,$remain1,$exceed1);
    $sold_list[1] = array($com_num2,$pro_num2,$remain2,$exceed2);
    $sold_list[2] = array($com_num3,$pro_num3,$remain3,$exceed3);

    return $sold_list;
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
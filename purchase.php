<?php
    session_start();
    include 'conntodb.php';

    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $num3 = $_POST['num3'];
    $username = $_POST['user'];
    $sr = $_POST['sr'];

    $find_region = "select * from user where name = '$username'";
    $result = $conn->query($find_region);
    $r = $result->fetch_assoc();
    $region = $r['region'];


    date_default_timezone_set('PRC');
    $ordid=substr(date("ymdHis"),2,12).mt_rand(10,99);
    $datetime = date("ymdHis");
    $sales = ($num1+$num2) * 1.0 + $num3 * 1.5;

    $sql = "insert into ordering (orderid, custname, date, totalsales, status,custregion,type1,type2,type3,salerep) values ('$ordid','$username','$datetime','$sales','processing','$region','$num1','$num2','$num3','$sr')";
    // $sql = "insert into pur (num1, num2, num3, username) values ('$num1','$num2','$num3','$username')";
    if($conn->query($sql) === true){
         echo 1;
        
    }else{
        echo 0;
    }

    // if($num1 != 0){
    //     $sale = $num1 * 1.0;
    //     $sql2 = "insert into order1 (orderid, masktype, quantity, sale) values ('$ordid','N95 respirator','$num1','$sale')";
    //     $conn->query($sql2);
    // }
    // if($num2 != 0){
    //     $sale = $num2 * 1.0;
    //     $sql2 = "insert into order1 (orderid, masktype, quantity, sale) values ('$ordid','surgical mask','$num2','$sale')";
    //     $conn->query($sql2);
    // }
    // if($num3 != 0){
    //     $sale = $num3 * 1.5;
    //     $sql2 = "insert into order1 (orderid, masktype, quantity, sale) values ('$ordid','surgical N95 respirator','$num3','$sale')";
    //     $conn->query($sql2);
    // }
?>
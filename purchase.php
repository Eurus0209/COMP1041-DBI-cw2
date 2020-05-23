<?php
    session_start();
    include 'conntodb.php';

    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $num3 = $_POST['num3'];
    $username = $_POST['user'];
    $sr = $_POST['sr'];

    $find_region = "SELECT * FROM customer WHERE custname = '$username'";
    $result = $conn->query($find_region);
    $r = $result->fetch_assoc();
    $region = $r['custregion'];


    date_default_timezone_set('PRC');
    $ordid=substr(date("ymdHis"),2,12).mt_rand(10,99);
    $datetime = date("ymdHis");
    $sales = ($num1+$num2) * 1.0 + $num3 * 1.5;

    $sql = "INSERT INTO ordering (orderid, custname, date, totalsales, status,custregion,type1,type2,type3,srname) VALUES ('$ordid','$username','$datetime','$sales','processing','$region','$num1','$num2','$num3','$sr')";

    if($conn->query($sql) === true){
         echo 1;
    }else{
        echo 0;
    }
?>
<?php
    include 'conntodb.php';
    session_start();
    $pass = $_POST['password'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    if(isset($_SESSION['username'])){
        $ori_name = $_SESSION['username'];
        $up_sql = "UPDATE customer SET password = '$pass', email = '$email', phone='$phone' WHERE custname = '$ori_name'";
    }else{
        $ori_name = $_SESSION['srname'];
        $up_sql = "UPDATE salerep SET password = '$pass', email = '$email', phone='$phone' WHERE srname = '$ori_name'";
    }
     
    
    // $sql = "UPDATE ordering SET status = 'cancelled' WHERE orderid = '$canid'";
    
    if($conn -> query($up_sql) === true){
        echo 1;
    }else{
        echo 0;
    }
?>
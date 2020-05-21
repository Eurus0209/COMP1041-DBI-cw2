<?php
    include 'conntodb.php';
    session_start();
    if(isset($_SESSION['username'])){
        $ori_name = $_SESSION['username'];
    }else{
        $ori_name = $_SESSION['srname'];
    }
     
    $name = $_POST['name'];
    $pass = $_POST['password'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    // $sql = "UPDATE ordering SET status = 'cancelled' WHERE orderid = '$canid'";
    $up_sql = "UPDATE user SET name = '$name', password = '$pass', email = '$email', phone='$phone' WHERE name = '$ori_name'";
    $conn -> query($up_sql);

    if(isset($_SESSION['username'])){
        $_SESSION['username'] = $name;
        // $ori_name = $_SESSION['username'];
    }else{
        $_SESSION['srname'] = $name;
        
        // $ori_name = $_SESSION['srname'];
    }
?>
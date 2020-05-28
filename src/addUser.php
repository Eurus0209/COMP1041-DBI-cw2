<?php
    // This file will add user into database
    include 'conntodb.php';
    $name = $_POST['name'];
    $realname = $_POST['realname'];
    $id = $_POST['id'];
    $pass = $_POST['pass'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $region = $_POST['region'];
    $role = $_POST['role'];
    if($role ==2){
        $q1 = $_POST['quota1'];
        $q2 = $_POST['quota2'];
        $q3 = $_POST['quota3'];
    }
    

    if($role == 2){
        $sql = "INSERT INTO salerep (srname, phone, email, password, srregion,employeeid, realname, quota1, quota2, quota3) VALUES ('$name','$phone','$email','$pass','$region','$id','$realname','$q1','$q2','$q3')";
    }else{
        $sql = "INSERT INTO customer (custname, phone, email, password, custregion,passportid, realname) VALUES ('$name','$phone','$email','$pass','$region','$id','$realname')";
    }

    if($conn->query($sql)==true){
        echo 1;
    }else{
        echo 0;
    }
    
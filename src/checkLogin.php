<?php
    include 'conntodb.php';
    session_start();
    $name = $_POST["name"];
    $pass = $_POST["password"];

    $sql = "SELECT * FROM customer WHERE custname = '$name' AND password ='$pass'";
    $rs = $conn->query($sql);
    if($rs->num_rows ==0){
        $sql = "SELECT * FROM salerep WHERE srname = '$name' AND password ='$pass'";
        $rs = $conn->query($sql);
        if($rs->num_rows ==0){
            $sql = "SELECT * FROM manager WHERE maname = '$name' AND password ='$pass'";
            $rs = $conn->query($sql);
            if($rs->num_rows ==0){
                echo 4;
            }else{
                $_SESSION['manager'] = $name;
                echo 3;
            }
        }else{
            $_SESSION['srname'] = $name;
            echo 2;
        }
    }else{
        $_SESSION['username'] = $name;
        echo 1;
    }
    

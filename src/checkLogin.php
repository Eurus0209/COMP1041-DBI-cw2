<?php
// response ajax reuqest of login, check what role is trying to login 
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
                // manager login
                $_SESSION['manager'] = $name;
                echo 3;
            }
        }else{
            // sale rep login
            $_SESSION['srname'] = $name;
            echo 2;
        }
    }else{
        // customer login
        $_SESSION['username'] = $name;
        echo 1;
    }
    

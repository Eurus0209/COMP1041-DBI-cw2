<?php
    // check if username is repeat
    // if repeat return 1 else return 0
    include 'conntodb.php';
    $name = $_POST['name'];
    $sql = "SELECT * FROM customer WHERE custname = '$name'";
    $result = $conn -> query($sql);
    if($result->num_rows>0){
        echo 1;
    }else{
        $sql = "SELECT * FROM salerep WHERE srname = '$name'";
        $result = $conn -> query($sql);
        if($result->num_rows>0){
            echo 1;
        }else{
            $sql = "SELECT * FROM manager WHERE maname = '$name'";
            $result = $conn -> query($sql);
            if($result->num_rows>0){
                echo 1;
            }else{
                echo 0;
            }
        }
    }

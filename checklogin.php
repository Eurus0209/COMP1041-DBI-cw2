<?php
    include 'conntodb.php';
    session_start();
    $name = $_POST["name"];
    $pass = $_POST["password"];

    $sql = "select * from user where name ='$name' and password = '$pass'";
    if(($rs = $conn->query($sql))===false){
        echo 4;
    }
    else if($rs->num_rows ==1 ){
        $result = $rs ->fetch_assoc();
        if($result['role']==1){
            $_SESSION['username'] = $name;
            echo 1;
        }else if ($result['role']== 2){
            $_SESSION['srname'] = $name;
            echo 2;
        }else if ($result['role']== 3){
            $_SESSION['manager'] = $name;
            echo 3;
        }
    }else{
        echo 4;
    }
    
?>
<?php
    include 'conntodb.php';
    $name = $_POST['name'];
    $sql = "SELECT * FROM customer WHERE custname = '$name'";
    $flag = 0;
    $result = $conn->query($sql);
    if($result->num_rows==0){
        $sql = "SELECT * FROM salerep WHERE srname = '$name'";
        $result = $conn->query($sql);
        $flag = 1;
    }
    $row = $result->fetch_assoc();
    $list = array();
    $list[] = $row['realname'];
    $list[] = $row['email'];
    $list[] = $row['phone'];
    if($flag == 1){
        $list[] = $row['employeeid'];
    }else{
        $list[] = $row['passportid'];
    }
    

    $json_list = json_encode($list);
    
    echo $json_list;
?>
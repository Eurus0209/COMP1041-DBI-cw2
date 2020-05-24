<?php
    include 'conntodb.php';
    $name = $_POST['name'];
    $sql = "SELECT * FROM customer WHERE custname = '$name'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $list = array();
    $list[] = $row['realname'];
    $list[] = $row['email'];
    $list[] = $row['phone'];
    $list[] = $row['passportid'];

    $json_list = json_encode($list);
    
    echo $json_list;
?>
<?php
    include 'conntodb.php';
    $srname = $_POST['name'];
    $type = $_POST['type'];
    $value = $_POST['value'];

    $sql = "UPDATE user SET ".$type."= '$value' WHERE name = '$srname'";
    if($conn->query($sql)===true){
        echo 1;
    }else{
        echo 0;
    }
?>
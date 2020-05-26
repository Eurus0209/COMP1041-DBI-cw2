<?php
    include 'conntodb.php';
    $srname = $_POST['name'];
    $type = $_POST['type'];
    $value = $_POST['value'];

    $sql = "UPDATE salerep SET ".$type."= '$value' WHERE srname = '$srname'";
    if($conn->query($sql)===true){
        echo 1;
    }else{
        echo 0;
    }
?>
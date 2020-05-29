<?php
// update quota for manager
    include 'conntodb.php';
    $name = $_POST['name'];
    $q1 = $_POST['quota1'];
    $q2 = $_POST['quota2'];
    $q3 = $_POST['quota3'];
    $region = $_POST['region'];

    
    $sql = "UPDATE salerep SET quota1 = '$q1',quota2 = '$q2',quota3 = '$q3',srregion='$region' WHERE srname = '$name' ";
    if($conn->query($sql)==true){
        echo 1;
    }else{
        echo 0;
    }
?>
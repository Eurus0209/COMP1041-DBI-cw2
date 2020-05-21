<?php
    include 'conntodb.php';
    $name = $_POST['name'];
    $q1 = $_POST['quota1'];
    $q2 = $_POST['quota2'];
    $q3 = $_POST['quota3'];
    $region = $_POST['region'];

    $sql = "UPDATE user SET quota1 = '$q1',quota2 = '$q2',quota3 = '$q3',region='$region' WHERE name = '$name' ";
    if($conn->query($sql)==true){
        echo 1;
    }
?>
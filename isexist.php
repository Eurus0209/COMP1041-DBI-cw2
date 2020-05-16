<?php
    include 'conntodb.php';
    $name = $_POST['name'];
    $sql = "SELECT * FROM user WHERE name = '$name'";
    $result = $conn -> query($sql);
    if($result->num_rows>0){
        echo 1;
    }else{
        echo 2;
    }
?>
<?php
    $servername = "localhost";
    $username = "shyhl11";
    $password = "mysql";
    $dbname = "shyhl11";

    $conn = new mysqli($servername,$username,$password, $dbname);

    if($conn->connect_error){
        die("Database access failed.");
    }
?>

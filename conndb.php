<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "dbitry";

    $conn = new mysqli($servername,$username,$password, $dbname);

    if($conn->connect_error){
        die("Database access failed.");
    }
?>
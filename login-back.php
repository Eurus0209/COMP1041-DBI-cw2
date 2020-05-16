<!-- <script src="https://cdn.bootcdn.net/ajax/libs/sweetalert/2.1.1/sweetalert.min.js"></script> -->
<head>
<script src="js/jquery-1.12.3.js"></script>
<script src = "js/sweetalert.js"> </script>
</head>

<?php
    session_start();
    include 'conntodb.php';

    $name = $_POST["username"];
    $pass = $_POST["password"];

    $sql = "select * from user where name ='$name' and password = '$pass'";
    $rs = $conn->query($sql);
    if($rs->num_rows >0 ){
        $result = $rs ->fetch_assoc();
        if($result['role']==1){
            $_SESSION['username'] = $name;
            echo '<script>window.location.href = "index.php";</script>';
        }else if ($result['role']== 2){
            $_SESSION['srname'] = $name;
            echo '<script>window.location.href = "salerep.php";</script>';
        } 
    }else{
        echo '<script>alert("Username or Password is wrong!"); history.go(-1);</script>';
    }
?>
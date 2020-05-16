<?php
    // session_start();
    $name = $_POST["username"];
    $phone = $_POST["telephone"];
    $email = $_POST["email"];
    $pass = $_POST["password1"];
    $region = $_POST["region"];
    $realname = $_POST["realname"];
    $passid = $_POST["passportid"];

    // if (isset($_SESSION['username'])){
    //     echo '<script>alert("false");history.go(-1);</script>';
    //     exit(0);
    // }else{
    //     $_SESSION['username'] = "abc";
    //     echo '<script>alert("gggg");window.location.href = "index.php";</script>';
    // }
    // echo "region:".$region;

    // $servername = "localhost";
    // $username = "root";
    // $password = "";
    // $dbname = "dbitry";

    // $conn = new mysqli($servername,$username,$password, $dbname);

    // if($conn->connect_error){
    //     die("Database access failed.");
    // }
    include 'conntodb.php';
    $check_sql = "select * from user where name = '$name'";
    $result = $conn->query($check_sql);
    if($result->num_rows!=0){
        echo '<script>alert("Username already exist!");history.go(-1);</script>';
    }else{
        $sql = "insert into user (name, phone, email, password, Region,passportid, realname, role) values ('$name','$phone','$email','$pass','$region','$passid','$realname',1)";
        if($conn->query($sql) === true){
            // echo "added.";
            // $_SESSION['username']="abc";
            echo '<script>window.location.href = "login.php";</script>';
        }else{
            echo "add failed";
        }

        $conn->close();
    }
    
?>
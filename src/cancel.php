<?php
// this file is used to cancel orderings for users or manager
include 'conntodb.php';
$canid = $_POST['ordid'];
$sql = "UPDATE ordering SET status = 'cancelled' WHERE orderid = '$canid'";
if($conn->query($sql) === true){
    echo 1;
}else{
    echo 0;
}

<?php
    include 'conntodb.php';
    // echo '<script>console.log("here")</script>';
    // echo '<script>window.location.href="index.php"</script>';
    $canid = $_POST['ordid'];
    // echo '$can_id';
    $sql = "UPDATE ordering SET status = 'cancelled' WHERE orderid = '$canid'";
    if($conn->query($sql) === true){
        // echo '<script>window.location.herf="index.php"</script>';
    }else{
        // echo '<script>console.log("wrong")</script>';
    }
?>
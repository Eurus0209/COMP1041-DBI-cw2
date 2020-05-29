<?php
    include 'conntodb.php';
    include 'printTableFunction.php';
    $region = $_POST['region'];
    $status = $_POST['status'];
    $sdate = $_POST['sdate'];
    $edate = $_POST['edate'];

    // create sql statement for different condition
    if($region=="All " && $status=="All "){
        $sql = "SELECT * FROM ordering WHERE date BETWEEN '$sdate' AND '$edate'";
    }else if($region=="All "){
        $sql = "SELECT * FROM ordering WHERE status = '$status' AND date BETWEEN '$sdate' AND '$edate'";
    }else if($status=="All "){
        $sql = "SELECT * FROM ordering WHERE custregion = '$region' AND date BETWEEN '$sdate' AND '$edate'";
    }else{
        $sql = "SELECT * FROM ordering WHERE status = '$status' AND custregion = '$region' AND date BETWEEN '$sdate' AND '$edate'";
    }

    // get string that need to be printed
    $str = print_table_ma_order($sql,$conn);
    echo $str;
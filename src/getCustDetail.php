<?php
// get all of quantity of each mask for customer
    include 'conntodb.php';
    $name = $_POST['name'];
    $sql = "SELECT * FROM ordering WHERE custname = '$name'";
    $result = $conn->query($sql);
    $ordering_num = $result->num_rows;
    $amount_array = array(0,0,0);
    if($ordering_num >0){
        while($row = $result->fetch_assoc()){
            $amount_array[0]+=$row['type1'];
            $amount_array[1]+=$row['type2'];
            $amount_array[2]+=$row['type3'];
        }
    }

    $return_arr = array($ordering_num,$amount_array);
    $json_arr = json_encode($return_arr);

    echo $json_arr;
?>
<?php
// function print_table($find_sql, $conn, $user){
//         // $find_sql = "select * from order2 where username = '$user_name'";
//         $result = $conn -> query($find_sql);
//         $td = "";
//         if($result->num_rows > 0){
            
//             while($row = $result->fetch_assoc()){
//                 $ordid = $row["orderid"];
//                 $sql = "select * from order1 where orderid = '$ordid'";
//                 $types_list = $conn -> query($sql);
//                 $num_type = $types_list ->num_rows;

//                 $td = $td."<tr> <th rowspan='$num_type'>".$row["orderid"]."</th>";
//                 $td = $td."<td rowspan='$num_type'>" .$row["date"]."</td>";
//                 $td = $td."<td rowspan='$num_type'>" .$user ."</td>";

//                 $type_first = $types_list->fetch_assoc();
//                 $td = $td."<td>".$type_first["masktype"]."</td>";
//                 $td = $td."<td>".$type_first["quantity"]."</td>";
//                 $td = $td."<td> $".number_format($type_first["sale"], 2)."</td>";

//                 // echo $types_list;
                
//                 $td = $td."<td rowspan='$num_type'> $".number_format($row["sales"], 2)."</td>";
//                 $td = $td."<td>".$row["status"]."</td> </tr>";

//                 while( $type_other = $types_list->fetch_assoc()){
//                     $td = $td."<tr> <td>".$type_other["masktype"]."</td>";
//                     $td = $td."<td>".$type_other["quantity"]."</td>";
//                     $td = $td."<td> $".number_format($type_other["sale"], 2)."</td> </tr>";
//                 }
//             }
//         }
//         return $td;
//     }
    function print_table($find_sql, $conn){
        // $find_sql = "select * from order2 where username = '$user_name'";
        // include 'conntodb.php';
        $result = $conn -> query($find_sql);
        $td = "";
        if($result->num_rows > 0){
            
            while($row = $result->fetch_assoc()){
                // $ordid = $row["orderid"];
                // $sql = "select * from ordering where orderid = '$ordid'";
                $num1 = $row['type1'];
                $num2 = $row['type2'];
                $num3 = $row['type3'];
                $num_type = 0;
                // if($num1>0){
                //     $num_type++;
                // }
                // if($num2>0){
                //     $num_type++;
                // }
                // if($num3>0){
                //     $num_type++;
                // }
                // $types_list = $conn -> query($sql);
                // $num_type = $types_list ->num_rows;

                $td = $td."<tr> <th rowspan=3>".$row["orderid"]."</th>";
                $td = $td."<td rowspan=3>" .$row["date"]."</td>";
                $td = $td."<td rowspan=3>" .$row['custname'] ."</td>";

                // $type_first = $types_list->fetch_assoc();

                $td = $td."<td>"."N95 respirator"."</td>";
                $td = $td."<td>".$row['type1']."</td>";
                $td = $td."<td> $".number_format($row['type1'], 2)."</td>";

                // echo $types_list;
                
                $td = $td."<td rowspan=3> $".number_format($row["totalsales"], 2)."</td>";
                $td = $td."<td>".$row["status"]."</td> </tr>";

                // while( $type_other = $types_list->fetch_assoc()){
                //     $td = $td."<tr> <td>".$type_other["masktype"]."</td>";
                //     $td = $td."<td>".$type_other["quantity"]."</td>";
                //     $td = $td."<td> $".number_format($type_other["sale"], 2)."</td> </tr>";
                // }
                $td = $td."<tr> <td>"."surgical mask"."</td>";
                $td = $td."<td>".$row['type2']."</td>";
                $td = $td."<td> $".number_format($row['type2'], 2)."</td> </tr>";
                $td = $td."<tr> <td>"."surgical N95 respirator"."</td>";
                $td = $td."<td>".$row['type3']."</td>";
                $td = $td."<td> $".number_format($row['type3']*1.5, 2)."</td> </tr>";
                
            }
        }
        return $td;
    }

    ?>
<?php
function print_table2($find_sql, $conn){
        // $find_sql = "select * from order2 where username = '$user_name'";
        // include 'conntodb.php';
        $result = $conn -> query($find_sql);
        $td = "";
        if($result->num_rows > 0){
            
            while($row = $result->fetch_assoc()){
                $num1 = $row['type1'];
                $num2 = $row['type2'];
                $num3 = $row['type3'];
                $num_type = 0;

                $td = $td."<tr> <th rowspan=3 class = 'ord-id'>".$row["orderid"]."</th>";
                $td = $td."<td rowspan=3>" .$row["date"]."</td>";
                $td = $td."<td rowspan=3>" .$row['custname'] ."</td>";

                // $type_first = $types_list->fetch_assoc();

                $td = $td."<td>"."N95 respirator"."</td>";
                $td = $td."<td>".$row['type1']."</td>";
                $td = $td."<td> $".number_format($row['type1'], 2)."</td>";

                // echo $types_list;
                
                $td = $td."<td rowspan=3> $".number_format($row["totalsales"], 2)."</td>";
                $td = $td."<td>  <button class = 'cancel-btn'>cancel</button> </td> </tr>";

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
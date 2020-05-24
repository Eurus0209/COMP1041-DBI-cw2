<?php
function print_table_formanager_processing($find_sql, $conn){
        $result = $conn -> query($find_sql);
        $td = "";
        if($result->num_rows > 0){
            $count = 0;
            while($row = $result->fetch_assoc()){
                $count++;
                if($count%2==0){
                    $classname = "bg1";
                }else{
                    $classname = "bg2";
                }
                $num1 = $row['type1'];
                $num2 = $row['type2'];
                $num3 = $row['type3'];
                $num_type = 0;
                $td = $td."<tr class='".$classname."'> <th rowspan=3 class = 'ord-id'>".$row["orderid"]."</th>";
                $td = $td."<td rowspan=3>" .$row["date"]."</td>";
                $td = $td."<td rowspan=3>" .$row['custname'] ."</td>";
                $td = $td."<td rowspan=3>" .$row['srname'] ."</td>";
                $td = $td."<td>"."N95 respirator"."</td>";
                $td = $td."<td>".$row['type1']."</td>";
                $td = $td."<td> $".number_format($row['type1'], 2)."</td>";
                
                $td = $td."<td rowspan=3> $".number_format($row["totalsales"], 2)."</td>";
                $td = $td."<tr class='".$classname."'> <td>"."surgical mask"."</td>";
                $td = $td."<td>".$row['type2']."</td>";
                $td = $td."<td> $".number_format($row['type2'], 2)."</td> </tr>";
                $td = $td."<tr class='".$classname."'> <td>"."surgical N95 respirator"."</td>";
                $td = $td."<td>".$row['type3']."</td>";
                $td = $td."<td> $".number_format($row['type3']*1.5, 2)."</td> </tr>";
            }
        }
        return $td;
    }
    function print_table_user_ordering($find_sql, $conn){
        $result = $conn -> query($find_sql);
        $td = "";
        if($result->num_rows > 0){
            $count = 0;
            while($row = $result->fetch_assoc()){
                $count++;
                if($count%2==0){
                    $classname = "bg1";
                }else{
                    $classname = "bg2";
                }
                $num1 = $row['type1'];
                $num2 = $row['type2'];
                $num3 = $row['type3'];
                $num_type = 0;

                $td = $td."<tr class='".$classname."'> <th rowspan=3>".$row["orderid"]."</th>";
                $td = $td."<td rowspan=3>" .$row["date"]."</td>";
                $td = $td."<td rowspan=3>" .$row["srname"]."</td>";

                $td = $td."<td>"."N95 respirator"."</td>";
                $td = $td."<td>".$row['type1']."</td>";
                $td = $td."<td> $".number_format($row['type1'], 2)."</td>";
                
                $td = $td."<td rowspan=3> $".number_format($row["totalsales"], 2)."</td>";
                $td = $td."<td rowspan=3>".$row["status"]."</td> </tr>";
                $td = $td."<tr class='".$classname."'> <td>"."surgical mask"."</td>";
                $td = $td."<td>".$row['type2']."</td>";
                $td = $td."<td> $".number_format($row['type2'], 2)."</td> </tr>";
                $td = $td."<tr class='".$classname."'> <td>"."surgical N95 respirator"."</td>";
                $td = $td."<td>".$row['type3']."</td>";
                $td = $td."<td> $".number_format($row['type3']*1.5, 2)."</td> </tr>";
                
            }
        }
        return $td;
    }
    function print_table($find_sql, $conn){
        $result = $conn -> query($find_sql);
        $td = "";
        if($result->num_rows > 0){
            $count = 0;
            while($row = $result->fetch_assoc()){
                $count++;
                if($count%2==0){
                    $classname = "bg1";
                }else{
                    $classname = "bg2";
                }
                $num1 = $row['type1'];
                $num2 = $row['type2'];
                $num3 = $row['type3'];
                $num_type = 0;

                $td = $td."<tr class='".$classname."'> <th rowspan=3>".$row["orderid"]."</th>";
                $td = $td."<td rowspan=3>" .$row["date"]."</td>";
                $td = $td."<td rowspan=3>" .$row['custname'] ."</td>";
                $td = $td."<td>"."N95 respirator"."</td>";
                $td = $td."<td>".$row['type1']."</td>";
                $td = $td."<td> $".number_format($row['type1'], 2)."</td>";

                $td = $td."<td rowspan=3> $".number_format($row["totalsales"], 2)."</td>";
                $td = $td."<td rowspan=3>".$row["status"]."</td> </tr>";

                $td = $td."<tr class='".$classname."'> <td>"."surgical mask"."</td>";
                $td = $td."<td>".$row['type2']."</td>";
                $td = $td."<td> $".number_format($row['type2'], 2)."</td> </tr>";
                $td = $td."<tr class='".$classname."'> <td>"."surgical N95 respirator"."</td>";
                $td = $td."<td>".$row['type3']."</td>";
                $td = $td."<td> $".number_format($row['type3']*1.5, 2)."</td> </tr>";
                
            }
        }
        return $td;
    }
    function print_table2($find_sql, $conn){
        $result = $conn -> query($find_sql);
        $td = "";
        if($result->num_rows > 0){
            $count = 0;
            while($row = $result->fetch_assoc()){
                $count++;
                if($count%2==0){
                    $classname = "bg1";
                }else{
                    $classname = "bg2";
                }
                $num1 = $row['type1'];
                $num2 = $row['type2'];
                $num3 = $row['type3'];
                $num_type = 0;

                $td = $td."<tr class='".$classname."'> <th rowspan=3 class = 'ord-id'>".$row["orderid"]."</th>";
                $td = $td."<td rowspan=3>" .$row["date"]."</td>";
                $td = $td."<td rowspan=3>" .$row['custname'] ."</td>";

                $td = $td."<td>"."N95 respirator"."</td>";
                $td = $td."<td>".$row['type1']."</td>";
                $td = $td."<td> $".number_format($row['type1'], 2)."</td>";
                
                $td = $td."<td rowspan=3> $".number_format($row["totalsales"], 2)."</td>";
                $td = $td."<td rowspan=3>  <button class = 'cancel-btn'>cancel</button> </td> </tr>";
                $td = $td."<tr class='".$classname."'> <td>"."surgical mask"."</td>";
                $td = $td."<td>".$row['type2']."</td>";
                $td = $td."<td> $".number_format($row['type2'], 2)."</td> </tr>";
                $td = $td."<tr class='".$classname."'> <td>"."surgical N95 respirator"."</td>";
                $td = $td."<td>".$row['type3']."</td>";
                $td = $td."<td> $".number_format($row['type3']*1.5, 2)."</td> </tr>";
                
            }
        }
        return $td;
    }
    ?>
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
                $td = $td."<td rowspan=3> <button class='custname-btn' 
                data-toggle='modal' data-target='#staticBackdrop' value ='" .$row['custname'] ."'> " .$row['custname'] ."</button></td>";
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

    function print_table_ma_order($sql,$conn){
        $result = $conn -> query($sql);
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
                $td = $td."<td rowspan=3> <input type='button' data-toggle='modal' data-target='#userModal' class='cname-btn' value='".$row['custname']."'></td>";
                $td = $td."<td rowspan=3> <input type='button' data-toggle='modal' data-target='#srModal' class='srname-btn' value='" .$row['srname'] ."'></td>";
                $td = $td."<td rowspan=3>" .$row['custregion'] ."</td>";
                $td = $td."<td>"."N95 respirator"."</td>";
                $td = $td."<td>".$row['type1']."</td>";
                $td = $td."<td> $".number_format($row['type1'], 2)."</td>";
                
                $td = $td."<td rowspan=3> $".number_format($row["totalsales"], 2)."</td>";
                $td = $td."<td rowspan=3> ".$row['status']." </td> </tr>";
                $td = $td."<tr class='".$classname."'> <td>"."surgical mask"."</td>";
                $td = $td."<td>".$row['type2']."</td>";
                $td = $td."<td> $".number_format($row['type2'], 2)."</td> </tr>";
                $td = $td."<tr class='".$classname."'> <td>"."surgical-N95 "."</td>";
                $td = $td."<td>".$row['type3']."</td>";
                $td = $td."<td> $".number_format($row['type3']*1.5, 2)."</td> </tr>";
                
            }
            $td = $td.'<script>
            $(".cname-btn").on("click",function(){
                console.log(1);
                var name = $(this).val();
                $.ajax({
                    type:"post",
                    url: "sr_getcustinfo.php",
                    data: {
                        name: name
                    },success: function(msg) {
                        var data = eval("(" + msg+ ")");
                        console.log( data[1]);
                        $(".name-info").text(name);
                        $(".realname-info").text(data[0]);
                        $(".email-info").text(data[1]);
                        $(".phone-info").text(data[2]);
                        $(".id-info").text(data[3]);
                    }
                })
            })
            $(".srname-btn").on("click",function(){
                console.log(1);
                var name = $(this).val();
                $.ajax({
                    type:"post",
                    url: "sr_getcustinfo.php",
                    data: {
                        name: name
                    },success: function(msg) {
                        var data = eval("(" + msg+ ")");
                        console.log( data[1]);
                        $(".name-info").text(name);
                        $(".realname-info").text(data[0]);
                        $(".email-info").text(data[1]);
                        $(".phone-info").text(data[2]);
                        $(".id-info").text(data[3]);
                    }
                })
            })
            </script>';
        }
        return $td;
    }

    function print_table_region_total($total1,$total2,$total3){
        $totalStr = '<div class="region-total-table" style ="display:inline-block"><table class="table">
        <tr>
            <th></th>
            <th>Quantity</th>
            <th>Revenue</th>
        </tr>
        <tr>
            <th>N95 respirator</th>
            <td id="t1">'.$total1.'</td>
            <td>$'.number_format($total1,2).'</td>
        </tr>
        <tr>
            <th>Surgial mask</th>
            <td>'.$total2.'</td>
            <td>$'.number_format($total2,2).'</td>
        </tr>
        <tr>
            <th>N95 surgial</th>
            <td>'.$total3.'</td>
            <td>$'.number_format($total3*1.5,2).'</td>
        </tr>
    </table>
    </div>';
    return $totalStr;
    }
    ?>
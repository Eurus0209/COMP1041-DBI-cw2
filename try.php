<?php
    include 'conntodb.php';
    date_default_timezone_set('PRC');
    $now_date = date("Y-m-d");
    $startdate = '2020-5-10';
    function getDateFromRange($startdate, $enddate){
        $stimestamp = strtotime($startdate);
        $etimestamp = strtotime($enddate);
        // 计算日期段内有多少天
        $days = ($etimestamp-$stimestamp)/86400+1;
        // 保存每天日期
        $date = array();
        for($i=0; $i<$days; $i++){
          $date[] = date('Y-m-d', $stimestamp+(86400*$i));
        }
        return $date;
    }

    // $date = getDateFromRange($startdate,$now_date);

    // function getDateMaskNum($dateArray,$region,$conn){
    //     $days = count($dateArray);
    //     $maskNum = array();
    //     for($i=0; $i<$days; $i++){
    //         $today = $dateArray[$i];
    //         $sql = "select * from ordering where custregion = '$region' and ( datediff ( date , '$today' ) = 0 )";
    //         $result = $conn->query($sql);
    //         $num = array(0,0,0);
    //         if($result->num_rows >0){
                
    //             while($row = $result->fetch_assoc()){
    //                 $num[0] += $row['type1'];
    //                 $num[1] += $row['type2'];
    //                 $num[2] += $row['type3'];
    //             }
                
    //         }
    //         $maskNum[] = $num;
    //     }
    //     return $maskNum;
    // }
    function getDateMaskNum($dateArray,$region,$conn){
        $days = count($dateArray);
        $num1 = array();
        $num2 = array();
        $num3 = array();
        for($i=0; $i<$days; $i++){
            $today = $dateArray[$i];
            $sql = "select * from ordering where custregion = '$region' and ( datediff ( date , '$today' ) = 0 )";
            $result = $conn->query($sql);
            
            $t1 = 0;
            $t2 = 0;
            $t3 = 0;
            if($result->num_rows >0){
                while($row = $result->fetch_assoc()){
                    $t1 += $row['type1'];
                    $t2 += $row['type2'];
                    $t3 += $row['type3'];
                }
            }
            $num1[] = $t1;
            $num2[] = $t2;
            $num3[] = $t3;

            // $maskNum[] = $num;
        }
        $maskNum = array($num1,$num2,$num3);
        return $maskNum;
    }
    // $arr = getDateMaskNum($date,'China',$conn);
    // $json_num = json_encode($arr);
    // $json_date = json_encode($date);

    // var china_num = <?php echo $json_num ;?>;
    // var dateinfo = <?php echo $json_date ;?>;
    // var data = getData(dateinfo,china_num);

    // function getData(dateinfo, numinfo){
    //     var date = [];
    //     var type1 = [];
    //     var type2 = [];
    //     var type3 = [];
    //     for(var i=0; i<5; i++){
    //         date.push(dateinfo[i].substr(5));
    //         type1.push(numinfo[0][i]);
    //         type2.push(numinfo[1][i]);
    //         type3.push(numinfo[2][i]);
    //     }
    //     return {
    //         date:date,
    //         type1: type1,
    //         type2: type2,
    //         type3: type3
    //     }
    // }

    // print_r($arr);


    

    
    // $username = $user['name'];
                                        // $find_sql = "select * from order2 where username = '$username' and status = 'processing'";
                                        // // $td = print_table($find_sql, $conn, $username);
                                        // $result = $conn -> query($find_sql);
                                        // $td = "";
                                        // if($result->num_rows > 0){
                                            
                                        //     while($row = $result->fetch_assoc()){
                                        //         $ordid = $row["orderid"];
                                        //         $sql = "select * from order1 where orderid = '$ordid'";
                                        //         $types_list = $conn -> query($sql);
                                        //         $num_type = $types_list ->num_rows;

                                        //         $td = $td."<tr> <th rowspan='$num_type'>".$row["orderid"]."</th>";
                                        //         $td = $td."<td rowspan='$num_type'>" .$row["date"]."</td>";
                                        //         $td = $td."<td rowspan='$num_type'>" .$username ."</td>";

                                        //         $type_first = $types_list->fetch_assoc();
                                        //         $td = $td."<td>".$type_first["masktype"]."</td>";
                                        //         $td = $td."<td>".$type_first["quantity"]."</td>";
                                        //         $td = $td."<td> $".number_format($type_first["sale"], 2)."</td>";

                                        //         // echo $types_list;
                                                
                                        //         $td = $td."<td rowspan='$num_type'> $".number_format($row["sales"], 2)."</td>";
                                        //         $td = $td."<td>  <button class = 'cancel-btn'>cancel</button> </td> </tr>";

                                        //         while( $type_other = $types_list->fetch_assoc()){
                                        //             $td = $td."<tr> <td>".$type_other["masktype"]."</td>";
                                        //             $td = $td."<td>".$type_other["quantity"]."</td>";
                                        //             $td = $td."<td> $".number_format($type_other["sale"], 2)."</td> </tr>";
                                        //         }
                                        //     }
                                        // }
                                        // echo $td;
                                        // echo "hhhh";
?>
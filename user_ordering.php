<?php
    session_start();
    include 'check_iscomplete.php';
    include 'conntodb.php';
    $user_name = $_SESSION['username'];

    
    // $sql = "select * from ordering where status = 'processing'";
    // $result = $conn -> query($sql);
    // if($result->num_rows > 0){
    //     while($row = $result->fetch_assoc()){
    //         $odtime = $row["date"];
    //         $todtime = strtotime($odtime);
    //         $nodtime = date('Y-m-d H:i:s',$todtime);
    //         // echo $odtime;
    //         // echo $nodtime;
    //         $comtime = $todtime + 24*60*60;
    //         date_default_timezone_set('PRC');
    //         $nowtime = strtotime(date('Y-m-d H:i:s'));
    //         // echo "订单时间：".date('Y-m-d H:i:s',$todtime)." 订单时间+30min:".$comtime." 现在时间：".$nowtime." ".date('Y-m-d H:i:s');
    //         if($nowtime>$comtime){
    //             $up_sql = "update ordering SET status = 'completed' WHERE date = '$odtime'";
    //             $conn->query($up_sql);
    //         }

    //     }
    // }

    function print_table($find_sql, $conn){
        // $find_sql = "select * from order2 where username = '$user_name'";
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
                $td = $td."<td rowspan=3>" .$row["salerep"]."</td>";

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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ordering</title>
</head>
<script src="js/jquery-1.12.3.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src = "js/sweetalert.js"> </script>
    <style>
        .total-box{
            width : 85%;
            margin: 10vh auto;
            /* margin-top: 10vh; */
            
        }
        .user-ordering-table{
            width: 90%;
            margin: 0 auto;
            /* margin-top: 10vh; */
        }
        .ordering-table{
            align : center;
            font-size: 14px;
            /* height : 18px; */
            margin: 1vh auto;
            
        }
        .ordering-table tr th,
        .ordering-table tr td{
            /* height : 20px; */
            padding: 7px;
            text-align : center;
        }

        .cancel-btn{
            border: none;
            border-radius: 4px;
            height:25px;
            width: 90px;
            background-color:#eee;
            margin: 0;
        }

        .cancel-btn:hover{
            background-color: rgb(250, 250, 250);
            transition: ease-in-out .2s;
        }

        .cancel-btn:active{
            box-shadow: 0 0 0;
            border: 0 ;
        }

        .nav-link{
            color: black;
        }

        .nav-link:hover{
            /* background-color::#525c70; */
            color:#525c70;
        }
        .nav-link.active{
            /* background-color:#525c70; */
        }
        .nav-pills .nav-link.active{

            background-color: #525c70;
            border-radius: 0;
        }
        .right-side{
            /* border:1px 1px 0px 0px solid black; */
            border-top: .5px solid #525c70;
            /* border-bottom: .5px solid #525c70; */
        }

    </style>
<body>
    <?php
        include "nav-after.php";
    ?>
    <div class="total-box">
        <div class="row">
            <div class="col-2 no-pad">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">All</a>
                <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Processing</a>
                <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Completed</a>
                <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Cancelled</a>
                <a class="nav-link" id="edit-ordering-tab" data-toggle="pill" href="#edit-ordering" role="tab" aria-controls="edit-ordering" aria-selected="false">Edit</a>
                </div>
            </div>
            <div class="col-10 no-pad">
                <div class="tab-content right-side" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                    <div class="user-ordering-table">
                        <table class="table ordering-table">
                            <thead>
                            <tr>
                                <th >Ord-ID</th>
                                <th >Date</th>
                                <th >Sale Rep</th>
                                <th >Mask Types</th>
                                <th >Quantity</th>
                                <th >Sales</th>
                                <th >Total Sales</th>
                                <th >Status </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                $find_sql = "select * from ordering where custname = '$user_name'";
                                $td = print_table($find_sql,$conn);
                                echo $td;
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                    <div class="user-ordering-table">
                        <table class="table ordering-table">
                            <thead>
                            <tr>
                                <th >Ord-ID</th>
                                <th >Date</th>
                                <th >Sale Rep</th>
                                <th >Mask Types</th>
                                <th >Quantity</th>
                                <th >Sales</th>
                                <th >Total Sales</th>
                                <th >Status </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                $find_sql = "select * from ordering where custname = '$user_name' and status = 'processing'";
                                $td = print_table($find_sql,$conn);
                                echo $td;
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                    <div class="user-ordering-table">
                        <table class="table ordering-table">
                            <thead>
                            <tr>
                                <th >Ord-ID</th>
                                <th >Date</th>
                                <th >Sale Rep</th>
                                <th >Mask Types</th>
                                <th >Quantity</th>
                                <th >Sales</th>
                                <th >Total Sales</th>
                                <th >Status </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                $find_sql = "select * from ordering where custname = '$user_name'and status = 'completed'";
                                $td = print_table($find_sql,$conn);
                                echo $td;
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                    <div class="user-ordering-table">
                        <table class="table ordering-table">
                            <thead>
                            <tr>
                                <th >Ord-ID</th>
                                <th >Date</th>
                                <th >Sale Rep</th>
                                <th >Mask Types</th>
                                <th >Quantity</th>
                                <th >Sales</th>
                                <th >Total Sales</th>
                                <th >Status </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                $find_sql = "select * from ordering where custname = '$user_name'and status = 'cancelled'";
                                $td = print_table($find_sql,$conn);
                                echo $td;
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="edit-ordering" role="tabpanel" aria-labelledby="edit-ordering">
                    <div class="user-ordering-table">
                        <table class="table ordering-table">
                            <thead>
                            <tr>
                                <th >Ord-ID</th>
                                <th >Date</th>
                                <th >Sale Rep</th>
                                <th >Mask Types</th>
                                <th >Quantity</th>
                                <th >Sales</th>
                                <th >Total Sales</th>
                                <th >Edit </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                $find_sql = "select * from ordering where custname = '$user_name'and status = 'processing'";
                                // $td = print_table($find_sql,$conn);
                                $result = $conn -> query($find_sql);
                                $td = "";
                                if($result->num_rows > 0){
                                    
                                    while($row = $result->fetch_assoc()){

                                        $td = $td."<tr> <th rowspan=3 class ='ord-id' >".$row["orderid"]."</th>";
                                        $td = $td."<td rowspan=3>" .$row["date"]."</td>";
                                        $td = $td."<td rowspan=3>" .$row["salerep"]."</td>";

                                        // $type_first = $types_list->fetch_assoc();

                                        $td = $td."<td>"."N95 respirator"."</td>";
                                        $td = $td."<td>".$row['type1']."</td>";
                                        $td = $td."<td> $".number_format($row['type1'], 2)."</td>";

                                        // echo $types_list;
                                        
                                        $td = $td."<td rowspan=3> $".number_format($row["totalsales"], 2)."</td>";
                                        // $td = $td."<td>".$row["status"]."</td> </tr>";
                                        $td = $td."<td rowspan=3> <button class = 'cancel-btn'>cancel</button></td> </tr>";

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
                                echo $td;
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    
    
</body>
<script>
    $(".cancel-btn").on("click",function(){
        var id = $(this).parent().siblings(".ord-id").html();
        // alert(id);
        swal({
            text:"Confirm to cancel?",
            buttons: true,
        }).then(function(isConfirm){
            if(isConfirm){
                // alert(a.html());
                // window.location.href = "cancel.php";
                $.ajax({
                type: 'POST',
                url: 'cancel.php',
                data: {ordid: id,
                },
                success: function(msg){// msg: php返回内容/* alert(修改成功); */window.location = window.location;
                    swal({
                        text:"Cancel successfully!",
                        timer:2000,
                        button : false,
                    });
                    
                    function sleep (time) {
                    return new Promise((resolve) => setTimeout(resolve, time));
                    }
                    
                    // 用法
                    sleep(1500).then(() => {
                        history.go(0);
                    })
                    
                    // window.location.href = "user_ordering.php";
                }
            });
            
        }
    });
});
            
    //                 });
    //             }
    //         });
    //     });
    // });
</script>
</html>
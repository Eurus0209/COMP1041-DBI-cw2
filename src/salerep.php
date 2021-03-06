<?php
    session_start();
    if(isset($_SESSION['srname'])){
        $name = $_SESSION['srname'];
    }else{
        echo '<script>window.location.href="index.php";</script>';
        exit();
    }
    
    include 'checkIsComplete.php';
    include 'conntodb.php';

    // get sale rep's personal information
    $find_sql = "SELECT * FROM salerep WHERE srname = '$name'";
    $result_find = $conn -> query($find_sql);
    $result = $result_find->fetch_assoc();
    $region = $result['srregion'];
    $quota1 = $result['quota1'];
    $quota2 = $result['quota2'];
    $quota3 = $result['quota3'];
    $empid = $result['employeeid'];
    $email = $result['email'];
    $realname = $result['realname'];
    $password = $result['password'];
    $phone = $result['phone'];

    // compute if quota is exceeded
    $pro_num1 = 0;
    $pro_num2 = 0;
    $pro_num3 = 0;
    $com_num1 = 0;
    $com_num2 = 0;
    $com_num3 = 0;
    $region_sql = "SELECT * FROM ordering WHERE srname = '$name' and status = 'processing'";
    $result = $conn -> query($region_sql);
    if($result ->num_rows >0){
        while($row = $result->fetch_assoc()){
            $pro_num1 += $row['type1'];
            $pro_num2 += $row['type2'];
            $pro_num3 += $row['type3'];
        }
    }
    $region_sql2 = "SELECT * FROM ordering WHERE srname = '$name' and status = 'completed'";
    $result2 = $conn -> query($region_sql2);
    if($result2 ->num_rows >0){
        while($row = $result2->fetch_assoc()){
            $com_num1 += $row['type1'];
            $com_num2 += $row['type2'];
            $com_num3 += $row['type3'];
        }
    }else{
    }
    $num1 = $pro_num1+$com_num1;
    $num2 = $pro_num2+$com_num2;
    $num3 = $pro_num3+$com_num3;
    $exceed1 = 0;
    $exceed2 = 0;
    $exceed3 = 0;
    $remain1 = $quota1 - $num1;
    $remain2 = $quota2 - $num2;
    $remain3 = $quota3 - $num3;
    if($num1>$quota1){
        $exceed1 = $num1-$quota1;
        $remain1 = 0;
    }
    if($num2>$quota2){
        $exceed2 = $num2-$quota2;
        $remain2 = 0;
    }
    if($num3>$quota3){
        $exceed3 = $num3-$quota3;
        $remain3 = 0;
    }
    $table_head1 = '
    <table class="table sr-ordering-table">
    <thead>
    <tr>
        <th >Ord-ID</th>
        <th >Date</th>
        <th >Customer</th>
        
        <th >Mask Types</th>
        <th >Quantity</th>
        <th >Sales</th>
        <th >Total Sales</th>
        <th >Status </th>
    </tr>
    </thead>
    <tbody>';
    $table_head2 = '<table class="table sr-ordering-table">
    <thead>
    <tr>
        <th >Ord-ID</th>
        <th >Date</th>
        <th >Customer</th>
        
        <th >Mask Types</th>
        <th >Quantity</th>
        <th >Sales</th>
        <th >Total Sales</th>
        <th >Edit</th>
    </tr>
    </thead>
    <tbody>';
    include 'printTableFunction.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sale Rep</title>
    <script src="../published/jquery-1.12.3.js"></script>
    <script src="../published/bootstrap.js"></script>
    <script src="../published/bootstrap.bundle.js"></script>
    <script src = "../published/sweetalert.js"> </script>
    <script src="../published/echarts-4.8.0/dist/echarts.min.js"></script>
    <link rel="stylesheet" href="../published/font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="../published/bootstrap.css">
    <script src="../published/moment.js"></script>
    <script src="../published/date-range-picker.js"></script>
    <link rel="stylesheet" href="../published/date-range-picker.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <script src="js/salerep.js"></script>
    <link rel="stylesheet" href="css/salerep.css">
</head>
<body>
    
    <div class="row">
        <div class="col-2">
            <div class="aside">
                <div class="profile">
                  <img class = "account-img" src="img/account1.png" alt="">
                  <h3 class="name"><?php echo $name ?></h3>
                </div>
                <ul class="nav">
                  <li class="active">
                    <a class = "order-label" id = "information-tab" href="#">Information</a>
                  </li>
                  <li>
                    <a href="#ordering-menu" class="collapsed" data-toggle="collapse">
                      Ordering &nbsp <i class="fa fa-angle-down" aria-hidden="true"></i>
                    </a>
                    <ul id="ordering-menu" class="collapse">
                      <li><a class = "order-label" id = "all" href="javascript:;">All</a></li>
                      <li><a class = "order-label" id = "processing" href="javascript:;">Processing</a></li>
                      <li><a class = "order-label" id = "completed" href="javascript:;">Completed</a></li>
                      <li><a class = "order-label" id = "cancelled" href="javascript:;">Cancelled</a></li>
                      <li><a class = "order-label" id = "edit" href="javascript:;">Edit</a></li>
                    </ul>
                  </li>
                  <li>
                    <a class ="logout" href="logout.php">
                    <i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>
                  </li>
                </ul>
            </div>
        </div>
        <div class="col-10">
            <div class="ordering-box">
                <div class="ordering-table information-tab show">
                    <div class="row">
                        <div class="col-4">
                            <div class="quota-chart-box">
                                <div id="n95-quota" style="height:220px; width: 250px"></div>
                                <div id="surgial-quota" style="height:170px; width: 250px"></div>
                                <div id="n95-surgial-quota" style="height:170px; width: 250px"></div>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="sr-info-box">
                                
                                <div class="info-content">
                                    <div class="form-group row">
                                        <label for="employee-id" class="col-sm-3 col-form-label">EmployeeID</label>
                                        <div class="col-sm-9">
                                        <input type="text" readonly class="form-control" id="employee-id" value=<?php echo $empid; ?>>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="realname" class="col-sm-3 col-form-label">Realname</label>
                                        <div class="col-sm-9">
                                        <input type="text" readonly class="form-control" id="realname" value=<?php echo $realname; ?>>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="srname" class="col-sm-3 col-form-label">Username</label>
                                        <div class="col-sm-9">
                                        <input type="text" readonly class="form-control" id="srname" value=<?php echo $name; ?>>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label for="email" class="col-sm-3 col-form-label">Email</label>
                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" id="email" value=<?php echo $email; ?>>
                                        <div class="tip email-tip">Please input as right format!</div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="phone" class="col-sm-3 col-form-label">Phone</label>
                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" id="phone" value=<?php echo $phone; ?>>
                                        <div class="tip phone-tip">Please input as right format!</div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="srregion" class="col-sm-3 col-form-label">Region</label>
                                        <div class="col-sm-9">
                                        <input type="text" readonly class="form-control" id="srregion" value=<?php echo $region; ?>>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword" class="col-sm-3 col-form-label">Password</label>
                                        <div class="col-sm-9">
                                        <input type="password" class="form-control" id="inputPassword" value=<?php echo $password; ?>>
                                        </div>
                                    </div>

                                    <div class="form-group row hide">
                                        <label for="repeatPassword" class="col-sm-3 col-form-label">Repeat Pass</label>
                                        <div class="col-sm-9">
                                        <input type="password" class="form-control" id="repeatPassword" >
                                        <div class="tip password-tip">Entered passwords differ!</div>
                                        </div>
                                    </div>

                                        
                                    <button class="btn btn-primary btn-save-change">Save Change</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
 
                </div>

                <div class="ordering-table all">
                    <div class="user-ordering-table">
                            <?php
                                echo $table_head1;
                                $region_sql = "SELECT * FROM ordering WHERE srname = '$name'";
                                $td2 = print_table($region_sql, $conn);
                                echo $td2;
                            ?>
                            </tbody>
                        </table>
                    </div>
                    
                </div>
                <div class="ordering-table processing">
                <div class="user-ordering-table">
                            
                            <?php
                                echo $table_head1;
                                
                                $region_sql = "SELECT * FROM ordering WHERE srname = '$name' and status = 'processing'";
                                $td2 = print_table($region_sql, $conn);
                                echo $td2;
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="ordering-table completed">
                <div class="user-ordering-table">
                            
                            <?php
                                echo $table_head1;
                                // 
                                $region_sql = "SELECT * FROM ordering WHERE srname = '$name' and status = 'completed'";
                                $td2 = print_table($region_sql, $conn);
                                echo $td2;
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="ordering-table cancelled">
                <div class="user-ordering-table">
                            
                            <?php
                                echo $table_head1;
                                $region_sql = "SELECT * FROM ordering WHERE srname = '$name' and status = 'cancelled'";
                                $td2 = print_table($region_sql, $conn);
                                echo $td2;
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="ordering-table edit">
                <div class="user-ordering-table">
                            <?php
                                
                                
                                 if($num1>$quota1 || $num2>$quota2 || $num3>$quota3){
                                    echo $table_head2;
                                    $sql = "SELECT * FROM ordering WHERE srname = '$name' and status = 'processing' ";
                                    $td = print_table2($sql,$conn);
                                    echo $td;
                                 }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Detailed Info</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="user-img" style="margin-top:10px;margin-left:40px;height:150px;width:150px;display:inline-block; vertical-align: top; ">
                    <img src="img/account3.png" style="height:150px" alt="">
                </div>
                <div class="user-nameinfo" style="margin-left:30px;margin-top:20px; height:150px;width:220px;display:inline-block; ">
                    <h5>Username</h5>
                    <h6 class= "name-info">china1</h6>
                    <br>
                    <h5>Realname</h5>
                    <h6 class= "realname-info">china1</h6>

                </div>
                <div class="user-otherinfo" style=" margin-top:20px; height:160px;width:420px;display:inline-block;">
                    <div class="row" style="margin-left:45px;">
                        <h5 class="col-5" >Email </h5>
                        <h5 class="col-7 email-info">1111555@qqq.com</h5>
                        <h5 class="col-5">Passport-ID </h5>
                        <h5 class="col-7 passport-info">1111555</h5>
                        <h5 class="col-5">Telephone </h5>
                        <h5 class="col-7 phone-info">11115552122</h5>
                        
                    </div>
                    
                </div>
            </div>
            </div>
        </div>
    </div>
</body>
<script >
// print chart:
    var n95 = echarts.init(document.getElementById("n95-quota")); 
    var surgial = echarts.init(document.getElementById("surgial-quota"));
    var n95_surgial = echarts.init(document.getElementById("n95-surgial-quota"));
    var option1 = {
        tooltip: {
            trigger: 'item',
            formatter: '{a} <br/>{b}: {c}'
        },
        color:['#425569','#5b7794','#94aac2','#ff7979'],
        legend: {
            orient: 'horizontal',
            left: 30,
            data: ['completed', 'processing', 'remaining','exceed'],
        },
        series: [
            {
                name: 'N95-respirator',
                type: 'pie',
                radius: [45, 70],
                avoidLabelOverlap: false,
                top: 50,
                label: {
                    show: false,
                    position: 'center'
                },
                labelLine: {
                    show: true
                },
                data: [
                    {value: <?php echo $com_num1 ?>, name: 'completed'},
                    {value: <?php echo $pro_num1 ?>, name: 'processing'},
                    {value: <?php echo $remain1 ?>, name: 'remaining'},
                    {value: <?php echo $exceed1 ?>, name: 'exceed'},
                ]
            }
        ]
    };
    var option2 = {
        tooltip: {
            trigger: 'item',
            formatter: '{a} <br/>{b}: {c}'
        },
        color:['#425569','#5b7794','#94aac2','#ff7979'],
        
        series: [
            {
                name: 'surgial-respirator',
                type: 'pie',
                radius: [45, 70],
                avoidLabelOverlap: false,
                label: {
                    show: false,
                    position: 'center'
                },
                labelLine: {
                    show: true
                },
                data: [
                    {value: <?php echo $com_num2 ?>, name: 'completed'},
                    {value: <?php echo $pro_num2 ?>, name: 'processing'},
                    {value: <?php echo $remain2 ?>, name: 'remaining'},
                    {value: <?php echo $exceed2 ?>, name: 'exceed'},
                ]
            }
        ]
    };
    var option3 = {
        tooltip: {
            trigger: 'item',
            formatter: '{a} <br/>{b}: {c}'
        },
        color:['#425569','#5b7794','#94aac2','#ff7979'],
        
        series: [
            {
                name: 'N95-surgial',
                type: 'pie',
                radius: [45, 70],
                avoidLabelOverlap: false,
                label: {
                    show: false,
                    position: 'center'
                },
                labelLine: {
                    show: true
                },
                data: [
                    {value: <?php echo $com_num3 ?>, name: 'completed'},
                    {value: <?php echo $pro_num3 ?>, name: 'processing'},
                    {value: <?php echo $remain3 ?>, name: 'remaining'},
                    {value: <?php echo $exceed3 ?>, name: 'exceed'},
                ]
            }
        ]
    };
    n95.setOption(option1);
    surgial.setOption(option2);
    n95_surgial.setOption(option3);
</script>
<script >
</script>
</html>
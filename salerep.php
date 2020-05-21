<?php
    session_start();
    $name = $_SESSION['srname'];
    include 'check_iscomplete.php';
    include 'conntodb.php';

    $find_sql = "SELECT * FROM user WHERE name = '$name'";
    $result_find = $conn -> query($find_sql);
    // if($result_find ->num_rows)
    $result = $result_find->fetch_assoc();
    $region = $result['region'];
    $quota1 = $result['quota1'];
    $quota2 = $result['quota2'];
    $quota3 = $result['quota3'];
    $empid = $result['employeeid'];
    $email = $result['email'];
    $realname = $result['realname'];
    $password = $result['password'];
    $phone = $result['phone'];

    
    $pro_num1 = 0;
    $pro_num2 = 0;
    $pro_num3 = 0;
    $com_num1 = 0;
    $com_num2 = 0;
    $com_num3 = 0;
    $region_sql = "SELECT * FROM ordering WHERE salerep = '$name' and status = 'processing'";
    $result = $conn -> query($region_sql);
    if($result ->num_rows >0){
        while($row = $result->fetch_assoc()){
            $pro_num1 += $row['type1'];
            $pro_num2 += $row['type2'];
            $pro_num3 += $row['type3'];
        }
    }
    $region_sql2 = "SELECT * FROM ordering WHERE salerep = '$name' and status = 'completed'";
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

    include 'print_table1.php';
    include 'print_table2.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="js/jquery-1.12.3.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <script src="library/echarts-4.8.0/dist/echarts.min.js"></script>
    <!-- <script src="https://cdn.bootcdn.net/ajax/libs/sweetalert/2.1.1/sweetalert.min.js"></script> -->
    <script src = "js/sweetalert.js"> </script>
    <script src="js/salerep.js"></script>
    <!-- <link rel="stylesheet" href="css/sweetalert.css"> -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/all.css">
    <!-- <link rel="stylesheet" href="library/fontawesome/css/all.css"> -->
    <link rel="stylesheet" href="library/font-awesome-4.7.0/css/font-awesome.css">
    <!-- <link rel="stylesheet" href="css/salerep.css"> -->
    <style>
        .aside{
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 180px;
            background-color: rgb(41, 53, 77);
            /* height: 100vh; */
        }
        li{
            list-style: none;
        }
        

        a, a:hover{
            display: block;
            color: white;
            text-decoration: none;
        }

        .nav a{
            padding: 10px 20px;
            width: 180px;
            /* width:30%; */
            font-weight: 500;
            /* border: .4px solid #22293b; */
        }

        .aside .nav .active > a {
            color: #eee;
            /* background-color: #243443; */
        } 
        .aside .nav a:hover,
        .aside .nav a:focus {
            color: #fcfcfc;
            background-color: #22293b;
        }
        #ordering-menu{
            padding:0 0 0 0px;
            background-color: rgb(56, 69, 94);
            font-size: 0.8em;
        }

        #ordering-menu a{
            border: none;
        }

        .profile{
            align-items: center;
            margin-left: 18px;
            margin-top: 20px;
            margin-bottom: 20px;
            /* text-align: center; */
        }
        .account-img{
            width: 28%;
            /* display: inline; */
            /* object-fit: cover; */
        }
        .aside .profile .name{
            display: inline;
            margin-left: 10px;
            font-size: 16px;
            font-weight: 700;
            color: #eee;
        }
        .ordering-table {
            display: none;
        }
        .show{
            display: block;
        }
        .table{
            align : center;
            font-size: 14px;
            /* height : 18px; */
            margin: 10vh 10vh;
            width: 80%;
            
        }
        .table tr th,
        .table tr td{
            /* height : 20px; */
            padding: 7px;
            text-align : center;
        }

        .logout{
            /* position :fixed; */
            bottom : 10px;
        }
        .cancel-btn {
            border: none;
            border-radius: 4px;
            height:27px;
            width: 90px;
            background-color:#eee;
            margin: 0;
        }
        .no-need{
            margin : 20vh 40px;
        }
        .info-content{
            width:70%;
        }
        .form-control{
        height: 1.7em;
        /* border-top: none; */
        border-radius: 0;
        }
        .form-control:focus{
        /* border: tomato; */
        border-color: rgb(75, 90, 131);
        box-shadow: none;
        }

        .info-content{
            margin-top:10vh;
            margin-left: 8vh;
            font-size: 14px;
            font-weight:600;
        }
        .btn-save-change{
            font-size: 14px;
            background-color: rgb(75, 90, 131);
            border: none;
            width: 180px;
            display: block;
            margin: 0 auto;
            margin-top: 30px;
            margin-bottom: 15px;
            }
        .info-content .hide{
            display:none;
        }
        .info-content .show{
            display:block;
        }
        .tip{
        display: none;
        color: rgb(255, 79, 79);
        font-size: .8em;
        /* margin-bottom: 1.1em; */
        margin-top: .1em;
        margin-left: .2em;
        }
        .quota-chart-box{
            margin-top: 5vh;
        }
    </style>
</head>
<body>
    
    <div class="row">
        <div class="col-2">
            <div class="aside">
                <div class="profile">
                  <!-- <img class="avatar" src="../uploads/avatar.jpg"> -->
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
                        <table class="table">
                            <?php
                            include 'table_head1.php';
                                $region_sql = "SELECT * FROM ordering WHERE salerep = '$name'";
                                $td2 = print_table($region_sql, $conn);
                                echo $td2;
                            ?>
                            </tbody>
                        </table>
                    </div>
                    
                </div>
                <div class="ordering-table processing">
                <div class="user-ordering-table">
                        <table class="table">
                            
                            <?php
                                include 'table_head1.php';
                                
                                $region_sql = "SELECT * FROM ordering WHERE salerep = '$name' and status = 'processing'";
                                $td2 = print_table($region_sql, $conn);
                                echo $td2;
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="ordering-table completed">
                <div class="user-ordering-table">
                        <table class="table">
                            
                            <?php
                                include 'table_head1.php';
                                // 
                                $region_sql = "SELECT * FROM ordering WHERE salerep = '$name' and status = 'completed'";
                                $td2 = print_table($region_sql, $conn);
                                echo $td2;
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="ordering-table cancelled">
                <div class="user-ordering-table">
                        <table class="table">
                            
                            <?php
                                include 'table_head1.php';
                            
                                $region_sql = "SELECT * FROM ordering WHERE salerep = '$name' and status = 'cancelled'";
                                $td2 = print_table($region_sql, $conn);
                                echo $td2;
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="ordering-table edit">
                <div class="user-ordering-table">
                        <table class="table">
                            <?php
                                
                                
                                 if($num1>$quota1 || $num2>$quota2 || $num3>$quota3){
                                    include 'table_head2.php';
                                    // $result = $conn -> query($region_sql);
                                    $sql = "SELECT * FROM ordering WHERE salerep = '$name' and status = 'processing' ";
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
</body>
<script >
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
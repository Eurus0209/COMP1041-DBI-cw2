<?php
    session_start();
    include 'check_iscomplete.php';
    include 'conntodb.php';
    include 'print_table.php';
    include 'getNum.php';
    $China_sql = "SELECT * FROM ordering WHERE custregion = 'China'";
    $American_sql = "SELECT * FROM ordering WHERE custregion = 'American'";
    $Canada_sql = "SELECT * FROM ordering WHERE custregion = 'Canada'";
    $Japan_sql = "SELECT * FROM ordering WHERE custregion = 'Japan'";
    $England_sql = "SELECT * FROM ordering WHERE custregion = 'England'";
    $Korea_sql = "SELECT * FROM ordering WHERE custregion = 'korea'";
    $China = getNumOfRegion($China_sql,$conn);
    $American = getNumOfRegion($American_sql,$conn);
    $Canada = getNumOfRegion($Canada_sql,$conn);
    $Japan = getNumOfRegion($Japan_sql,$conn);
    $England = getNumOfRegion($England_sql,$conn);
    $Korea = getNumOfRegion($Korea_sql,$conn);

    $China_sql_processing = "SELECT * FROM ordering WHERE status = 'processing' AND custregion = 'China'";
    $American_sql_processing = "SELECT * FROM ordering WHERE status = 'processing' AND custregion = 'American'";
    $Canada_sql_processing = "SELECT * FROM ordering WHERE status = 'processing' AND custregion = 'Canada'";
    $Japan_sql_processing = "SELECT * FROM ordering WHERE status = 'processing' AND custregion = 'Japan'";
    $England_sql_processing = "SELECT * FROM ordering WHERE status = 'processing' AND custregion = 'England'";
    $korea_sql_processing = "SELECT * FROM ordering WHERE status = 'processing' AND custregion = 'korea'";
    $China_processing = getNumOfRegion($China_sql_processing,$conn);
    $American_processing = getNumOfRegion($American_sql_processing,$conn);
    $Canada_processing = getNumOfRegion($Canada_sql_processing,$conn);
    $Japan_processing = getNumOfRegion($Japan_sql_processing,$conn);
    $England_processing = getNumOfRegion($England_sql_processing,$conn);
    $Korea_processing = getNumOfRegion($China_sql_processing,$conn);
    // echo $Korea[0];

    // function getDateFromRange($startdate, $enddate){
    //     $stimestamp = strtotime($startdate);
    //     $etimestamp = strtotime($enddate);
    //     // 计算日期段内有多少天
    //     $days = ($etimestamp-$stimestamp)/86400+1;
    //     // 保存每天日期
    //     $date = array();
    //     for($i=0; $i<$days; $i++){
    //       $date[] = date('Y-m-d', $stimestamp+(86400*$i));
    //     }
    //     return $date;
    // }
    include 'getdata.php';
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
    <!-- <script src="https://cdn.bootcdn.net/ajax/libs/sweetalert/2.1.1/sweetalert.min.js"></script> -->
    <script src = "js/sweetalert.js"> </script>
    <!-- <link rel="stylesheet" href="css/sweetalert.css"> -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="library/fontawesome/css/all.css">
    <!-- <link rel="stylesheet" href="css/salerep.css"> -->
    <style>
        .aside{
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 180px;
            background-color: #34495e;
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
            font-weight: 500;
            /* border: .4px solid #22293b; */
        }

        .aside .toggle-list .active > a {
            color: #eee;
            /* background-color: #243443; */
        } 
        .aside .toggle-list a:hover,
        .aside .toggle-list a:focus {
            color: #fcfcfc;
            background-color: #2c3e50;
        }
        .aside-nav{
            padding:0 0 0 0px;
            background-color: #496077;
            font-size: 0.8em;
        }

        .aside-nav a{
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
        .selling-table {
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

        .content-box{
            margin: 7vh 7vh 7vh 7vh;
            /* color:black; */
        }
        .nav-item a{
            font-size: 14px;
            color:#585d74;
        }
        .sell-nav-box .nav-item a{
            width:130px!important;
        }
    </style>
</head>
<body>
    
    <div class="row">
        <div class="col-2">
            <div class="aside">
                <div class="profile">
                  <!-- <img class="avatar" src="../uploads/avatar.jpg"> -->
                  <img class = "account-img" src="img/account2.png" alt="">
                  <h3 class="name">Manager</h3>
                </div>
                <ul class="nav toggle-list">
                  <li class="active">
                    <a href="#selling-situtaion" class="collapsed" data-toggle="collapse">
                      Selling Status &nbsp <i class="fa fa-angle-down" aria-hidden="true"></i>
                    </a>
                    <ul id="selling-situtaion" class="collapse aside-nav">
                      <li><a class = "selling-label" id = "total" href="javascript:;">Total</a></li>
                      <li><a class = "selling-label" id = "under-ord" href="javascript:;">Under Ordering</a></li>
                    </ul>
                  </li>
                  <li>
                    <a href="#salerep-situtaion" class="collapsed" data-toggle="collapse">
                      Sale Rep &nbsp <i class="fa fa-angle-down" aria-hidden="true"></i>
                    </a>
                    <ul id="salerep-situtaion" class="collapse aside-nav">
                      <li><a class = "sr-info-label" id = "sr-information" href="javascript:;">Information</a></li>
                      <li><a class = "sr-info-label" id = "sr-edit" href="javascript:;">Add</a></li>
                      <li><a class = "sr-info-label" id = "sr-warning" href="javascript:;">Warning</a></li>
                    </ul>
                  </li>
                  <li>
                    <a href="#">Information</a>
                  </li>
                  <li>
                    <a class ="logout" href="logout.php">Logout</a>
                  </li>
                </ul>
            </div>
        </div>
        <div class="col-10">
            <div class="selling-table total-box total">
                <?php include 'selling_total.php'; ?>
            </div>
            <div class="selling-table total-box under-ord">
                <?php include 'selling_processing.php'; ?>
            </div>
            
        </div>
    </div>
</body>
<script >
    $(".selling-label").on("click",function(){
        var str = $(this).attr("id");
        $(".selling-table").removeClass("show");
        $("."+str).addClass("show");
    })
</script>
</html>
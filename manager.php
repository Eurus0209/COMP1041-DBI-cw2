<?php
    session_start();
    include 'getdata.php';
    include 'check_iscomplete.php';
    include 'conntodb.php';
    include 'print_table.php';
    include 'getNum.php';
    include 'getSrInfo.php';
    include 'print_srinfo.php';
    include 'warning_data.php';
    $custInfoStr = getCustInfoForManager($conn);
    $China_sql = "SELECT * FROM ordering WHERE custregion = 'China'";
    $America_sql = "SELECT * FROM ordering WHERE custregion = 'America'";
    $Canada_sql = "SELECT * FROM ordering WHERE custregion = 'Canada'";
    $Japan_sql = "SELECT * FROM ordering WHERE custregion = 'Japan'";
    $England_sql = "SELECT * FROM ordering WHERE custregion = 'England'";
    $Korea_sql = "SELECT * FROM ordering WHERE custregion = 'korea'";
    $China = getNumOfRegion($China_sql,$conn);
    $America = getNumOfRegion($America_sql,$conn);
    $Canada = getNumOfRegion($Canada_sql,$conn);
    $Japan = getNumOfRegion($Japan_sql,$conn);
    $England = getNumOfRegion($England_sql,$conn);
    $Korea = getNumOfRegion($Korea_sql,$conn);

    $China_sql_processing = "SELECT * FROM ordering WHERE status = 'processing' AND custregion = 'China'";
    $America_sql_processing = "SELECT * FROM ordering WHERE status = 'processing' AND custregion = 'America'";
    $Canada_sql_processing = "SELECT * FROM ordering WHERE status = 'processing' AND custregion = 'Canada'";
    $Japan_sql_processing = "SELECT * FROM ordering WHERE status = 'processing' AND custregion = 'Japan'";
    $England_sql_processing = "SELECT * FROM ordering WHERE status = 'processing' AND custregion = 'England'";
    $korea_sql_processing = "SELECT * FROM ordering WHERE status = 'processing' AND custregion = 'korea'";
    $China_processing = getNumOfRegion($China_sql_processing,$conn);
    $America_processing = getNumOfRegion($America_sql_processing,$conn);
    $Canada_processing = getNumOfRegion($Canada_sql_processing,$conn);
    $Japan_processing = getNumOfRegion($Japan_sql_processing,$conn);
    $England_processing = getNumOfRegion($England_sql_processing,$conn);
    $Korea_processing = getNumOfRegion($China_sql_processing,$conn);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="js/jquery-1.12.3.js"></script>
    <script src="js/bootstrap.js"></script>
    <!-- <script src="js/bootstrap.bundle.js"></script> -->
    <script src="library/echarts-4.8.0/dist/echarts.min.js"></script>
    <script src = "js/sweetalert.js"> </script>
    <script src="js/manager.js"></script>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="library/font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="css/manager.css">
    <script>
        var fw = <?php echo $flag_warning;?>;
        
    </script>
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
                      Sale Rep &nbsp <i class="fa fa-angle-down" aria-hidden="true"></i> &nbsp
                      <i class = "fa fa-exclamation-circle warning-tip" style="font-size:13px;" ></i>
                    </a>
                    <ul id="salerep-situtaion" class="collapse aside-nav">
                      <li><a class = "sr-info-label" id = "sr-information" href="javascript:;">Information</a></li>
                      <li><a class = "sr-info-label" id = "sr-add" href="javascript:;">Add</a></li>
                      <li><a class = "sr-info-label" id = "sr-warning" href="javascript:;">Warning &nbsp
                      <i class = "fa fa-exclamation-circle warning-tip" style="font-size:13px;" ></i>
                      </a></li>
                    </ul>
                  </li>
                  <li>
                    <a class = "cust-info-label" id = "cust-info" href="#">Customer </a>
                  </li>
                  <li>
                    <a class ="logout" href="logout.php">
                    <i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>
                  </li>
                </ul>
            </div>
        </div>
        <div class="col-10">
            <div class="selling-table total-box total show">
                <?php include 'selling_total.php'; ?>
            </div>
            <div class="selling-table total-box under-ord">
                <?php include 'selling_processing.php'; ?>
            </div>
            
            <div class="sr-info-table sr-information">
                <?php include 'srinfo.php' ?>
            </div>
            <div class="sr-info-table sr-add">
                <?php include 'salerep_add.php'; ?>
            </div>
            <div class="sr-info-table sr-warning">
                <?php include 'warning.php' ?>
            </div>
            <div class="cust-info-table cust-info">
                <?php include 'custinfo.php';?>
            </div>

        </div>
    </div>
</body>
</html>
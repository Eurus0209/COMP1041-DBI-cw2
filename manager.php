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
    <script src="library/echarts-4.8.0/dist/echarts.min.js"></script>
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
        .selling-table, .sr-info-table {
            display: none;
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

        .sr-info-content{
            /* margin-top:10vh; */
            margin-left: 10vh;
            font-size: 14px;
            font-weight:600;
        }
        .btn-save-change{
            font-size: 14px;
            background-color: rgb(75, 90, 131);
            border: none;
            width: 150px;
            display: block;
            margin: 0 auto;
            margin-top: 30px;
            margin-bottom: 15px;
            }
        .sr-info-content{
            margin-top:5vh;
            width:50%;
            /* font-size: 14px; */
        }
        .sr-info-add-box2{
            width:50%;
            margin-left:100px;
        }

        .sr-info-content .tip{
            display: none;
            color: rgb(255, 79, 79);
            font-size: .8em;
            /* margin-bottom: 1.1em; */
            margin-top: .1em;
            margin-left: .2em;
        }

        .show{
            display: block!important;
        }

        .warning-tip{
            display:none;
        }
        .sr-detail-info-box{
            /* font-size: 18px!important; */
            width: 100%;
            margin: 10vh auto;
            text-align: center;
        }
        .detail-box{
            display: none;
            /* padding: auto 100px!important; */
        }
        .show-cell{
            display: table-cell;
        }
        .sr-detail-info-table td,
        .sr-detail-info-table th{
            padding: 7px;
        }
        .col-3 .quota-chart{
            margin: 0 auto;
        }
        .inner-table{
            margin: 50px auto;
            font-size: 14px;
        }
        .chart-column {
            margin: 0 auto;
            align-items: center;
            text-align: center;
            
        }
        
        .sr-detail-info-table .form-control{
            width: 70px; 
            margin: 0 auto; 
            height: 30px; 
            border-radius: 0; 
            text-align: center;
            border: none;
            border-bottom: .5px solid black;
        }
        .save-btn{
            height: 30px;
            /* padding: 0; */
            border: none;
            width: 50px;
        }

        .sr-detail-info-box a{
            color:black;
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
            
            <div class="sr-info-table sr-information">
                <?php include 'srinfo.php' ?>
            </div>
            <div class="sr-info-table sr-add">
                <?php include 'salerep_add.php'; ?>
            </div>
            <div class="sr-info-table sr-warning">
            
            </div>
        </div>
    </div>
</body>
<script >
    $(".selling-label").on("click",function(){
        var str = $(this).attr("id");
        $(".selling-table").removeClass("show");
        $(".sr-info-table").removeClass("show");
        $("."+str).addClass("show");
    })

    $(".sr-info-label").on("click",function(){
        var str = $(this).attr("id");
        $(".selling-table").removeClass("show");
        $(".sr-info-table").removeClass("show");
        $("."+str).addClass("show");
    })

    $("#email").on("focus",function(){
        $(".email-tip").removeClass("show");
        
    })
    $("#email").on("blur",function(){
        if(/([\w\-]+\@[\w\-]+\.[\w\-]+)/.test($(this).val())==false){
            $(".email-tip").addClass("show");
        }
    })
    $("#phone").on("focus",function(){
        $(".phone-tip").removeClass("show");
    })
    $("#phone").on("blur",function(){
        if(/\d{11}/.test($(this).val())==false){
            $(".phone-tip").addClass("show");
        }
    })

    $("#repeatPassword").on("focus",function(){
        $(".password-tip").removeClass("show");
    })
    $("#repeatPassword").on("blur",function(){
        if($("#inputPassword").val()!=$("#repeatPassword").val()){
            $(".password-tip").addClass("show");
        }
    })

    $(".btn-save-change").on("click",function(){
        if($("#email").val()==''|| 
        $("#phone").val() =='' ||
        $("#inputPassword").val() =='' ||
        $("#realname").val() ==''||
        $("#srname").val()==''||
        $("#employee-id").val()==''
        ){
            swal("Please complete the form!");
        }
        else if(
            /([\w\-]+\@[\w\-]+\.[\w\-]+)/.test($("#email").val())==false ||
            /\d{11}/.test($("#phone").val())==false
        ){
            swal("Please complete the form as right format!");
        }else if($("#inputPassword").val()!=$("#repeatPassword").val()){
            swal("Please make sure password is entered consistently!");
        }else{
            var issucc = 0;
            $.ajax({
                type : "post",
                url : "isexist.php",
                data :{
                    name: $("#srname").val(),
                },
                success : function(msg){
                    if(msg == 1){
                        swal("Username already exist!");
                    }else{
                        issucc = 1;
                        swal("here");
                        $.ajax({
                            type : "post",
                            url : "adduser.php",
                            data:{
                                name:  $("#srname").val(),
                                realname : $("#realname").val(),
                                id : $("#employee-id").val(),
                                pass : $("#inputPassword").val(),
                                email: $("#email").val(),
                                phone: $("#phone").val(),
                                region: $("#srregion option:selected").val(),
                                role : 2,
                                quota1 : $("#quota1").val(),
                                quota2 : $("#quota2").val(),
                                quota3 : $("#quota3").val(),
                            },
                            success : function(msg){
                                if(msg == 1)
                                    swal("Add successfully!");
                                    // history.go(0);
                                    // location.reload();
                                else{
                                    swal("Add failed!");
                                }
                            }
                        });
                    }
                }
            });
        }
    })
</script>
</html>
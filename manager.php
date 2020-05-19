<?php
    session_start();
    include 'getdata.php';
    include 'check_iscomplete.php';
    include 'conntodb.php';
    include 'print_table.php';
    include 'getNum.php';
    include 'getSrInfo.php';
    include 'temp.php';
    include 'warning_data.php';
    
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
    <script src = "js/sweetalert.js"> </script>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="library/fontawesome/css/all.css">
    <!-- <link rel="stylesheet" href="css/salerep.css"> -->
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
                <?php include 'warning.php' ?>
            </div>
        </div>
    </div>
</body>
<script >
    if(fw==1){
            // $(".warning-tip").removeClass("warning-tip");
            $(".warning-tip").addClass("show-wt");
        }

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
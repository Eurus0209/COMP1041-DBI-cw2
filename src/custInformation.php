<?php
    include 'conntodb.php';
    session_start();
    $custname = $_SESSION['username'];
    $sql = "SELECT * FROM customer WHERE custname = '$custname'";
    $result = $conn->query($sql);
    $info = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Information</title>
  <script src="../published/jquery-1.12.3.js"></script>
    <script src="../published/bootstrap.js"></script>
    <script src="../published/bootstrap.bundle.js"></script>
    <script src = "../published/sweetalert.js"> </script>
    <link rel="stylesheet" href="../published/font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="../published/bootstrap.css">
    <script src="../published/echarts-4.8.0/dist/echarts.min.js"></script>
  <link rel="stylesheet" href="css/userInfo.css">
</head>
<body>
    <?php include 'navAfter.php' ?>
  <div class="cust-info-box">
    <div class="info-content">
        <div class="form-group row">
            <label for="passport-id" class="col-sm-3 col-form-label">PassportID</label>
            <div class="col-sm-9">
            <input type="text" readonly class="form-control" id="passport-id" value =<?php echo $info['passportid']; ?>>
            </div>
        </div>

        <div class="form-group row">
            <label for="realname" class="col-sm-3 col-form-label">Realname</label>
            <div class="col-sm-9">
            <input type="text" readonly class="form-control" id="realname" value =<?php echo $info['realname']; ?>>
            </div>
        </div>

        <div class="form-group row">
            <label for="srname" class="col-sm-3 col-form-label">Username</label>
            <div class="col-sm-9">
            <input type="text" readonly class="form-control" id="srname" value =<?php echo $info['custname']; ?>>
            </div>
        </div>
        
        <div class="form-group row">
            <label for="email" class="col-sm-3 col-form-label">Email</label>
            <div class="col-sm-9">
            <input type="text" class="form-control" id="email" value =<?php echo $info['email']; ?> >
            <div class="tip email-tip">Please input as right format!</div>
            </div>
        </div>
        <div class="form-group row">
            <label for="phone" class="col-sm-3 col-form-label">Phone</label>
            <div class="col-sm-9">
            <input type="text" class="form-control" id="phone" value =<?php echo $info['phone']; ?>>
            <div class="tip phone-tip">Please input as right format!</div>
            </div>
        </div>

        <div class="form-group row">
            <label for="custregion" class="col-sm-3 col-form-label">Region</label>
            <div class="col-sm-9">
            <input type="text" readonly class="form-control" id="custregion" value =<?php echo $info['custregion']; ?>>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-3 col-form-label">Password</label>
            <div class="col-sm-9">
            <input type="password" class="form-control" id="inputPassword" value =<?php echo $info['password']; ?>>
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
</body>
<script>
    var ispasschange = 0;
    $("#inputPassword").on("click",function(){
        $(".hide").removeClass("hide");
        ispasschange = 1;
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
        $("#inputPassword").val() ==''
        ){
            swal("Please complete the form!");
        }
        else if(
            /([\w\-]+\@[\w\-]+\.[\w\-]+)/.test($("#email").val())==false ||
            /\d{11}/.test($("#phone").val())==false
        ){
            swal("Please complete the form as right format!");
        }else if(ispasschange == 1 && $("#inputPassword").val()!=$("#repeatPassword").val()){
            swal("Please make sure password is entered consistently!");
        }else{
            var name = $("#srname").val();
            var phone = $("#phone").val();
            var pass = $("#inputPassword").val();
            var email = $("#email").val();
            $.ajax({
                type: 'POST',
                url: 'updateinfo.php',
                data: {
                    name : name,
                    phone : phone,
                    password: pass,
                    email :email
                },
                success :function(msg){
                    swal("success!");
                    // window.location.herf="salerep.php";
                }
            })
        }
    })
</script>
</html>
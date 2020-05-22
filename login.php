<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="js/jquery-1.12.3.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> -->
    <script src="js/jquery-1.12.3.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <script src="https://cdn.bootcdn.net/ajax/libs/sweetalert/2.1.1/sweetalert.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/login.css">
    
</head>
<body>
    <?php
        include 'nav_before.php';
    ?>
      <div class="sign-up-box" > 
        <div class="container">
          <div class="row inner-box">
              
            <div class="col-4" style="height:auto; background-color:  #16a085;">
                <h3 class = "login-text">
                  Do not have an account?
                </h3>
                <input type="button" id = "btn-to-sign-up" value="Sign up" onclick="javascrtpt:window.location.href='signup.php'">
              </div>
            <div class="col-8">
                <div class="login-welcome">
                    <h3>
                        WELCOME<br>
                        LOGIN TO SMS
                    </h3>
                </div>

                
              <form class="form-regist form-horizontal login-content" action = "login-back.php" method = "post">
                <div class="form-group ">
                  <input type="text" name = "username" class="form-control" id="username" placeholder="Username">
                </div>
                <div class="form-group">
                  <input type="password" name ="password" class="form-control" id="password" placeholder="Password">
                </div>
         
                <button type="button" class="btn btn-primary btn-login">Login</button>
              </form>
            </div>
            
          </div>
        </div>
        
      </div>
      
    
</body>
<script>
    $(function(){
      $(".btn-login").on("click",function () {
        if($("#username").val()==''||
        $("#password").val()==''){
          swal("Please complete form!");
        }else{
          $.ajax({
            type:"post",
            url: "checklogin.php",
            data:{
              name : $("#username").val(),
              password : $("#password").val()
            },
            success: function(msg){
              if(msg == 4){
                swal("Failed login!");
              }
              if(msg == 1){
                window.location= 'index.php';
              }else if (msg == 2){
                window.location= 'salerep.php';
              }else if (msg == 3){
                window.location= 'manager.php';
              }
            }
          })
        }
      })
    })
</script>

</html>
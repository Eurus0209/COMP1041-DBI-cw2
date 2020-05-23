<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <script src="library/jquery-1.12.3.js"></script>
    <script src="library/bootstrap.js"></script>
    <script src="library/bootstrap.bundle.js"></script>
    <script src = "library/sweetalert.js"> </script>
    <link rel="stylesheet" href="library/font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="library/bootstrap.css">
    <link rel="stylesheet" href="css/signup.css">
    
<body>
    <?php include 'nav_before.php'; ?>
      <div class="sign-up-box" > 
        <div class="container">
          <div class="row inner-box">
            <div class="col-8">
              <div class="sign-up-welcome">
                <h3>
                  WELCOME<br>
                  SIGN UP TO Woolin Auto
                </h3>
              </div>

              <form class="form-regist form-horizontal sign-up-content" action = "signup-back.php" method = "post">
                <div class="form-group ">
                  <input type="text" name = "username" class="form-control" id="username" placeholder="Username" >
                  <div class="tip-name1 tip">
                      Only contain letter and digit!
                    </div>
                    <div class="tip-name2 tip">
                      At least contain one letter!
                    </div>
                </div>

                <div class="form-group ">
                  <input type="text" name = "realname" class="form-control" id="realname" placeholder="RealName" >
                </div>

                <div class="form-group ">
                  <input type="text" name = "passportid" class="form-control" id="passportid" placeholder="PassportID" >
                </div>
    
                <div class="form-group">
                    <input type="text" name = "telephone" class="form-control" id="telephone" placeholder="Telephone" >
                    <div class="tip-phone tip">
                      Wrong format of phone number!
                    </div>
                </div>
                
    
                <div class="form-group">
                    <input type="email" name = "email" class="form-control" id="email" placeholder="Email">
                    <div class="tip-email tip">
                      Wrong format of email!
                 </div>
                </div>
                
    
                <div class="form-group">
                  <input type="password" name = "password1" class="form-control" id="password1" placeholder="Password">
                </div>
    
                <div class="form-group">
                    <input type="password" name = "password2" class="form-control" id="password2" placeholder="Repeate Password">
                    <div class="tip-pass tip">
                      Entered passwords differ.
                  </div>
                </div>
                <div class="form-group">
                  <select class="form-control" name = "region" id = "region" style="font-size:16px; padding : 0 6px;" >
                    <option value="China">China</option>
                    <option value="America">America</option>
                    <option value="England">England</option>
                    <option value="Japan">Japan</option>
                    <option value="Korea">Korea</option>
                    <option value="Canada">Canada</option>
                  </select>
                </div>
                  
                <button type="button" class="btn btn-primary btn-sign-up">Sign up</button>
              </form>
            </div>
            <div class="col-4" style="height:auto; background-color:  rgb(75, 90, 131);">
              <h3 class = "login-text">
                Already have an account?
              </h3>
              <input type="button" id = "btn-to-login" value="Login" onclick="javascrtpt:window.location.href='login.php'">
            </div>
          </div>
        </div>
        
      </div>
      
    
</body>
<script>
  $("#username").on("blur",function(){
    //can't contain other char except letter and digit
    var reg1 = new RegExp(/^[0-9a-zA-Z]*$/g);

    //must contain at least one letter
    var reg2 = new RegExp(/[A-Za-z]+/);

    var text = $(this).val();
    if((reg2.test(text)==false)){
      $(".tip-name2").addClass("active-tip");
    }else if((reg1.test(text)==false)){
      $(".tip-name1").addClass("active-tip");
    }
  })

    $("#email").on("blur",function () {
        if(/([\w\-]+\@[\w\-]+\.[\w\-]+)/.test($(this).val())==false){
            $(".tip-email").addClass("active-tip");
        }
    })

    $("#password2").on("blur",function(){
        if($("#password1").val()!=$("#password2").val()){
            $(".tip-pass").addClass("active-tip");
        }
    })

    $("#telephone").on("blur",function(){
        if(/\d{11}/.test($(this).val())==false){
            $(".tip-phone").addClass("active-tip");
        }
    })
    $("input").on("focus",function(){
        $(this).siblings(".tip").removeClass("active-tip");
    })

    $(".btn-sign-up").on("click",function(){
      if($("#telephone").val()=='' ||
      $("#username").val()=='' ||
      $("#email").val()==''||
      $("#password1").val()==''||
      $("#password2").val()==''||
      $("#realname").val() ==''||
      $('#passportid').val() ==''
      ){
        swal("Please complete form!");
      }else if(
        /([\w\-]+\@[\w\-]+\.[\w\-]+)/.test($("#email").val())==false ||
        $("#password1").val()!=$("#password2").val() ||
        /\d{11}/.test($("#telephone").val())==false ||
        /^[0-9a-zA-Z]*$/.test($("#username").val())==false||
        /[A-Za-z]+/.test($("#username").val())==false
      ){
        swal("Please complete form as right format!");
      }else{
          $.ajax({
              type: "post",
              url : "isexist.php",
              data:{
                name : $("#username").val(),
              },
              success: function(msg){
                if(msg == 1){
                  swal("Username already exist!");
                }else{
                  $.ajax({
                    type:"post",
                    url: "adduser.php",
                    data:{
                      name:  $("#username").val(),
                      realname : $("#realname").val(),
                      id : $("#passportid").val(),
                      pass : $("#password1").val(),
                      email: $("#email").val(),
                      phone: $("#telephone").val(),
                      region: $("#region option:selected").val(),
                      role : 1,
                    },
                    success : function(msg){
                      if(msg == 1){
                        swal("Sign up successfully!");
                        // location.reload();
                      }else{
                        swal("Failed!");
                      }
                    }
                    
                  })
                }
              }
          })
      }
    })



</script>

</html>
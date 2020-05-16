<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="js/jquery-1.12.3.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href="css/signup.css">
    <script src="js/jquery-1.12.3.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <script src="https://cdn.bootcdn.net/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/signup.css">
    
    <!-- <link href="https://cdn.bootcdn.net/ajax/libs/twitter-bootstrap/3.4.1/css/bootstrap-theme.css" rel="stylesheet"> -->
</head>
<body>
  <nav class="navbar navbar-expand-sm navbar-light bg-light nav-before-login">
    <a href="index.php" class="navbar-brand">SMS</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target = "#myNav" >
        <span class="navbar-toggler-icon small"></span>
    </button>
    <div class="collapse navbar-collapse " id="myNav">
        <ul class="navbar-nav  ml-auto ">
            <li class="nav-item">
                <a href="signup.php" class="nav-link">Sign Up</a>
            </li>
            <li class="nav-item">
                <a href="login.php" class="nav-link">Login</a>
            </li>
        </ul>
    </div>
</nav>
      <div class="sign-up-box" > 
        <div class="container">
          <div class="row inner-box">
            <div class="col-8">
              <div class="sign-up-welcome">
                <h3>
                  WELCOME<br>
                  SIGN UP TO SMS
                </h3>
              </div>

              <form class="form-regist form-horizontal sign-up-content" action = "signup-back.php" method = "post">
                <div class="form-group ">
                  <!-- <label for="username">Username</label> -->
                  <input type="text" name = "username" class="form-control" id="username" placeholder="Username" >
                </div>

                <div class="form-group ">
                  <!-- <label for="username">Username</label> -->
                  <input type="text" name = "realname" class="form-control" id="realname" placeholder="RealName" >
                </div>

                <div class="form-group ">
                  <!-- <label for="username">Username</label> -->
                  <input type="text" name = "passportid" class="form-control" id="passportid" placeholder="PassportID" >
                </div>
    
                <div class="form-group">
                    <!-- <label for="telephone">Telephone</label> -->
                    <input type="text" name = "telephone" class="form-control" id="telephone" placeholder="Telephone" >
                    <div class="tip-phone tip">
                      Wrong format of phone number!
                    </div>
                </div>
                
    
                <div class="form-group">
                    <!-- <label for="email">Email</label> -->
                    <input type="email" name = "email" class="form-control" id="email" placeholder="Email">
                    <div class="tip-email tip">
                      Wrong format of email!
                 </div>
                </div>
                
    
                <div class="form-group">
                  <!-- <label for="password1">Password</label> -->
                  <input type="password" name = "password1" class="form-control" id="password1" placeholder="Password">
                </div>
    
                <div class="form-group">
                    <!-- <label for="password2">Repeat Password</label> -->
                    <input type="password" name = "password2" class="form-control" id="password2" placeholder="Repeate Password">
                    <div class="tip-pass tip">
                      Entered passwords differ.
                  </div>
                </div>
                <div class="form-group">
                <!-- <label for="exampleFormControlSelect1">Example select</label> -->
                  <select class="form-control" name = "region" style="font-size:16px; padding : 0 6px;" >
                    <option value="China">China</option>
                    <option value="American">American</option>
                    <option value="England">England</option>
                    <option value="Japan">Japan</option>
                    <option value="Korea">Korea</option>
                    <option value="Canada">Canada</option>
                  </select>
                </div>
                <!-- <select name="region" id="">
                  <option value="China">China</option>
                  <option value="American">American</option>
                  <option value="England">England</option>
                  <option value="Japan">Japan</option>
                  <option value="Korea">Korea</option>
                  <option value="Canada">Canada</option>
                </select>        -->
                <button type="submit" class="btn btn-primary btn-sign-up">Sign up</button>
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
        // alert($(this).attr("id"));
        // console.log($(this).attr("id"));
        $(this).siblings(".tip").removeClass("active-tip");
    })

    $("#form-regist").submit(function (e) {
        e.preventDefault();
        // return false;
    })

    $(".sign-up-content").on("submit",function(e){
      if($("#telephone").val()=='' ||
      $("#username").val()=='' ||
      $("#email").val()==''||
      $("#password1").val()==''||
      $("#password2").val()==''){
        swal("Please complete form!");
        e.preventDefault();
        return false;
      }else if(
        /([\w\-]+\@[\w\-]+\.[\w\-]+)/.test($("#email").val())==false ||
        $("#password1").val()!=$("#password2").val() ||
        /\d{11}/.test($("#telephone").val())==false
      ){
        alert("Please complete form as right format!");
        e.preventDefault();
        return false;
      }else{
        return true;
      }
    })



</script>

</html>
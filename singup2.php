<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="js/jquery-1.12.3.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    
    <!-- <link href="https://cdn.bootcdn.net/ajax/libs/twitter-bootstrap/3.4.1/css/bootstrap-theme.css" rel="stylesheet"> -->
    <style>
        .sign-up-box {
            /* width: 30%; */
        }

        .sign-up-content{
          font-size: 16px;
          width: 70%;
        }

        .tip{
            display: none;
            color: red;
            font-size: .8em;
            margin-bottom: 1.1em;
            margin-top: .1em;
            margin-left: .2em;
        }
        .active-tip{
            display: block;
        }
    </style>
</head>
<body>

      <div class="sign-up-box" > 
        <div class="container">
          <div class="row">
            <div class="col-6">
              <form class="form-regist form-horizontal sign-up-content" action = "myphp.php" method = "post">
                <div class="form-group ">
                  <label for="username">Username</label>
                  <input type="text" class="form-control" id="username" >
                </div>
    
    
                <div class="form-group">
                    <label for="telephone">Telephone</label>
                    <input type="text" class="form-control" id="telephone" >
                    <div class="tip-phone tip">
                      Wrong format of phone number!
                    </div>
                </div>
                
    
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" >
                    <div class="tip-email tip">
                      Wrong format of email!
                 </div>
                </div>
                
    
                <div class="form-group">
                  <label for="password1">Password</label>
                  <input type="password" class="form-control" id="password1">
                </div>
    
                <div class="form-group">
                    <label for="password2">Repeat Password</label>
                    <input type="password" class="form-control" id="password2">
                    <div class="tip-pass tip">
                      Entered passwords differ.
                  </div>
                </div>       
                <button type="submit" class="btn btn-primary">Sign up</button>
              </form>
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
        alert("hh");
        e.preventDefault();
        // return false;
    })



</script>

</html>
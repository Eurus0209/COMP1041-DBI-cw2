$(function(){
    $(".btn-login").on("click",function () {
      if($("#username").val()==''||
      $("#password").val()==''){
        swal("Please complete form!");
      }else{
        $.ajax({
          type:"post",
          url: "checkLogin.php",
          data:{
            name : $("#username").val(),
            password : $("#password").val()
          },
          success: function(msg){
            if(msg == 4){
              swal("Username dosen't exist or password is wrong!");
            }else if(msg == 1){
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
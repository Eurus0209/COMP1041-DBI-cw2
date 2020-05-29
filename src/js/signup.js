$(function(){
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
                  url : "isExist.php",
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
                          swal(msg);
                          if(msg == 1){
                            swal("Sign up successfully!");

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
})
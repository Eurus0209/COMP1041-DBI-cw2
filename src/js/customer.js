function sleep (time) {
    return new Promise((resolve) => setTimeout(resolve, time));
    }
    
$(function(){
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
                    if(msg==1){
                        swal("Success!");
                    }else{
                        swal("Failed!");
                        sleep(1500).then(() => {
                            history.go(0);
                        })
                    }
                    
                }
            })
        }
    })
    $(".cancel-btn").on("click",function(){
        var id = $(this).parent().siblings(".ord-id").html();
        swal({
            text:"Confirm to cancel?",
            buttons: true,
        }).then(function(isConfirm){
            if(isConfirm){
                $.ajax({
                type: 'POST',
                url: 'cancel.php',
                data: {ordid: id,
                },
                success: function(msg){
                    if(msg == 1){
                        swal({
                            text:"Cancel successfully!",
                            timer:2000,
                            button : false,
                        });
                    }else{
                        swal({
                            text:"Cancel failed!",
                            timer:2000,
                            button : false,
                        });
                    }
                    
                    
                    
                    sleep(1500).then(() => {
                        history.go(0);
                    })
                    
                }
                });
            
        }
    });
});
});
    
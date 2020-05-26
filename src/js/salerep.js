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
                    swal("success!");
                    window.location.herf="salerep.php";
                }
            })
        }
    })

    $(".order-label").on("click",function(){
        var str = $(this).attr("id");
        $(".ordering-table").removeClass("show");
        $("."+str).addClass("show");
        // alert(str);
    })
    
    $(".cancel-btn").on("click",function(){
        var id = $(this).parent().siblings(".ord-id").html();
        // alert(id);
        swal({
            text:"Confirm to cancel?",
            buttons: true,
        }).then(function(isConfirm){
            if(isConfirm){
                $.ajax({
                type: 'POST',
                url: 'cancel.php',
                data: {ordid: id,},
                success: function(msg){
                    if(msg==1){
                        swal({
                            text:"Cancel successfully!",
                            timer:2000,
                            button : false,
                        });
                        sleep(1500).then(() => {
                            history.go(0);
                        })
                    }
                    
                }
                })
            }
        })
    })

    $(".custname-btn").on("click",function(){
        var custname = $(this).val();
        $.ajax({
            type:"post",
            url: "getCustInfoForSr.php",
            data: {
                name: custname
            },success: function(msg) {
                var data = eval('(' + msg+ ')');
                // console.log( data[1]);
                $(".name-info").text(custname);
                $(".realname-info").text(data[0]);
                $(".email-info").text(data[1]);
                $(".phone-info").text(data[2]);
                $(".passport-info").text(data[3]);
            }
        })
    })
})
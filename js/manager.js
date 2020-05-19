$(function(){
    if(fw==1){
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

    $(".update-btn").on("click",function(){
        // alert($(this).parent().siblings(".info_quota1").children().val());
        var name = $(this).parent().siblings(".srinfo_table_name").html();
        var q1 = $(this).parent().siblings(".info_quota1").children().val();
        var q2 = $(this).parent().siblings(".info_quota2").children().val();
        var q3 = $(this).parent().siblings(".info_quota3").children().val();
        $.ajax({
            type:"post",
            url: "update_quota.php",
            data:{
                name:name,
                quota1: q1,
                quota2: q2,
                quota3: q3
            },success:function(msg){
                if(msg == 1){
                    swal("Update successfully!");
                }else{
                    swal("Failed update!");
                    history.go(0);
                }
            }
        })
    })
})
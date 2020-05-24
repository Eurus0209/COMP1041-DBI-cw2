function sleep(ms) {
    return new Promise(resolve => 
        setTimeout(resolve, ms)
    )
  }
$(function(){
    if(fw==1){
        $(".warning-tip").addClass("show-wt");
    }

    $(".selling-label").on("click",function(){
        var str = $(this).attr("id");
        $(".selling-table").removeClass("show-table");
        $(".sr-info-table").removeClass("show-table");
        $(".cust-info-table").removeClass("show-table");
        $("."+str).addClass("show-table");
    })

    $(".sr-info-label").on("click",function(){
        var str = $(this).attr("id");
        $(".selling-table").removeClass("show-table");
        $(".sr-info-table").removeClass("show-table");
        $(".cust-info-table").removeClass("show-table");
        $("."+str).addClass("show-table");
    })

    $(".cust-info-label").on("click",function(){
        var str = $(this).attr("id");
        $(".selling-table").removeClass("show-table");
        $(".sr-info-table").removeClass("show-table");
        $("."+str).addClass("show-table");
    })

    $("#srname").on("blur",function(){
        //can't contain other char except letter and digit
        var reg1 = new RegExp(/^[0-9a-zA-Z]*$/g);
    
        //must contain at least one letter
        var reg2 = new RegExp(/[A-Za-z]+/);
    
        var text = $(this).val();
        if((reg2.test(text)==false)){
          $(".tip-name2").addClass("show-tip");
        }else if((reg1.test(text)==false)){
          $(".tip-name1").addClass("show-tip");
        }
      })

    $("#srname").on("focus",function(){
        $(".tip-name1").removeClass("show-tip");
        $(".tip-name2").removeClass("show-tip");
        
    })
    
    $("#email").on("focus",function(){
        $(".email-tip").removeClass("show-tip");
        
    })
    $("#email").on("blur",function(){
        if(/([\w\-]+\@[\w\-]+\.[\w\-]+)/.test($(this).val())==false){
            $(".email-tip").addClass("show-tip");
        }
    })
    $("#phone").on("focus",function(){
        $(".phone-tip").removeClass("show-tip");
    })
    $("#phone").on("blur",function(){
        if(/\d{11}/.test($(this).val())==false){
            $(".phone-tip").addClass("show-tip");
        }
    })

    $("#repeatPassword").on("focus",function(){
        $(".password-tip").removeClass("show-tip");
    })
    $("#repeatPassword").on("blur",function(){
        if($("#inputPassword").val()!=$("#repeatPassword").val()){
            $(".password-tip").addClass("show-tip");
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
            /\d{11}/.test($("#phone").val())==false ||
            /^[0-9a-zA-Z]*$/.test($("#srname").val())==false||
        /[A-Za-z]+/.test($("#srname").val())==false
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
                                if(msg == 1){
                                    swal({
                                        text:"Add successfully!",
                                        buttons: false,
                                    });
                                      sleep(1000).then(()=>{
                                        history.go(0);
                                      })
                                }
                                
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
        var current = $(this);
        swal({
            text:"Confirm to update information?",
            buttons: true,
        }).then(function(isConfirm){
            if(isConfirm){
                var name = current.parent().siblings(".srinfo_table_name").html();
                var q1 = current.parent().siblings(".info_quota1").children().val();
                var q2 = current.parent().siblings(".info_quota2").children().val();
                var q3 = current.parent().siblings(".info_quota3").children().val();
                var region = current.parent().siblings(".srinfo_region").children().find("option:selected").text();
                $.ajax({
                    type:"post",
                    url: "update_quota.php",
                    data:{
                        name:name,
                        quota1: q1,
                        quota2: q2,
                        quota3: q3,
                        region: region
                    },success:function(msg){
                        // alert(msg);
                        if(msg == 1){
                            swal({
                                text:"Update successfully!",
                                buttons: false,
                            });
                            
                              sleep(1000).then(()=>{
                                history.go(0);
                              })
                        }else{
                            swal("Failed update!");
                        }
                    }
                })
            }
        })
        // var name = $(this).parent().siblings(".srinfo_table_name").html();
        // var q1 = $(this).parent().siblings(".info_quota1").children().val();
        // var q2 = $(this).parent().siblings(".info_quota2").children().val();
        // var q3 = $(this).parent().siblings(".info_quota3").children().val();
        // var region = $(this).parent().siblings(".srinfo_region").children().find("option:selected").text();
        // $.ajax({
        //     type:"post",
        //     url: "update_quota.php",
        //     data:{
        //         name:name,
        //         quota1: q1,
        //         quota2: q2,
        //         quota3: q3,
        //         region: region
        //     },success:function(msg){
        //         if(msg == 1){
        //             swal("Update successfully!");
        //             history.go(0);
        //         }else{
        //             swal("Failed update!");
        //             history.go(0);
        //         }
        //     }
        // })
    })

})
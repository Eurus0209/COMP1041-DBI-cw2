function compute_total(){
    var total = 0;
    for(var i=0; i<3; i++){
        var num = ($("input").get(i).value)*1.0;
        var price = ($(".info-box h4").get(i).innerHTML).substr(1)*1.0;
        total += num*price;
    }
    $(".total-value span span").html(total.toFixed(2));
}

$(function(){
    $(".minus").on("click",function(){
        var ori = $(this).siblings("input").val()*1.0;
        if(ori>0){
            $(this).siblings("input").val(ori-1);
            compute_total();
        }
    })
    $(".plus").on("click",function(){
        var ori = $(this).siblings("input").val()*1.0;
        $(this).siblings("input").val(ori+1);
        compute_total();
    })

    $("input").on("keyup",function(){
        compute_total();
    });
    
    $(".btn-purchase").on("click",function(){
    var islog = "<?php echo $islog ?>";
    if(islog == false){
        swal(
            {
                text :"Please login before purchase!",
                timer:2000,
                buttons: false,
            }
        )
    }else{
        $('.chose-sr').modal('show');
        $('.btn-confirm-sr').on("click",function(){
            var num1 = ($("input").get(0).value)*1.0;
            var num2 = ($("input").get(1).value)*1.0;
            var num3 = ($("input").get(2).value)*1.0;
            var user = "<?php echo $name ?>";
            var sr = $("#sr-selector option:selected").val();
            var flag = "<?php echo $ishavesr; ?>";
            if(num1+num2+num3 == 0){
                swal("Please select product before purchase!");
            }else if (flag == 1){
                $.ajax({
                    type: 'POST',
                    url: 'purchase.php',
                    data: {num1:num1,
                            num2 : num2,
                            num3 : num3,
                            user : user,
                            sr: sr
                    },
                    success: function(msg){
                        if(msg == 1){
                            swal({
                                text:"Purchase successfully!",
                                timer:2000,
                                button : false,
                            });
                        }else{
                            swal({
                                text:"Purchase failed!",
                                timer:2000,
                                button : false,
                            });
                        }
                        
                    }
                })
            }
            $('.chose-sr').modal('hide');
            
        })
        
    }
        
    })
})
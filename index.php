<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMS</title>
    <script src="js/jquery-1.12.3.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <!-- <script src="https://cdn.bootcdn.net/ajax/libs/sweetalert/2.1.1/sweetalert.min.js"></script> -->
    <script src = "js/sweetalert.js"> </script>
    <!-- <link rel="stylesheet" href="css/sweetalert.css"> -->
    <!-- <script src="library/font-awesome-4.7.0/css/font-awesome.css"></script> -->
    <link rel="stylesheet" href="library/font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <?php
        session_start();
        // echo json_encode($_SESSION); 
        $name = '';
        $ishavesr = 0;
        if(isset($_SESSION['username'])){
            $islog = true;
            include 'nav-after.php';
            $name = $_SESSION['username'];
            include 'conntodb.php';
            $find_re = "select * from user where name = '$name'";
            $result = $conn -> query($find_re);
            $r = $result -> fetch_assoc();
            $region = $r['region'];
            $find_sr = "select * from user where region = '$region' and role = 2";
            $result_sr = $conn -> query($find_sr);
            if($result_sr->num_rows >0){
                $sr_list = '<div class="form-group">
                <label for="sr-selector">Sale Rep:</label> 
                  <select class="form-control" id = "sr-selector" name = "s-salerep" style="font-size:16px; padding : 0 6px;">';
                while($row = $result_sr->fetch_assoc()){
                    $sr_list = $sr_list."<option value = ".$row["name"].">".$row["name"]."</option>";
                }
                $sr_list = $sr_list."</select> </div>";
                $ishavesr = 1;
            }else{
                $sr_list = "<h4> This region has no Sale Representative now!</h4>";
                $ishavesr = 0;
            }
        }else{
            $islog = false;
            include 'nav-before.php';
        }
        
    ?>

    <div class = "bg">
        <div class ="content">
            <div class="mask-box">
                <div class="mask-img-box">
                    <img src="img/n95mask.png" alt="">
                </div>
                <div class="mask-name">
                    <h1>N95 respirator</h1>
                </div>
                <div class="mask-info">
                    <div class="info-box">
                        <h4>$1.00</h4>
                        <p>N95 respirator  filters at least 95% of airborne particles.<br/></p> 
                        <div class="add-box">
                            <button class="minus">-</button>
                            <input type="text" value ="0" style="width: 30px; " onkeyup = "value = value.replace(/[^\d]/g,'')" >
                            <button class="plus">+</button>
                        </div>
                    </div>    
                    
                </div>
            </div>

            <div class="mask-box">
                <div class="mask-img-box">
                    <img src="img/mask.png" alt="">
                </div>
                <div class="mask-name">
                    <h1>surgical mask</h1>
                </div>
                <div class="mask-info">
                    <div class="info-box">
                        <h4>$1.00</h4>
                        <p>A surgical mask is intended to be worn by health professionals.<br/></p> 
                        <div class="add-box">
                            <button class="minus">-</button>
                            <input type="text" value ="0" style="width: 30px;" onkeyup = "value=value.replace(/[^\d]/g,'')">
                            <button class="plus">+</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mask-box">
                <div class="mask-img-box">
                    <img src="img/n95mask2.png" alt="">
                </div>
                <div class="mask-name">
                    <h1>surgical N95 respirator</h1>
                </div>
                <div class="mask-info">
                    <div class="info-box">
                        <h4>$1.50</h4>
                        <p>A surgical N95 respirator protect us better than the n95 mask.<br/></p> 
                        <div class="add-box">
                            <button class="minus">-</button>
                            <input type="text" value ="0" style="width: 30px;" onkeyup = "value=value.replace(/[^\d]/g,'')">
                            <button class="plus">+</button>
                        </div>
                    </div>
                </div>
            </div>

            

        </div>
    </div>
    <div class="total-box">
        
        <div class="total-value">
            <span>Total: $<span>0.00</span></span> 
        </div>

        
    </div>
    <div class="total-box">
        <button class = "purchase"  >purchase</button>
    </div>

    <div class="modal fade chose-sr" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Please Select a Sale Representative </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                echo $sr_list;
                ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary confirm-sr">Confirm</button>
            </div>
            </div>
        </div>
        </div>
</body>
<script >
    // alert($(".total-value span span").html()*1.0);
    // alert(($(".info-box h4").get(0).innerHTML).substr(1));
    
    function compute(){
        
        var total = 0;
        for(var i=0; i<3; i++){
            // alert(2);
            var num = ($("input").get(i).value)*1.0;
            
            var price = ($(".info-box h4").get(i).innerHTML).substr(1)*1.0;
            // alert(price);
            total += num*price;
            // alert(3);
        }
        // alert(total);
        $(".total-value span span").html(total.toFixed(2));
    }

    $(function(){
        // $('.chose-sr').modal('hide');
        $(".minus").on("click",function(){
            var ori = $(this).siblings("input").val()*1.0;
            if(ori>0){
                $(this).siblings("input").val(ori-1);
                // var total = $(".total-value span span").html()*1.0;
                compute();
            }
        })
        $(".plus").on("click",function(){
            var ori = $(this).siblings("input").val()*1.0;
            $(this).siblings("input").val(ori+1);
            // alert(1);
            compute();
            // alert(1);
        })

        // $("input").on("blur",function(){
        //     compute();
        // })
        $("input").on("keyup",function(){
            compute();
        });
        
        $(".purchase").on("click",function(){
            // alert("hh");
        var islog = "<?php echo $islog ?>";
        if(islog == false){
            //    alert("Please login before purchase!");
               
            swal(
                {
                    text :"Please login before purchase!",
                    timer:2000,
                    buttons: false,
                }
            )
        }else{
            $('.chose-sr').modal('show');
            $('.confirm-sr').on("click",function(){
                var num1 = ($("input").get(0).value)*1.0;
                var num2 = ($("input").get(1).value)*1.0;
                var num3 = ($("input").get(2).value)*1.0;
                var user = "<?php echo $name ?>";
                var sr = $("#sr-selector option:selected").val();
                // alert(sr);
                var flag = <?php echo $ishavesr; ?>;
                if (flag == 1){
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
    
</script>
</html>
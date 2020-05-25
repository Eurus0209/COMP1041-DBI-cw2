<?php
    $ordering_table_head = '<table class="table all-order-table">
    <thead>
    <tr>
        <th >Ord-ID</th>
        <th >Date</th>
        <th >Customer</th>
        <th >Sale Rep</th>
        <th >Region</th>
        <th >Mask Types</th>
        <th >Quantity</th>
        <th >Sales</th>
        <th >Total Sales</th>
        <th >Status</th>
    </tr>
    </thead>';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ordering</title>
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script> -->
    <script src="library/moment.js"></script>
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script> -->
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" /> -->
    <!-- <script src="library/jquery-1.12.3.js"></script> -->
    <!-- <script src="library/jquery-3.4.js"></script> -->
    <!-- <script src="library/bootstrap.js"></script> -->
    <!-- <link rel="stylesheet" href="library/bootstrap.css"> -->
    <!-- <script src="library/moment-develop/dist/moment.js"></script> -->
    <!-- <script src="library/jquery-3.4.js"></script> -->
    <!-- <script src="library/moment.js"></script> -->
    <!-- <script src="library/jquery-date-range-picker-master/dist/jquery.daterangepicker.min.js"></script>
    <link rel="stylesheet" href="library/jquery-date-range-picker-master/dist/daterangepicker.min.css"> -->
    <script src="library/date-range-picker.js"></script>
    <link rel="stylesheet" href="library/date-range-picker.css">
</head>
<body>
    <div class="row option-select-box">
        <!-- <div class="col-1"></div> -->
        <div class="col-3">
            <div class="form-group">
                <label for="sel1">Region</label>
                <select class="form-control" id="sel1">
                  <option>All </option>
                  <option>China</option>
                  <option>America</option>
                  <option>Japan</option>
                  <option>Canada</option>
                  <option>Korea</option>
                  <option>England</option>
                </select>
            </div>
        </div>


        <div class="col-3">
            <div class="form-group">
                <label for="sel2">Status</label>
                <select class="form-control" id="sel2">
                  <option>All </option>
                  <option>processing</option>
                  <option>completed</option>
                  <option>cancelled</option>
                </select>
            </div>
        </div>

        <div class="col-3">
            <div class="form-group">
                <label for="sel3">date</label>
                <input type="text" id="sel3"  class="form-control">
                
            </div>
        </div>
        <div class="col-2">
            <button class="check-btn btn">Check</button>
        </div>
    </div>
    <div class="row table-print-box">
        <div class="col-12 ordering-content-box">
            <?php
                echo $ordering_table_head;
            ?>
            <tbody class="tbody">

            </tbody>
        </div>
    </div>
    <div class="modal fade" id="userModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="userModalLabel" aria-hidden="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userModalLabel">Detailed Info</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="user-img" style="margin-top:10px;margin-left:40px;height:150px;width:150px;display:inline-block; vertical-align: top; ">
                    <img src="img/account3.png" style="height:150px" alt="">
                </div>
                <div class="user-nameinfo" style="margin-left:30px;margin-top:20px; height:150px;width:220px;display:inline-block; ">
                    <h5>Username</h5>
                    <h6 class= "name-info"></h6>
                    <br>
                    <h5>Realname</h5>
                    <h6 class= "realname-info"></h6>
                </div>
                <div class="user-otherinfo" style=" margin-top:20px; height:130px;width:420px;display:inline-block;">
                    <div class="row" style="margin-left:45px;">
                        <h5 class="col-5" >Email </h5>
                        <h5 class="col-7 email-info"></h5>
                        <h5 class="col-5">Passport-ID </h5>
                        <h5 class="col-7 id-info"></h5>
                        <h5 class="col-5">Telephone </h5>
                        <h5 class="col-7 phone-info"></h5>
                        
                    </div>
                    
                </div>
            </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="srModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="srModalLabel" aria-hidden="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="srModalLabel">Detailed Info</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="user-img" style="margin-top:10px;margin-left:40px;height:150px;width:150px;display:inline-block; vertical-align: top; ">
                    <img src="img/account1.png" style="height:150px" alt="">
                </div>
                <div class="user-nameinfo" style="margin-left:30px;margin-top:20px; height:150px;width:220px;display:inline-block; ">
                    <h5>Username</h5>
                    <h6 class= "name-info"></h6>
                    <br>
                    <h5>Realname</h5>
                    <h6 class= "realname-info"></h6>
                </div>
                <div class="user-otherinfo" style=" margin-top:20px; height:130px;width:420px;display:inline-block;">
                    <div class="row" style="margin-left:45px;">
                        <h5 class="col-5" >Email </h5>
                        <h5 class="col-7 email-info"></h5>
                        <h5 class="col-5">Employee-ID </h5>
                        <h5 class="col-7 id-info"></h5>
                        <h5 class="col-5">Telephone </h5>
                        <h5 class="col-7 phone-info"></h5>
                        
                    </div>
                    
                </div>
            </div>
            </div>
        </div>
    </div>
    
</body>
<script>
    $(function(){
      $("#sel3").each(function () {
        var $this = $(this);

        $this.daterangepicker({
          startDate: "2020-05-18",
          endDate: "2020-05-24",
          locale: {
            "format": "YYYY-MM-DD",
            "separator": " ～ ", 
            "applyLabel": "confirm",
            "cancelLabel": "cancel",
            "fromLabel": "start",
            "toLabel": "end",
            "firstDay": 1
          },
        }, function (start, end, label) {
          startDate = start.format("YYYY-MM-DD");
          endDate = end.format("YYYY-MM-DD");

        }).css("min-width", "210px").next("i").click(function () {
          $(this).parent().find('input').click();
        });
      });
    

    })

    $(".check-btn").on("click",function(){
        var region = $("#sel1").find("option:selected").text();
        var status = $("#sel2").find("option:selected").text();
        var date = $("#sel3").val();
        var sdate = date.substr(0,10)+" 00:00:00";
        var edate = date.substr(13,23)+" 23:59:59";
        // alert(edate);
        $.ajax({
            type :"post",
            url: "ma_order_back.php",
            data:{
                region: region,
                status: status,
                sdate: sdate,
                edate: edate
            },success: function(msg){
                // alert(msg);
                $(".tbody").html(msg);
            }
        })
    })


</script>
</html>
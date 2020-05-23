<?php
    session_start();
    include 'check_iscomplete.php';
    include 'conntodb.php';
    include 'print_table.php';
    $user_name = $_SESSION['username'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Ordering</title>
</head>
<script src="library/jquery-1.12.3.js"></script>
    <script src="library/bootstrap.js"></script>
    <script src="library/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="library/bootstrap.css">
    <script src = "library/sweetalert.js"> </script>
    <link rel="stylesheet" href="css/user_ordering.css">
<body>
    <?php
        include "nav_after.php";
    ?>
    <div class="total-box">
        <div class="row">
            <div class="col-2 no-pad">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">All</a>
                <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Processing</a>
                <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Completed</a>
                <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Cancelled</a>
                <a class="nav-link" id="edit-ordering-tab" data-toggle="pill" href="#edit-ordering" role="tab" aria-controls="edit-ordering" aria-selected="false">Edit</a>
                </div>
            </div>
            <div class="col-10 no-pad">
                <div class="tab-content right-side" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                    <div class="user-ordering-table">
                        <table class="table ordering-table">
                            <thead>
                            <tr>
                                <th >Ord-ID</th>
                                <th >Date</th>
                                <th >Sale Rep</th>
                                <th >Mask Types</th>
                                <th >Quantity</th>
                                <th >Sales</th>
                                <th >Total Sales</th>
                                <th >Status </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                $find_sql = "select * from ordering where custname = '$user_name'";
                                $td = print_table_user_ordering($find_sql,$conn);
                                echo $td;
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                    <div class="user-ordering-table">
                        <table class="table ordering-table">
                            <thead>
                            <tr>
                                <th >Ord-ID</th>
                                <th >Date</th>
                                <th >Sale Rep</th>
                                <th >Mask Types</th>
                                <th >Quantity</th>
                                <th >Sales</th>
                                <th >Total Sales</th>
                                <th >Status </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                $find_sql = "select * from ordering where custname = '$user_name' and status = 'processing'";
                                $td = print_table_user_ordering($find_sql,$conn);
                                echo $td;
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                    <div class="user-ordering-table">
                        <table class="table ordering-table">
                            <thead>
                            <tr>
                                <th >Ord-ID</th>
                                <th >Date</th>
                                <th >Sale Rep</th>
                                <th >Mask Types</th>
                                <th >Quantity</th>
                                <th >Sales</th>
                                <th >Total Sales</th>
                                <th >Status </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                $find_sql = "select * from ordering where custname = '$user_name'and status = 'completed'";
                                $td = print_table_user_ordering($find_sql,$conn);
                                echo $td;
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                    <div class="user-ordering-table">
                        <table class="table ordering-table">
                            <thead>
                            <tr>
                                <th >Ord-ID</th>
                                <th >Date</th>
                                <th >Sale Rep</th>
                                <th >Mask Types</th>
                                <th >Quantity</th>
                                <th >Sales</th>
                                <th >Total Sales</th>
                                <th >Status </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                $find_sql = "select * from ordering where custname = '$user_name'and status = 'cancelled'";
                                $td = print_table_user_ordering($find_sql,$conn);
                                echo $td;
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="edit-ordering" role="tabpanel" aria-labelledby="edit-ordering">
                    <div class="user-ordering-table">
                        <table class="table ordering-table">
                            <thead>
                            <tr>
                                <th >Ord-ID</th>
                                <th >Date</th>
                                <th >Sale Rep</th>
                                <th >Mask Types</th>
                                <th >Quantity</th>
                                <th >Sales</th>
                                <th >Total Sales</th>
                                <th >Edit </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                $find_sql = "select * from ordering where custname = '$user_name'and status = 'processing'";
                                $result = $conn -> query($find_sql);
                                $td = "";
                                if($result->num_rows > 0){
                                    
                                    while($row = $result->fetch_assoc()){

                                        $td = $td."<tr> <th rowspan=3 class ='ord-id' >".$row["orderid"]."</th>";
                                        $td = $td."<td rowspan=3>" .$row["date"]."</td>";
                                        $td = $td."<td rowspan=3>" .$row["salerep"]."</td>";

                                        $td = $td."<td>"."N95 respirator"."</td>";
                                        $td = $td."<td>".$row['type1']."</td>";
                                        $td = $td."<td> $".number_format($row['type1'], 2)."</td>";
                                        
                                        $td = $td."<td rowspan=3> $".number_format($row["totalsales"], 2)."</td>";
                                        $td = $td."<td rowspan=3> <button class = 'cancel-btn'>cancel</button></td> </tr>";
                                        $td = $td."<tr> <td>"."surgical mask"."</td>";
                                        $td = $td."<td>".$row['type2']."</td>";
                                        $td = $td."<td> $".number_format($row['type2'], 2)."</td> </tr>";
                                        $td = $td."<tr> <td>"."surgical N95 respirator"."</td>";
                                        $td = $td."<td>".$row['type3']."</td>";
                                        $td = $td."<td> $".number_format($row['type3']*1.5, 2)."</td> </tr>";
                                    }
                                }
                                echo $td;
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    
    
</body>
<script>
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
                    
                    
                    function sleep (time) {
                    return new Promise((resolve) => setTimeout(resolve, time));
                    }
                    
                    sleep(1500).then(() => {
                        history.go(0);
                    })
                    
                }
            });
            
        }
    });
});

</script>
</html>
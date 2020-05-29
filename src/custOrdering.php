<?php
// this is ordering page for customer
    session_start();
    if(isset($_SESSION['username'])){
        $user_name = $_SESSION['username'];
    }else{
        echo '<script>window.location.href="index.php";</script>';
        exit();
    }

    // check ordeirng complete or not
    include 'checkIsComplete.php';
    include 'conntodb.php';
    include 'printTableFunction.php';
    
    $table_head1 = '<table class="table ordering-table">
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
    <tbody>';
    $table_head2 = '<table class="table ordering-table">
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
    <tbody>';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Ordering</title>
</head>
<script src="../published/jquery-1.12.3.js"></script>
    <script src="../published/bootstrap.js"></script>
    <script src="../published/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="../published/bootstrap.css">
    <script src = "../published/sweetalert.js"> </script>
    <script src="js/customer.js"></script>
    <link rel="stylesheet" href="css/user_ordering.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<body>
    <?php
        include "navAfter.php";
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
                            <?php
                                echo $table_head1;
                                $find_sql = "SELECT * FROM ordering WHERE custname = '$user_name'";
                                $td = print_table_user_ordering($find_sql,$conn);
                                echo $td;
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                    <div class="user-ordering-table">
                            <?php
                                echo $table_head1;
                                $find_sql = "SELECT * FROM ordering WHERE custname = '$user_name' AND status = 'processing'";
                                $td = print_table_user_ordering($find_sql,$conn);
                                echo $td;
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                    <div class="user-ordering-table">
                            <?php
                                echo $table_head1;
                                $find_sql = "SELECT * FROM ordering WHERE custname = '$user_name' AND status = 'completed'";
                                $td = print_table_user_ordering($find_sql,$conn);
                                echo $td;
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                    <div class="user-ordering-table">
                        
                            <?php
                                echo $table_head1;
                                $find_sql = "SELECT * FROM ordering WHERE custname = '$user_name' AND status = 'cancelled'";
                                $td = print_table_user_ordering($find_sql,$conn);
                                echo $td;
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="edit-ordering" role="tabpanel" aria-labelledby="edit-ordering">
                    <div class="user-ordering-table">
                        
                            <?php
                                echo $table_head2;
                                $find_sql = "SELECT * FROM ordering WHERE custname = '$user_name' AND status = 'processing'";
                                $result = $conn -> query($find_sql);
                                $td = "";
                                if($result->num_rows > 0){      
                                    $count = 0;
                                    while($row = $result->fetch_assoc()){
                                        $count++;
                                        if($count%2==0){
                                            $classname = "bg1";
                                        }else{
                                            $classname = "bg2";
                                        }
                                        $td = $td."<tr class='".$classname."'> <th rowspan=3 class ='ord-id' >".$row["orderid"]."</th>";
                                        $td = $td."<td rowspan=3>" .$row["date"]."</td>";
                                        $td = $td."<td rowspan=3>" .$row["srname"]."</td>";

                                        $td = $td."<td>"."N95 respirator"."</td>";
                                        $td = $td."<td>".$row['type1']."</td>";
                                        $td = $td."<td> $".number_format($row['type1'], 2)."</td>";
                                        
                                        $td = $td."<td rowspan=3> $".number_format($row["totalsales"], 2)."</td>";
                                        $td = $td."<td rowspan=3> <button type ='button' class = 'cancel-btn'>cancel</button></td> </tr>";
                                        $td = $td."<tr class='".$classname."'> <td>"."surgical mask"."</td>";
                                        $td = $td."<td>".$row['type2']."</td>";
                                        $td = $td."<td> $".number_format($row['type2'], 2)."</td> </tr>";
                                        $td = $td."<tr class='".$classname."'> <td>"."surgical N95 respirator"."</td>";
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
</html>

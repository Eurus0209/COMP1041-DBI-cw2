<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
    <table class="table custinfo-table">
        <thead>
        <tr>
            <th >PassportID</th>
            <th >Name</th>
            <th >Realname</th>
            <th >Email</th>
            <th >Region</th>
            <th >Phone</th>
            <th ></th>
        </tr>
        </thead>
        <tbody>
             <?php
                echo $custInfoStr;
             ?>
        </tbody>
    </table>
    <!-- customer purchase situation box -->
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Detailed</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="typeRoseChart" style="width:250px;height:200px; display:inline-block;"></div>
                <div class="cust-modal-table" style="width:200px; height:200px;display:inline-block;">
                    <table class="table" style="margin:20px 0;">
                        <tbody>
                            <tr>
                                <th>Ordering Amount</th>
                                <td class="order-amount">0</td>
                            </tr>
                            <tr>
                                <th>Total Quantity</th>
                                <td class="total-quantity">0</td>
                            </tr>
                            <tr>
                                <th>Total Sales</th>
                                <td class="total-sale">0</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
        </div>
    </div>
</body>
</html>
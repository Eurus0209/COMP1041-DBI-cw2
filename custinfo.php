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
<script>
    $(".btn-detail").on("click",function(){
        var custname = $(this).parent().siblings(".cust-name").text();
        $.ajax({
            type:"post",
            url:"cust_detail.php",
            data: {
                name: custname
            },success: function(data){
                var arr = eval('(' + data+ ')');
                $('#staticBackdrop').modal('show');
                var myChart = echarts.init(document.getElementById('typeRoseChart'));
                var option1 = { 
                        tooltip: {
                            trigger: 'item',
                            formatter: '{a} <br/>{b} : {c}'
                        },
                        legend: {
                            data: [{name:'N95'},
                                {name:'Surgial'},
                                {name:'N95-surgial'},
                                ]
                        },
                        series : [
                            {
                                name: 'Purchase detail',
                                type: 'pie',
                                radius: '45%',
                                roseType: 'area',
                                color: ['#6b88ac','#364b61','#4a6483','#526e91'],
                                data:[
                                    {value:arr[1][0], name:'N95'},
                                    {value:arr[1][1], name:'Surgial'},
                                    {value:arr[1][2], name:'N95-surgial'},
                                ]
                            }
                        ]
                    };
                myChart.setOption(option1);
                var quantity = arr[1][0]*1.0+arr[1][1]*1.0+arr[1][2]*1.0;
                var sales = arr[1][0]*1.0+arr[1][1]*1.0+arr[1][2]*1.5;
                $(".order-amount").text(arr[0]);
                $(".total-quantity").text(quantity);
                $(".total-sale").text("$"+sales);
            }
        })
    })
</script>
</html>
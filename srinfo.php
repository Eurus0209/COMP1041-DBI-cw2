<div class="sr-detail-info-box">
    <table class="table sr-detail-info-table">
        <thead>
            <tr>
            <th scope="col">employeeID</th>
            <th scope="col">Name</th>
            <th scope="col">Realame</th>
            <th scope="col">Region</th>
            <th scope="col">Phone</th>
            <th scope="col">N95 quota</th>
            <th scope="col">surgial quota</th>
            <th scope="col">N95-surgial quota</th>
            <th scope="col"></th>
            <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td >1</th>
                <td>rep1</td>
                <td>China</td>
                <td>18055220209</td>
                <td><input type="text" class = "form-control" value = 200></td>
                <td><input type="text" class = "form-control" value = 200></td>
                <td><input type="text" class = "form-control" value = 200></td>
                <td><a href="javascript:;" class = "expand">detail</a></td>
                <td><input type="button" class ="save-btn" value="save"></td>
            </tr>
            <tr>
                <td colspan="9" class = "detail-box show-cell" id = 'rep1'>
                    <div class="detail-content row">
                        <div class="col-1"></div>
                        <div class="col-1 chart-column">
                            <div class ="quota-chart" id="achart1" style="height: 80px; width: 80px; "></div>
                            <div class ="quota-chart" id="achart2" style="height: 80px; width: 80px; "></div>
                            <div class ="quota-chart" id="achart3" style="height: 80px; width: 80px; "></div>
                        </div>
                        <div class="col-5 chart-column">
                            <div id="barchart1" style="height: 240px; width: 400px ; display: inline-block;"></div>
                        </div>
                        <div class="col-2 chart-column">
                            <table class="table inner-table">
                                <tbody>
                                    <tr>
                                        <th scope="row">N95</th>
                                        <td>100</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Surgial</th>
                                        <td>100</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">N95-surgial</th>
                                        <td>100</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<script >
    var n95 = echarts.init(document.getElementById("achart1"));
    var surgial = echarts.init(document.getElementById("achart2")); 
    var chart3 = echarts.init(document.getElementById("achart3")); 
    var barchart1 = echarts.init(document.getElementById("barchart1"));
    var option1 = {
        tooltip: {
            trigger: 'item',
            formatter: '{a} <br/>{b}: {c}'
        },
        color:['#425569','#5b7794','#94aac2','#ff7979'],
        // legend: {
        //     orient: 'vertical',
        //     // left: 30,
        //     data: ['completed', 'processing', 'remaining','exceed'],
        // },
        series: [
            {
                name: 'N95-respirator',
                type: 'pie',
                radius: [20, 30],
                avoidLabelOverlap: false,
                // top: 50,
                label: {
                    show: false,
                    position: 'center'
                },
                labelLine: {
                    show: true
                },
                data: [
                    {value: 230, name: 'completed'},
                    {value: 20, name: 'processing'},
                    {value: 0, name: 'remaining'},
                    {value: 30, name: 'exceed'},
                ]
            }
        ]
    };
    var option2= {
        xAxis:{
            data: ['13/5','14/5','15/5','16/5','17/5']
        },
        yAxis:{
            type:"value",
        },
        legend: {
            // type: 'scroll',
            // bottom: 10,
            top:10,
            data: [{name:'N95'},
                {name:'Surgial'},
                {name:'N95 Surgial'},
                {name:'Average'}
                    
                ]
        },
        tooltip: {
            trigger: 'item',
            formatter: '{a} <br/>{b} : {c}'
        },
        dataZoom: [
            {   // 这个dataZoom组件，默认控制x轴。
                type: 'slider', // 这个 dataZoom 组件是 slider 型 dataZoom 组件
                // start: 10,      // 左边在 10% 的位置。
                // end: 60         // 右边在 60% 的位置。
            }
        ],
        series: [
            {
                color:['#82ccdd'],
                type:'bar',
                name:'N95',
                data:[20,30,10,40,100]
            },
            {
                color:['#60a3bc'],
                name:'Surgial',
                type:'bar',
                data:[40,10,40,50,30]
            },
            {
                color:['rgb(65, 83, 102)'],
                name:'N95 Surgial',
                type:'bar',
                data:[100,30,20,10,40]
            },
            {
                color:['#34495e'],
                name: 'Average',
                type:'line',
                data:[40,21,40,50,30]
            }
        ]
    }
    n95.setOption(option1);
    surgial.setOption(option1);
    chart3.setOption(option1);
    barchart1.setOption(option2);
    $(function(){
        $(".expand").on("click",function(){
            // var al = new Array("a",1,new Array(new Array("hh","hei"),2,3));
            // alert(al[2][0]);
            var a = $(this).parent().siblings()[1];
            var idname = a.innerHTML;
            if($("#"+idname+"-label").hasClass("show-cell")){
                $("#"+idname+"-label").removeClass("show-cell");
            }else{
                $("#"+idname+"-label").addClass("show-cell");
            }
            
        })
    })
</script>
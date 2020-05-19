<?php
    $numOfSR = count($srInfoList);
    $tStr = '';
    $sStr = '';
    $dataList = array();
    $date = getDateFromRange($startdate,$now_date);
    $json_date = json_encode($date);
    for($i=0;$i<$numOfSR; $i++){
        $srInfo = $srInfoList[$i];
        $saleNum = $srInfo[9];
        $numInfo = $srInfo[8];
        $json_maskNum = json_encode($numInfo);
        $total1 = $saleNum[0][0]+$saleNum[0][1];
        $total2 = $saleNum[1][0]+$saleNum[1][1];
        $total3 = $saleNum[2][0]+$saleNum[2][1];
        $tStr = $tStr.'<tr>
        <td >'.$srInfo[0].'</th>
        <td>'.$srInfo[1].'</td>
        <td>'.$srInfo[3].'</td>
        <td>'.$srInfo[4].'</td>
        <td>'.$srInfo[2].'</td>
        <td>'.$srInfo[5].'</td>
        <td>'.$srInfo[6].'</td>
        <td>'.$srInfo[7].'</td>
        
        <td><a href="javascript:;" class = "expand"><i class="fa fa-chevron-down"></i></a></td>
        <td><input type="button" class ="re-grant-btn" value="re-grant"></td>
        <td><input type="button" class ="update-btn" value="update"></td>
    </tr>';
        $tStr = $tStr.'<tr><td colspan="10" class = "detail-box" id = "'.$srInfo[1].'-label'.'">
        <div class="detail-content row">
            <div class="col-1"></div>
            <div class="col-1 chart-column">
                <div class ="quota-chart" id="'.$srInfo[1].'-chart1" style="height: 80px; width: 80px; "></div>
                <div class ="quota-chart" id="'.$srInfo[1].'-chart2" style="height: 80px; width: 80px; "></div>
                <div class ="quota-chart" id="'.$srInfo[1].'-chart3" style="height: 80px; width: 80px; "></div>
            </div>
            <div class="col-5 chart-column">
                <div id="'.$srInfo[1].'barchart" style="height: 240px; width: 400px ; display: inline-block;"></div>
            </div>
            <div class="col-2 chart-column">
                <table class="table inner-table">
                    <tbody>
                        <tr>
                            <th scope="row">N95 respirator</th>
                            <td>'.$total1.'</td>
                        </tr>
                        <tr>
                            <th scope="row">Surgial mask</th>
                            <td>'.$total2.'</td>
                        </tr>
                        <tr>
                            <th scope="row">N95-surgial</th>
                            <td>'.$total3.'</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </td> </tr>
    ';


    $sStr = $sStr .'var '.$srInfo[1]."chart1".' = echarts.init(document.getElementById("'.$srInfo[1].'-chart1"));
    var '.$srInfo[1]."chart2".' = echarts.init(document.getElementById("'.$srInfo[1].'-chart2")); 
    var '.$srInfo[1]."chart3".' = echarts.init(document.getElementById("'.$srInfo[1].'-chart3")); 
    var '.$srInfo[1].'barchart = echarts.init(document.getElementById("'.$srInfo[1].'barchart"));';
    

    // $sStr = $sStr. '';
    for($j=0; $j<3; $j++){
        $sStr = $sStr ."var option".$srInfo[1].'_'.$j." = {
            tooltip: {
                trigger: 'item',
                formatter: '{a} <br/>{b}: {c}'
            },
            color:['#425569','#5b7794','#94aac2','#ff7979'],
            series: [
                {
                    name: 'N95-respirator',
                    type: 'pie',
                    radius: [20, 30],
                    avoidLabelOverlap: false,
                    label: {
                        show: false,
                        position: 'center'
                    },
                    labelLine: {
                        show: true
                    },
                    data: [
                        {value: ".$saleNum[$j][0].", name: 'completed'},
                        {value: ".$saleNum[$j][1].", name: 'processing'},
                        {value: ".$saleNum[$j][2].", name: 'remaining'},
                        {value: ".$saleNum[$j][3].", name: 'exceed'},
                    ]
                }
            ]
        };";
    }

    $sStr = $sStr.'
            var num_info = '.$json_maskNum .';
            var dateinfo = '.$json_date.';
            var data = getData(dateinfo, num_info);
    ';

    
    $sStr = $sStr."
    var option2= {
        xAxis:{
            data: data.date
        },
        yAxis:{
            type:'value',
        },
        legend: {
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
            { 
                type: 'slider', 
                start: 10,    
                end: 60         
            }
        ],
        series: [
            {
                color:['#82ccdd'],
                type:'bar',
                name:'N95',
                data:data.type1
            },
            {
                color:['#60a3bc'],
                name:'Surgial',
                type:'bar',
                data:data.type2
            },
            {
                color:['rgb(65, 83, 102)'],
                name:'N95 Surgial',
                type:'bar',
                data:data.type3
            },
            {
                color:['#34495e'],
                name: 'Average',
                type:'line',
                data:data.ave
            }
        ]
    }
    ";


    $sStr = $sStr.$srInfo[1]."chart1".'.setOption(option'.$srInfo[1].'_0);
    '.$srInfo[1].'chart2.setOption(option'.$srInfo[1].'_1);
    '.$srInfo[1].'chart3.setOption(option'.$srInfo[1].'_2);
    '.$srInfo[1].'barchart.setOption(option2);';
    }
?>

<?php
    include 'conntodb.php';
    $date = getDateFromRange($startdate,$now_date);
    $json_date = json_encode($date);

    
?>

<head>
<!-- <script src="https://cdn.bootcdn.net/ajax/libs/echarts/4.7.0/echarts-en.common.js"></script> -->
<script src="library/echarts-4.8.0/dist/echarts.min.js"></script>
<script>
    function getData(dateinfo, numinfo){
        var date = [];
        var type1 = [];
        var type2 = [];
        var type3 = [];
        var ave = [];
        for(var i=0; i<dateinfo.length; i++){
            date.push(dateinfo[i].substr(5));
            type1.push(numinfo[0][i]);
            type2.push(numinfo[1][i]);
            type3.push(numinfo[2][i]);
            ave.push(Math.round((numinfo[0][i]+numinfo[1][i]+numinfo[2][i])/3));
        }
        return {
            date:date,
            type1: type1,
            type2: type2,
            type3: type3,
            ave:ave
        }
    }
</script>
<style>
    .charts{
        margin-top: 10vh;
    }
    .pie-chart{
        display: inline-block;
    }
    .pie-chart-box{
        margin-top: 8vh;
    }
    .all-region-bar-chart{
        margin-top:5vh;
    }
</style>
</head>
<div class="content-box">
    <ul class="nav nav-tabs sell-nav-box" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active nav-link-use" id="all-region-tab" data-toggle="tab" href="#all-region" role="tab" aria-controls="all-region" aria-selected="true">All Region</a>
        </li>
        <li class="nav-item">
            <a class="nav-link nav-link-use" id="china-tab" data-toggle="tab" href="#china" role="tab" aria-controls="china" aria-selected="false">China</a>
        </li>
        <li class="nav-item">
            <a class="nav-link nav-link-use" id="amercian-tab" data-toggle="tab" href="#amercian" role="tab" aria-controls="amercian" aria-selected="false">America</a>
        </li>
        <li class="nav-item">
            <a class="nav-link nav-link-use" id="england-tab" data-toggle="tab" href="#england" role="tab" aria-controls="england" aria-selected="false">England</a>
        </li>
        <li class="nav-item">
            <a class="nav-link nav-link-use" id="canada-tab" data-toggle="tab" href="#canada" role="tab" aria-controls="canada" aria-selected="false">Canada</a>
        </li>
        <li class="nav-item">
            <a class="nav-link nav-link-use" id="japan-tab" data-toggle="tab" href="#japan" role="tab" aria-controls="japan" aria-selected="false">Japan</a>
        </li>
        <li class="nav-item">
            <a class="nav-link nav-link-use" id="korea-tab" data-toggle="tab" href="#korea" role="tab" aria-controls="korea" aria-selected="false">Korea</a>
        </li>
    </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="all-region" role="tabpanel" aria-labelledby="all-region-tab">
                <div class="pie-chart-box">
                    <div id="main1" class ="pie-chart" style="width: 300px;height:300px;"></div>
                    <div id="main2" class ="pie-chart" style="width: 300px;height:300px;"></div>
                    <div id="main3" class ="pie-chart" style="width: 300px;height:300px;"></div>
                </div>
                <div id="all-bar-chart" class="all-region-bar-chart" style="width: 700px;height:350px;"></div>
                <?php
                    $masknum_all = getDateAllMaskNum($date,$conn);
                    $json_num_all = json_encode($masknum_all);
                ?>
                <script>
                    var all_num = <?php echo $json_num_all ;?>;
                    var dateinfo = <?php echo $json_date ;?>;
                    var data = getData(dateinfo,all_num);
                    var datazoom = echarts.init(document.getElementById("all-bar-chart"));
                    <?php
                        include 'chart1.php';
                    ?>

                </script>
                <script type="text/javascript">
                    var myChart1 = echarts.init(document.getElementById('main1'));
                    var myChart2 = echarts.init(document.getElementById('main2'));
                    var myChart3 = echarts.init(document.getElementById('main3'));

                    var option1 = { 
                        title:{
                            show:true,
                            text: "N95 respirator",
                            x: 'center',
                            textStyle: {
                                fontFamily: 'Arial, Verdana, sans...',
                                fontSize: 14,
                                fontStyle: 'normal',
                                fontWeight: 'normal',
                            },
                        },
                        tooltip: {
                            trigger: 'item',
                            formatter: '{a} <br/>{b} : {c}'
                        },
                        series : [
                            {
                                name: 'N95',
                                type: 'pie',
                                // radius: '55%',
                                roseType: 'area',
                                radius: [15, 60],
                                // roseType: 'angle',
                                color: ['#6b88ac','#364b61','#415974','#4a6483','#526e91','#5c7ba1'],
                                data:[
                                    {value:<?php echo $China[0] ?>, name:'China'},
                                    {value:<?php echo $America[0] ?>, name:'America'},
                                    {value:<?php echo $Canada[0] ?>, name:'Canada'},
                                    {value:<?php echo $Korea[0] ?>, name:'Korea'},
                                    {value:<?php echo $England[0] ?>, name:'England'},
                                    {value:<?php echo $Japan[0] ?>, name:'Japan'}
                                ]
                            }
                        ]
                    };
                    var option2 = {
                        title:{
                            show:true,
                            text: "Surgial mask",
                            x: 'center',
                            textStyle: {
                                fontFamily: 'Arial, Verdana, sans...',
                                fontSize: 14,
                                fontStyle: 'normal',
                                fontWeight: 'normal',
                            },
                        },
                        tooltip: {
                            trigger: 'item',
                            formatter: '{a} <br/>{b} : {c}'
                        },
                        series : [
                            {
                                name: 'Surgial',
                                type: 'pie',
                                radius: '55%',
                                roseType: 'area',
                                radius: [20, 70],
                                color: [' #2c3e50','#364b61','#415974','#4a6483','#526e91','#5c7ba1'],
                                data:[
                                    {value:<?php echo $China[1] ?>, name:'China'},
                                    {value:<?php echo $America[1] ?>, name:'America'},
                                    {value:<?php echo $Canada[1] ?>, name:'Canada'},
                                    {value:<?php echo $Korea[1] ?>, name:'Korea'},
                                    {value:<?php echo $England[1] ?>, name:'England'},
                                    {value:<?php echo $Japan[1] ?>, name:'Japan'}
                                ]
                            }
                        ]
                    };
                    var option3 = {
                        title:{
                            show:true,
                            text: "N95-surgial",
                            x: 'center',
                            textStyle: {
                                fontFamily: 'Arial, Verdana, sans...',
                                fontSize: 14,
                                fontStyle: 'normal',
                                fontWeight: 'normal',
                            },
                        },
                        tooltip: {
                            trigger: 'item',
                            formatter: '{a} <br/>{b} : {c}'
                        },
                        series : [
                            {
                                name: 'N95 Surgial',
                                type: 'pie',
                                radius: '55%',
                                roseType: 'area',
                                radius: [20, 70],
                                color: ['#6b88ac','#364b61','#415974','#4a6483','#526e91','#5c7ba1'],
                                data:[
                                    {value:<?php echo $China[2] ?>, name:'China'},
                                    {value:<?php echo $America[2] ?>, name:'America'},
                                    {value:<?php echo $Canada[2] ?>, name:'Canada'},
                                    {value:<?php echo $Korea[2] ?>, name:'Korea'},
                                    {value:<?php echo $England[2] ?>, name:'England'},
                                    {value:<?php echo $Japan[2] ?>, name:'Japan'}
                                ]
                            }
                        ]
                    };
            
                    myChart1.setOption(option1);
                    myChart2.setOption(option2);
                    myChart3.setOption(option3);
                </script>
            </div>
        <div class="tab-pane fade" id="china" role="tabpanel" aria-labelledby="china-tab">
            <div id="china-chart" class = "charts" style ="display:inline-block; width: 600px;height:300px;"></div>
            
            <?php                 
                $masknum_china = getDateMaskNum($date,'China',$conn);
                $json_num_china = json_encode($masknum_china);
                $total1 = array_sum( $masknum_china[0]);
                $total2 = array_sum( $masknum_china[1]);
                $total3 = array_sum( $masknum_china[2]);
                echo print_table_region_total($total1,$total2,$total3);
                
            ?>
            <script>
                var china_num = <?php echo $json_num_china ;?>;
                var dateinfo = <?php echo $json_date ;?>;
                
                var data = getData(dateinfo,china_num);
                var datazoom = echarts.init(document.getElementById("china-chart"));
               
                <?php
                    include 'chart1.php';
                ?>
                
            </script>
            

        </div>
        <div class="tab-pane fade" id="amercian" role="tabpanel" aria-labelledby="amercian-tab">
            <div id="amercian-chart" class = "charts" style ="display:inline-block; width: 600px;height:300px;"></div>
            <?php
                $masknum_amer = getDateMaskNum($date,'America',$conn);
                $json_num_amer = json_encode($masknum_amer);
                $total1 = array_sum( $masknum_amer[0]);
                $total2 = array_sum( $masknum_amer[1]);
                $total3 = array_sum( $masknum_amer[2]);
                echo print_table_region_total($total1,$total2,$total3);
            ?>
            <script>
                var amer_num = <?php echo $json_num_amer ;?>;
                var dateinfo = <?php echo $json_date ;?>;
                var data = getData(dateinfo,amer_num);
                var datazoom = echarts.init(document.getElementById("amercian-chart"));
                
                <?php
                    include 'chart1.php';
                ?>

            </script>
            
        </div>
        <div class="tab-pane fade" id="england" role="tabpanel" aria-labelledby="england-tab">
            <div id="england-chart" class = "charts" style ="display:inline-block; width: 600px;height:300px; "></div>
            <?php
                $masknum_eng = getDateMaskNum($date,'England',$conn);
                $json_num_eng = json_encode($masknum_eng);
                $total1 = array_sum( $masknum_eng[0]);
                $total2 = array_sum( $masknum_eng[1]);
                $total3 = array_sum( $masknum_eng[2]);
                echo print_table_region_total($total1,$total2,$total3);
            ?>
            <script>
                var eng_num = <?php echo $json_num_eng ;?>;
                var dateinfo = <?php echo $json_date ;?>;
                var data = getData(dateinfo,eng_num);
                var datazoom = echarts.init(document.getElementById("england-chart"));
                <?php
                    include 'chart1.php';
                ?>

            </script>
        </div>
        <div class="tab-pane fade" id="canada" role="tabpanel" aria-labelledby="canada-tab">
            <div id="canada-chart" class = "charts" style ="display:inline-block; width: 600px;height:300px; "></div>
            <?php
                $masknum_can = getDateMaskNum($date,'Canada',$conn);
                $json_num_can = json_encode($masknum_can);
                $total1 = array_sum( $masknum_can[0]);
                $total2 = array_sum( $masknum_can[1]);
                $total3 = array_sum( $masknum_can[2]);
                echo print_table_region_total($total1,$total2,$total3);
            ?>
            <script>
                var can_num = <?php echo $json_num_can ;?>;
                var dateinfo = <?php echo $json_date ;?>;
                var data = getData(dateinfo,can_num);
                var datazoom = echarts.init(document.getElementById("canada-chart"));
                <?php
                    include 'chart1.php';
                ?>

            </script>
        </div>
        <div class="tab-pane fade" id="japan" role="tabpanel" aria-labelledby="japan-tab">
            <div id="japan-chart" class = "charts" style ="display:inline-block; width: 600px;height:300px; "></div>
                <?php
                    $masknum_jap = getDateMaskNum($date,'Japan',$conn);
                    $json_num_jap = json_encode($masknum_jap);
                    $total1 = array_sum( $masknum_jap[0]);
                    $total2 = array_sum( $masknum_jap[1]);
                    $total3 = array_sum( $masknum_jap[2]);
                    echo print_table_region_total($total1,$total2,$total3);
                ?>
                <script>
                    var jap_num = <?php echo $json_num_jap ;?>;
                    var dateinfo = <?php echo $json_date ;?>;
                    var data = getData(dateinfo,jap_num);
                    var datazoom = echarts.init(document.getElementById("japan-chart"));
                    <?php
                        include 'chart1.php';
                    ?>

                </script>
        </div>
        <div class="tab-pane fade" id="korea" role="tabpanel" aria-labelledby="korea-tab">
            <div id="korea-chart" class = "charts" style ="display:inline-block; width: 600px;height:300px; "></div>
                <?php
                    $masknum_kor = getDateMaskNum($date,'Korea',$conn);
                    $json_num_kor = json_encode($masknum_kor);
                    $total1 = array_sum( $masknum_kor[0]);
                    $total2 = array_sum( $masknum_kor[1]);
                    $total3 = array_sum( $masknum_kor[2]);
                    echo print_table_region_total($total1,$total2,$total3);
                ?>
                <script>
                    var kor_num = <?php echo $json_num_kor ;?>;
                    var dateinfo = <?php echo $json_date ;?>;
                    var data = getData(dateinfo,kor_num);
                    var datazoom = echarts.init(document.getElementById("korea-chart"));
                    <?php
                        include 'chart1.php';
                    ?>

                </script>
            </div>
    </div>
</div>

        

        

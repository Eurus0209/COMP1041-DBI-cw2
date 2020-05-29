<?php
// under ordering page
    include 'conntodb.php';
    $selling_proce_table_head = '<table class="table under-porcessing-table">
    <thead>
    <tr>
        <th >Ord-ID</th>
        <th >Date</th>
        <th >Customer</th>
        <th >Sale Rep</th>
        <th >Mask Types</th>
        <th >Quantity</th>
        <th >Sales</th>
        <th >Total Sales</th>
    </tr>
    </thead>';

?>

<div class="content-box">
    <ul class="nav nav-tabs sell-nav-box" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="all-region-processing-tab" data-toggle="tab" href="#all-region-processing" role="tab" aria-controls="all-region-processing" aria-selected="true">All Region</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="china-processing-tab" data-toggle="tab" href="#china-processing" role="tab" aria-controls="china-processing" aria-selected="false">China</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="amercian-processing-tab" data-toggle="tab" href="#amercian-processing" role="tab" aria-controls="amercian-processing" aria-selected="false">America</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="england-processing-tab" data-toggle="tab" href="#england-processing" role="tab" aria-controls="england-processing" aria-selected="false">England</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="canada-processing-tab" data-toggle="tab" href="#canada-processing" role="tab" aria-controls="canada-processing" aria-selected="false">Canada</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="japan-processing-tab" data-toggle="tab" href="#japan-processing" role="tab" aria-controls="japan-processing" aria-selected="false">Japan</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="korea-processing-tab" data-toggle="tab" href="#korea-processing" role="tab" aria-controls="korea-processing" aria-selected="false">Korea</a>
        </li>
    </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="all-region-processing" role="tabpanel" aria-labelledby="all-region-processing-tab">
                <div class="pie-chart-box">
                    <div id="main4" class ="pie-chart" style="width: 300px;height:300px;"></div>
                    <div id="main5" class ="pie-chart" style="width: 300px;height:300px;"></div>
                    <div id="main6" class ="pie-chart" style="width: 300px;height:300px;"></div>
                </div>
                <?php
                // get selling situation
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
                    var myChart1 = echarts.init(document.getElementById('main4'));
                    var myChart2 = echarts.init(document.getElementById('main5'));
                    var myChart3 = echarts.init(document.getElementById('main6'));

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
                                roseType: 'area',
                                radius: [20, 70],
                                color: ['#6b88ac','#364b61','#415974','#4a6483','#526e91','#5c7ba1'],
                                data:[
                                    {value:<?php echo $China_processing[0] ?>, name:'China'},
                                    {value:<?php echo $America_processing[0] ?>, name:'America'},
                                    {value:<?php echo $Canada_processing[0] ?>, name:'Canada'},
                                    {value:<?php echo $Korea_processing[0] ?>, name:'Korea'},
                                    {value:<?php echo $England_processing[0] ?>, name:'England'},
                                    {value:<?php echo $Japan_processing[0] ?>, name:'Japan'}
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
                                roseType: 'area',
                                radius: [20, 70],
                                color: ['#6b88ac','#364b61','#415974','#4a6483','#526e91','#5c7ba1'],
                                data:[
                                    {value:<?php echo $China_processing[1] ?>, name:'China'},
                                    {value:<?php echo $America_processing[1] ?>, name:'America'},
                                    {value:<?php echo $Canada_processing[1] ?>, name:'Canada'},
                                    {value:<?php echo $Korea_processing[1] ?>, name:'Korea'},
                                    {value:<?php echo $England_processing[1] ?>, name:'England'},
                                    {value:<?php echo $Japan_processing[1] ?>, name:'Japan'}
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
                                roseType: 'area',
                                radius: [20, 70],
                                color: ['#6b88ac','#364b61','#415974','#4a6483','#526e91','#5c7ba1'],
                                data:[
                                    {value:<?php echo $China_processing[2] ?>, name:'China'},
                                    {value:<?php echo $America_processing[2] ?>, name:'America'},
                                    {value:<?php echo $Canada_processing[2] ?>, name:'Canada'},
                                    {value:<?php echo $Korea_processing[2] ?>, name:'Korea'},
                                    {value:<?php echo $England_processing[2] ?>, name:'England'},
                                    {value:<?php echo $Japan_processing[2] ?>, name:'Japan'}
                                ]
                            }
                        ]
                    };
            
                    myChart1.setOption(option1);
                    myChart2.setOption(option2);
                    myChart3.setOption(option3);
                </script>
            </div>
        <div class="tab-pane fade" id="china-processing" role="tabpanel" aria-labelledby="china-processing-tab">
            <?php echo $selling_proce_table_head; ?>
            <tbody>
            <?php
                $find_sql = "SELECT * FROM ordering WHERE custregion = 'China' AND status = 'processing' ";
                $td = print_table_formanager_processing($find_sql,$conn);
                echo $td;
            ?>
            </tbody>
        </table>

        </div>
        <div class="tab-pane fade" id="amercian-processing" role="tabpanel" aria-labelledby="amercian-processing-tab">
            <?php echo $selling_proce_table_head; ?>
            <tbody>
            <?php
                $find_sql = "SELECT * FROM ordering WHERE custregion = 'America' AND status = 'processing' ";
                $td = print_table_formanager_processing($find_sql,$conn);
                echo $td;
            ?>
            </tbody>
            </table>
            
        </div>
        <div class="tab-pane fade" id="england-processing" role="tabpanel" aria-labelledby="england-processing-tab">
            <?php echo $selling_proce_table_head; ?>
            <tbody>
            <?php
                $find_sql = "SELECT * FROM ordering WHERE custregion = 'England' AND status = 'processing' ";
                $td = print_table_formanager_processing($find_sql,$conn);
                echo $td;
            ?>
            </tbody>
            </table>
        </div>

        <div class="tab-pane fade" id="canada-processing" role="tabpanel" aria-labelledby="canada-processing-tab">
            <?php echo $selling_proce_table_head; ?>
            <tbody>
            <?php
                $find_sql = "SELECT * FROM ordering WHERE custregion = 'Canada' AND status = 'processing' ";
                $td = print_table_formanager_processing($find_sql,$conn);
                echo $td;
            ?>
            </tbody>
            </table>
        </div>

        <div class="tab-pane fade" id="japan-processing" role="tabpanel" aria-labelledby="japan-processing-tab">
            <?php echo $selling_proce_table_head; ?>
            <tbody>
            <?php
                $find_sql = "SELECT * FROM ordering WHERE custregion = 'Japan' AND status = 'processing' ";
                $td = print_table_formanager_processing($find_sql,$conn);
                echo $td;
            ?>
            </tbody>
            </table>
        </div>

        <div class="tab-pane fade" id="korea-processing" role="tabpanel" aria-labelledby="korea-processing-tab">
            <?php echo $selling_proce_table_head; ?>
            <tbody>
            <?php
                $find_sql = "SELECT * FROM ordering WHERE custregion = 'Korea' AND status = 'processing' ";
                $td = print_table_formanager_processing($find_sql,$conn);
                echo $td;
            ?>
            </tbody>
            </table>
            </div>
    </div>
</div>

        

        

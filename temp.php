<?php
    $numOfSR = count($srInfoList);
    $tStr = '';
    for($i=0;$i<$numOfSR; $i++){
        $srInfo = $srInfoList[$i];
        $saleNum = $srInfo[9];
        $total1 = $saleNum[0][0]+$saleNum[0][1];
        $total2 = $saleNum[1][0]+$saleNum[1][1];
        $total3 = $saleNum[2][0]+$saleNum[2][1];
        $tStr = $tStr.'<tr>
        <td >'.$srInfo[0].'</th>
        <td>'.$srInfo[1].'</td>
        <td>'.$srInfo[3].'</td>
        <td>'.$srInfo[4].'</td>
        <td>'.$srInfo[2].'</td>
        <td><input type="text" class = "form-control" value = '.$srInfo[5].'></td>
        <td><input type="text" class = "form-control" value = '.$srInfo[6].'></td>
        <td><input type="text" class = "form-control" value = '.$srInfo[7].'></td>
        <td><a href="javascript:;" class = "expand">detail</a></td>
        <td><input type="button" class ="save-btn" value="save"></td>
    </tr>';
        $tStr = $tStr.'<tr><td colspan="9" class = "detail-box" id = "'.$srInfo[1].'-label'.'">
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
                            <td>'.$total2.'</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </td> </tr>';
    }
?>
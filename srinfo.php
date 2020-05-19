<?php
    $date = getDateFromRange($startdate,$now_date);
    $json_date = json_encode($date);
?>
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
            <?php
                echo $tStr;
            ?>

        </tbody>
    </table>
</div>
<script >

    <?php
        echo $sStr;
    ?>

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
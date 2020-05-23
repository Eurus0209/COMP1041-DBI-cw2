<?php
    include 'conntodb.php';
    date_default_timezone_set('PRC');
    $now_date = date("Y-m-d");
    $startdate = '2020-5-15';
    function getDateFromRange($startdate, $enddate){
        $stimestamp = strtotime($startdate);
        $etimestamp = strtotime($enddate);
        // 计算日期段内有多少天
        $days = ($etimestamp-$stimestamp)/86400+1;
        // 保存每天日期
        $date = array();
        for($i=0; $i<$days; $i++){
          $date[] = date('Y-m-d', $stimestamp+(86400*$i));
        }
        return $date;
    }

    
    function getDateMaskNumBySR($dateArray,$srname,$conn){
        $days = count($dateArray);
        $num1 = array();
        $num2 = array();
        $num3 = array();
        for($i=0; $i<$days; $i++){
            $today = $dateArray[$i];
            // $srname = array('$srname');
            $sql = "select * from ordering where salerep = '$srname' and ( datediff ( date , '$today' ) = 0 ) and status in ('processing','completed')";
            $result = $conn->query($sql);
            
            $t1 = 0;
            $t2 = 0;
            $t3 = 0;
            if($result->num_rows >0){
                while($row = $result->fetch_assoc()){
                    $t1 += $row['type1'];
                    $t2 += $row['type2'];
                    $t3 += $row['type3'];
                }
            }
            $num1[] = $t1;
            $num2[] = $t2;
            $num3[] = $t3;
    
            // $maskNum[] = $num;
        }
        $maskNum = array($num1,$num2,$num3);
        // $json_maskNum = json_encode($maskNum);
        return $maskNum;
    }
    function getDateMaskNum($dateArray,$region,$conn){
        $days = count($dateArray);
        $num1 = array();
        $num2 = array();
        $num3 = array();
        for($i=0; $i<$days; $i++){
            $today = $dateArray[$i];
            $sql = "select * from ordering where custregion = '$region' and ( datediff ( date , '$today' ) = 0 )";
            $result = $conn->query($sql);
            
            $t1 = 0;
            $t2 = 0;
            $t3 = 0;
            if($result->num_rows >0){
                while($row = $result->fetch_assoc()){
                    $t1 += $row['type1'];
                    $t2 += $row['type2'];
                    $t3 += $row['type3'];
                }
            }
            $num1[] = $t1;
            $num2[] = $t2;
            $num3[] = $t3;

        }
        $maskNum = array($num1,$num2,$num3);
        return $maskNum;
    }

    $date =  getDateFromRange($startdate, $now_date);
    $arr =  getDateMaskNumBySR($date,'rep9',$conn);
    print_r ($arr);
    $json_date = json_encode($date);
    $json_arr = json_encode($arr);

?>
<script>    
    var arr = <?php echo $json_arr; ?>;
    var date = <?php echo $json_date;?>;
    // alert(arr);
    var newarr = getData(date,arr);
    // alert(newarr.type2);
    // var num_info = [[0,0,0,0,0,0,0,0,0,0,0,108,0,0],[0,0,0,0,0,0,0,0,0,0,0,264,0,0],[0,0,0,0,0,0,0,0,0,0,0,640,0,0]];
    //         var dateinfo = ["2020-05-15","2020-05-16","2020-05-17","2020-05-18","2020-05-19","2020-05-20","2020-05-21","2020-05-22","2020-05-23"];
    //         var data = getData(dateinfo, num_info);
    var num_info = [[0,0,0,0,0,0,0,0,0,0,0,244,16,0],[0,0,0,0,0,0,0,0,0,0,0,230,468,0],[0,0,0,0,0,0,0,0,0,0,0,60,244,0]];
            var dateinfo = ["2020-05-15","2020-05-16","2020-05-17","2020-05-18","2020-05-19","2020-05-20","2020-05-21","2020-05-22","2020-05-23"];
            var data = getData(dateinfo, num_info);
    alert(data.type1);
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
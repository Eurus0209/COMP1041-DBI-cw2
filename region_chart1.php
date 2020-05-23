<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.bootcdn.net/ajax/libs/echarts/4.7.0/echarts-en.common.js"></script>
</head>
<body>
    <div id="datazoom" style ="width: 550px;height:300px;"></div>
    <script>
        var datazoom = echarts.init(document.getElementById('datazoom'));
            option = {
            xAxis:{
                data: data.date
            },
            yAxis:{},
            legend: {
                // type: 'scroll',
                // bottom: 10,
                top:10,
                data: [{
                    name:'N95'},
                    {
                        name:'Surgial'},
                    {
                        name:'N95 Surgial'
                        }]
            },
            tooltip: {
                trigger: 'item',
                formatter: '{a} <br/>{b} : {c}'
            },
            dataZoom: [
                {   // 这个dataZoom组件，默认控制x轴。
                    type: 'slider', // 这个 dataZoom 组件是 slider 型 dataZoom 组件
                    start: 10,      // 左边在 10% 的位置。
                    end: 60         // 右边在 60% 的位置。
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
                    color:['#3c6382'],
                    name:'N95 Surgial',
                    type:'bar',
                    data:data.type3
                }
            ]
        }
        datazoom.setOption(option);

        // 
        
        // var jsonstr =eval(json);
        // alert(dateinfo[0]);
        
        // function getData(dateinfo, numinfo){
        //     var date = [];
        //     var type1 = [];
        //     var type2 = [];
        //     var type3 = [];
        //     for(var i=0; i<5; i++){
        //         date.push(dateinfo[i].substr(5));
        //         type1.push(numinfo[0][i]);
        //         type2.push(numinfo[1][i]);
        //         type3.push(numinfo[2][i]);
        //     }
        //     return {
        //         date:date,
        //         type1: type1,
        //         type2: type2,
        //         type3: type3
        //     }
        // }

    </script>
</body>
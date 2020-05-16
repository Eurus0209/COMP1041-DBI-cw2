
            option = {
            xAxis:{
                data: data.date
            },
            yAxis:{},
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
        datazoom.setOption(option);
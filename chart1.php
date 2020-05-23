
            option = {
            xAxis:{
                data: data.date
            },
            yAxis:{},
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
                    start: 40,      
                    end: 90         
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
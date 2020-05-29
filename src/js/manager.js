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
function sleep(ms) {
    return new Promise(resolve => 
        setTimeout(resolve, ms)
    )
  }
$(function(){
    if(fw==1){
        $(".warning-tip").addClass("show-wt");
    }

    $(".selling-label").on("click",function(){
        var str = $(this).attr("id");
        $(".selling-table").removeClass("show-table");
        $(".sr-info-table").removeClass("show-table");
        $(".cust-info-table").removeClass("show-table");
        $(".order-info-table").removeClass("show-table");
        $("."+str).addClass("show-table");
    })

    $(".sr-info-label").on("click",function(){
        var str = $(this).attr("id");
        $(".selling-table").removeClass("show-table");
        $(".sr-info-table").removeClass("show-table");
        $(".cust-info-table").removeClass("show-table");
        $(".order-info-table").removeClass("show-table");
        $("."+str).addClass("show-table");
    })

    $(".cust-info-label").on("click",function(){
        var str = $(this).attr("id");
        $(".selling-table").removeClass("show-table");
        $(".sr-info-table").removeClass("show-table");
        $(".order-info-table").removeClass("show-table");
        $("."+str).addClass("show-table");
    })

    $(".order-info-label").on("click",function(){
        var str = $(this).attr("id");
        $(".selling-table").removeClass("show-table");
        $(".cust-info-table").removeClass("show-table");
        $(".sr-info-table").removeClass("show-table");
        $("."+str).addClass("show-table");
    })

    $("#srname").on("blur",function(){
        //can't contain other char except letter and digit
        var reg1 = new RegExp(/^[0-9a-zA-Z]*$/g);
    
        //must contain at least one letter
        var reg2 = new RegExp(/[A-Za-z]+/);
    
        var text = $(this).val();
        if((reg2.test(text)==false)){
          $(".tip-name2").addClass("show-tip");
        }else if((reg1.test(text)==false)){
          $(".tip-name1").addClass("show-tip");
        }
      })

    $("#srname").on("focus",function(){
        $(".tip-name1").removeClass("show-tip");
        $(".tip-name2").removeClass("show-tip");
        
    })
    
    $("#email").on("focus",function(){
        $(".email-tip").removeClass("show-tip");
        
    })
    $("#email").on("blur",function(){
        if(/([\w\-]+\@[\w\-]+\.[\w\-]+)/.test($(this).val())==false){
            $(".email-tip").addClass("show-tip");
        }
    })
    $("#phone").on("focus",function(){
        $(".phone-tip").removeClass("show-tip");
    })
    $("#phone").on("blur",function(){
        if(/\d{11}/.test($(this).val())==false){
            $(".phone-tip").addClass("show-tip");
        }
    })

    $("#repeatPassword").on("focus",function(){
        $(".password-tip").removeClass("show-tip");
    })
    $("#repeatPassword").on("blur",function(){
        if($("#inputPassword").val()!=$("#repeatPassword").val()){
            $(".password-tip").addClass("show-tip");
        }
    })



    $(".btn-save-change").on("click",function(){
        if($("#email").val()==''|| 
        $("#phone").val() =='' ||
        $("#inputPassword").val() =='' ||
        $("#realname").val() ==''||
        $("#srname").val()==''||
        $("#employee-id").val()==''
        ){
            swal("Please complete the form!");
        }
        else if(
            /([\w\-]+\@[\w\-]+\.[\w\-]+)/.test($("#email").val())==false ||
            /\d{11}/.test($("#phone").val())==false ||
            /^[0-9a-zA-Z]*$/.test($("#srname").val())==false||
        /[A-Za-z]+/.test($("#srname").val())==false
        ){
            swal("Please complete the form as right format!");
        }else if($("#inputPassword").val()!=$("#repeatPassword").val()){
            swal("Please make sure password is entered consistently!");
        }else{
            var issucc = 0;
            $.ajax({
                type : "post",
                url : "isExist.php",
                data :{
                    name: $("#srname").val(),
                },
                success : function(msg){
                    if(msg == 1){
                        swal("Username already exist!");
                    }else{
                        issucc = 1;
                        swal("here");
                        $.ajax({
                            type : "post",
                            url : "adduser.php",
                            data:{
                                name:  $("#srname").val(),
                                realname : $("#realname").val(),
                                id : $("#employee-id").val(),
                                pass : $("#inputPassword").val(),
                                email: $("#email").val(),
                                phone: $("#phone").val(),
                                 region: $("#srregion option:selected").val(),
                                role : 2,
                                quota1 : $("#quota1").val(),
                                quota2 : $("#quota2").val(),
                                quota3 : $("#quota3").val(),
                            },
                            success : function(msg){
                                if(msg == 1){
                                    swal({
                                        text:"Add successfully!",
                                        buttons: false,
                                    });
                                      sleep(1000).then(()=>{
                                        history.go(0);
                                      })
                                }
                                
                                else{
                                    swal("Add failed!");
                                }
                            }
                        });
                    }
                }
            });
        }
    })

    $(".update-btn").on("click",function(){
        // alert($(this).parent().siblings(".info_quota1").children().val());
        var current = $(this);
        swal({
            text:"Confirm to update information?",
            buttons: true,
        }).then(function(isConfirm){
            if(isConfirm){
                var name = current.parent().siblings(".srinfo_table_name").html();
                var q1 = current.parent().siblings(".info_quota1").children().val();
                var q2 = current.parent().siblings(".info_quota2").children().val();
                var q3 = current.parent().siblings(".info_quota3").children().val();
                var region = current.parent().siblings(".srinfo_region").children().find("option:selected").text();
                $.ajax({
                    type:"post",
                    url: "update_quota.php",
                    data:{
                        name:name,
                        quota1: q1,
                        quota2: q2,
                        quota3: q3,
                        region: region
                    },success:function(msg){
                        // alert(msg);
                        if(msg == 1){
                            swal({
                                text:"Update successfully!",
                                buttons: false,
                            });
                            
                              sleep(1000).then(()=>{
                                history.go(0);
                              })
                        }else{
                            swal("Failed update!");
                        }
                    }
                })
            }
        })
    })

    $(".regrant-btn").on("click",function(){
        var a = $(".warning-table .table-row");
        var i = 0;
        while(a.html() != undefined){
            var name = a.children()[0].innerHTML;
            var type = '';
            if(a.children()[1].innerHTML == 'N95 respirator'){
                type = 'quota1';
            }else if(a.children()[1].innerHTML == 'Surgial mask'){
                type = 'quota2';
            }else{
                type = 'quota3';
            }
            var value_before = (a.children()[2].innerHTML).split("/")[1] * 1.0;
            var value_t = a.children()[3].children[0].value *1.0;
            var value = value_before +value_t;
            $.ajax({
                type: "post",
                url: 'regrant.php',
                data:{
                    name: name,
                    type: type,
                    value :value
                },success: function(msg){
                    if(msg == 0){
                        swal("Failed to regrant!");
                    }else{
                    }
                        
                }
            })
            a = a.next();
        }
        history.go(0);
    })

    $(".btn-detail").on("click",function(){
        var custname = $(this).parent().siblings(".cust-name").text();
        $.ajax({
            type:"post",
            url:"getCustDetail.php",
            data: {
                name: custname
            },success: function(data){
                var arr = eval('(' + data+ ')');
                $('#staticBackdrop').modal('show');
                var myChart = echarts.init(document.getElementById('typeRoseChart'));
                var option1 = { 
                        tooltip: {
                            trigger: 'item',
                            formatter: '{a} <br/>{b} : {c}'
                        },
                        legend: {
                            data: [{name:'N95'},
                                {name:'Surgial'},
                                {name:'N95-surgial'},
                                ]
                        },
                        series : [
                            {
                                name: 'Purchase detail',
                                type: 'pie',
                                radius: '45%',
                                roseType: 'area',
                                color: ['#6b88ac','#364b61','#4a6483','#526e91'],
                                data:[
                                    {value:arr[1][0], name:'N95'},
                                    {value:arr[1][1], name:'Surgial'},
                                    {value:arr[1][2], name:'N95-surgial'},
                                ]
                            }
                        ]
                    };
                myChart.setOption(option1);
                var quantity = arr[1][0]*1.0+arr[1][1]*1.0+arr[1][2]*1.0;
                var sales = arr[1][0]*1.0+arr[1][1]*1.0+arr[1][2]*1.5;
                $(".order-amount").text(arr[0]);
                $(".total-quantity").text(quantity);
                $(".total-sale").text("$"+sales);
            }
        })
    })

    $("#sel3").each(function () {
        var $this = $(this);

        $this.daterangepicker({
          startDate: "2020-05-18",
          endDate: "2020-05-24",
          locale: {
            "format": "YYYY-MM-DD",
            "separator": " ～ ", 
            "applyLabel": "confirm",
            "cancelLabel": "cancel",
            "fromLabel": "start",
            "toLabel": "end",
            "firstDay": 1
          },
        }, function (start, end, label) {
          startDate = start.format("YYYY-MM-DD");
          endDate = end.format("YYYY-MM-DD");

        }).css("min-width", "210px").next("i").click(function () {
          $(this).parent().find('input').click();
        });
      });

      $(".check-btn").on("click",function(){
        var region = $("#sel1").find("option:selected").text();
        var status = $("#sel2").find("option:selected").text();
        var date = $("#sel3").val();
        var sdate = date.substr(0,10)+" 00:00:00";
        var edate = date.substr(13,23)+" 23:59:59";
        $.ajax({
            type :"post",
            url: "getOrderForManager.php",
            data:{
                region: region,
                status: status,
                sdate: sdate,
                edate: edate
            },success: function(msg){
                $(".tbody").html(msg);
            }
        })
    })

    $(".expand").on("click",function(){
        var a = $(this).parent().siblings()[1];
        var idname = a.innerHTML;
        if($("#"+idname+"-label").hasClass("show-cell")){
            $("#"+idname+"-label").removeClass("show-cell");
        }else{
            $("#"+idname+"-label").addClass("show-cell");
        }
        
    })



})
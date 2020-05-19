


<div class="warning-box">
    <table class="table warning-table">
        <thead>
            <tr>
            <th scope="col">Name</th>
            <th scope="col">Type</th>
            <th scope="col">Sold/Quota</th>
            <th scope="col">Re-grant</th>
            </tr>
        </thead>
        <tbody>
            <?php
                echo $w_str;
            ?>
        </tbody>
    </table>
    <div class="re-grant-box">
    <input type="button" class = "regrant-btn" value="re-grant">
</div>
</div>


<script>
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
            // alert(value);
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
                        // swal("success!");
                    }
                        
                }
            })
            a = a.next();
        }
        history.go(0);
        // alert(i);
    })
</script>
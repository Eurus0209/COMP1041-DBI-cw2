<?php 
    date_default_timezone_set('PRC');
    $empid=substr(date("ymdHis"),4,12).mt_rand(1,9);
?>
<div class="sr-info-content">
    <div class="form-group row">
        <label for="employee-id" class="col-sm-3 col-form-label">EmployeeID</label>
        <div class="col-sm-9">
        <input type="text" readonly class="form-control" id="employee-id" value = <?php echo $empid; ?> >
        </div>
    </div>

    <div class="form-group row">
        <label for="realname" class="col-sm-3 col-form-label">Realname</label>
        <div class="col-sm-9">
        <input type="text" class="form-control" id="realname" >
        </div>
    </div>

    <div class="form-group row">
        <label for="srname" class="col-sm-3 col-form-label">Username</label>
        <div class="col-sm-9">
        <input type="text" class="form-control" id="srname" >
        </div>
    </div>
    <div class="form-group row">
        <label for="inputPassword" class="col-sm-3 col-form-label">Password</label>
        <div class="col-sm-9">
        <input type="password" class="form-control" id="inputPassword" >
        </div>
    </div>

    <div class="form-group row">
        <label for="repeatPassword" class="col-sm-3 col-form-label">Repeat Pass</label>
        <div class="col-sm-9">
        <input type="password" class="form-control" id="repeatPassword" >
        <div class="tip password-tip">Entered passwords differ!</div>
        </div>
    </div>
    <div class="form-group row">
        <label for="email" class="col-sm-3 col-form-label">Email</label>
        <div class="col-sm-9">
        <input type="text" class="form-control" id="email" >
        <div class="tip email-tip">Please input as right format!</div>
        </div>
    </div>
    <div class="form-group row">
        <label for="phone" class="col-sm-3 col-form-label">Phone</label>
        <div class="col-sm-9">
        <input type="text" class="form-control" id="phone" >
        <div class="tip phone-tip">Please input as right format!</div>
        </div>
    </div>

    <div class="form-group row">
        <label for="srregion" class="col-sm-3 col-form-label">Region</label>
        <div class="col-sm-9">
        <!-- <input type="text" class="form-control" id="srregion" > -->
            <select class="form-control" name = "region" id="srregion" style="font-size:16px; padding : 0 6px;" >
            <option value="China">China</option>
            <option value="America">America</option>
            <option value="England">England</option>
            <option value="Japan">Japan</option>
            <option value="Korea">Korea</option>
            <option value="Canada">Canada</option>
            </select>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="quota1">N95</label>
            <input type="text" class="form-control" id="quota1" value = "300" onkeyup = "value=value.replace(/[^\d]/g,'')">
        </div>

        <div class="form-group col-md-4">
            <label for="quota2">Surgial</label>
            <input type=text" class="form-control" id="quota2" value = "300" onkeyup = "value=value.replace(/[^\d]/g,'')">
        </div>

        <div class="form-group col-md-4">
            <label for="quota3">N95 Surgial</label>
            <input type="text" class="form-control" id="quota3" value = "300" onkeyup = "value=value.replace(/[^\d]/g,'')">
        </div>
    </div>

        
    <button class="btn btn-primary btn-save-change">Add</button>
</div>

<!-- <form class="form-regist form-horizontal sign-up-content sr-info-add-box2">
    <div class="form-group ">

        <input type="text" name = "username" class="form-control" id="username" placeholder="Username" >
    </div>

    <div class="form-group ">

        <input type="text" name = "realname" class="form-control" id="realname" placeholder="RealName" >
    </div>

    <div class="form-group ">

        <input type="text" name = "passportid" class="form-control" id="passportid" placeholder="PassportID" >
    </div>

    <div class="form-group">
        
        <input type="text" name = "telephone" class="form-control" id="telephone" placeholder="Telephone" >
        <div class="tip-phone tip">
            Wrong format of phone number!
        </div>
    </div>
    

    <div class="form-group">
     
        <input type="email" name = "email" class="form-control" id="email" placeholder="Email">
        <div class="tip-email tip">
            Wrong format of email!
        </div>
    </div>
    

    <div class="form-group">

        <input type="password" name = "password1" class="form-control" id="password1" placeholder="Password">
    </div>

    <div class="form-group">

        <input type="password" name = "password2" class="form-control" id="password2" placeholder="Repeate Password">
        <div class="tip-pass tip">
            Entered passwords differ.
        </div>
    </div>
    <div class="form-group">

        <select class="form-control" name = "region" style="font-size:16px; padding : 0 6px;" >
        <option value="China">China</option>
        <option value="American">American</option>
        <option value="England">England</option>
        <option value="Japan">Japan</option>
        <option value="Korea">Korea</option>
        <option value="Canada">Canada</option>
        </select>
    </div>
    <button class="btn btn-primary btn-save-change">Add</button>
    </form> -->
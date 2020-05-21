<?php
    include 'conntodb.php';
    session_start();
    $custname = $_SESSION['username'];
    $sql = "SELECT * FROM user WHERE name = '$custname'";
    $result = $conn->query($sql);
    $info = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Information</title>
  <script src="js/jquery-1.12.3.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="js/updateUserInfo.js"></script>
  <script src="library/sweetalert.js"></script>
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/userInfo.css">
</head>
<body>
    <?php include 'nav-after.php' ?>
  <div class="cust-info-box">
    <div class="info-content">
        <div class="form-group row">
            <label for="passport-id" class="col-sm-3 col-form-label">PassportID</label>
            <div class="col-sm-9">
            <input type="text" readonly class="form-control" id="passport-id" value =<?php echo $info['passportid']; ?>>
            </div>
        </div>

        <div class="form-group row">
            <label for="realname" class="col-sm-3 col-form-label">Realname</label>
            <div class="col-sm-9">
            <input type="text" readonly class="form-control" id="realname" value =<?php echo $info['realname']; ?>>
            </div>
        </div>

        <div class="form-group row">
            <label for="srname" class="col-sm-3 col-form-label">Username</label>
            <div class="col-sm-9">
            <input type="text" readonly class="form-control" id="srname" value =<?php echo $info['name']; ?>>
            </div>
        </div>
        
        <div class="form-group row">
            <label for="email" class="col-sm-3 col-form-label">Email</label>
            <div class="col-sm-9">
            <input type="text" class="form-control" id="email" value =<?php echo $info['email']; ?> >
            <div class="tip email-tip">Please input as right format!</div>
            </div>
        </div>
        <div class="form-group row">
            <label for="phone" class="col-sm-3 col-form-label">Phone</label>
            <div class="col-sm-9">
            <input type="text" class="form-control" id="phone" value =<?php echo $info['phone']; ?>>
            <div class="tip phone-tip">Please input as right format!</div>
            </div>
        </div>

        <div class="form-group row">
            <label for="srregion" class="col-sm-3 col-form-label">Region</label>
            <div class="col-sm-9">
            <input type="text" readonly class="form-control" id="srregion" value =<?php echo $info['region']; ?>>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-3 col-form-label">Password</label>
            <div class="col-sm-9">
            <input type="password" class="form-control" id="inputPassword" value =<?php echo $info['password']; ?>>
            </div>
        </div>

        <div class="form-group row hide">
            <label for="repeatPassword" class="col-sm-3 col-form-label">Repeat Pass</label>
            <div class="col-sm-9">
            <input type="password" class="form-control" id="repeatPassword" >
            <div class="tip password-tip">Entered passwords differ!</div>
            </div>
        </div>

            
        <button class="btn btn-primary btn-save-change">Save Change</button>
    </div>
</div>
</body>
</html>
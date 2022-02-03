<?php
//Require my functions.php file
include('../function.php');

//Build the login script
if(isset($_POST['confirm'])){
  //Extract the user input and assign to variables
  $user = sanitize($_POST['user']);

  //Search DB for the entered data above
  $sql_check = "SELECT * FROM admin WHERE user_email = '$user'";
  
  //Execute the mysqli query
  $sqlDo = $con->query($sql_check);

  //count the number of rows that contain the data
    $rowCount = mysqli_num_rows($sqlDo);

    //Check if there is no matching row with the user data
    if($rowCount<=0){
      $toast = "fail";
    }
    else{
      $toast = "success";
        header("Refresh:2,url=change-password.php?em=$user");
    }
}
else{
  //header('Location:login.php');
}
$con->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Confirm Email Address | Zenith Broker Trade</title>
<!-- Tell the browser to be responsive to screen width -->
<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1" />

<!-- v4.0.0-alpha.6 -->
<link rel="stylesheet" href="../dist/bootstrap/css/bootstrap.min.css">

<!-- Google Font -->
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

<!-- Theme style -->
<link rel="stylesheet" href="../dist/css/style.css">
<link rel="stylesheet" href="../dist/css/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="../dist/css/et-line-font/et-line-font.css">
<link rel="stylesheet" href="../dist/css/themify-icons/themify-icons.css">
<link rel="stylesheet" href="../dist/plugins/hmenu/ace-responsive-menu.css">
<link rel="icon" href="../dist/img/p2pdarkicon.png">
<!--Toastr-->
<link rel="stylesheet" type="text/css" href="../../custom.css">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

</head>
<body class="hold-transition login-page sty1">
<div class="login-box sty1">
  <div class="login-box-body sty1">
  <div class="login-logo">
    <a href="#"><span class="lead cursive">ZenithBroker<span class="orange">Trade</span><!-- <img src="dist/img/p2pdark.png" width="" height="" alt="Zenith Broker Trade" title="Zenith Broker Trade"> --></a>
  </div>
     <h5 class="login-box-msg">Confirm Your Email</h5><br>
    <form action="<?php htmlentities($_SERVER['PHP_SELF']);?>" method="post" name="loginForm">
      <div class="form-group has-feedback">
        <input type="email" class="form-control sty1" placeholder="username" name="user" title="Enter your registered email address" required><br>
      </div>
      <div>
        <div class="col-xs-8">
        <!-- /.col -->
        <div class="col-xs-4 m-t-1">
          <button type="submit" class="btn btn-warning btn-block btn-flat" name="confirm">Confirm</button>
        </div>
        <!-- /.col --> 
      </div>
    </form>
    <div class="social-auth-links text-center">
      <p><small>Confirm your registered email address and if found, you will be re-directed to update your password effectively.</small></p>
  <!-- /.login-box-body --> 
</div>
<!-- /.login-box --> 
<!-- jQuery 3 --> 
<script src="../dist/js/jquery.min.js"></script> 

<!-- v4.0.0-alpha.6 --> 
<script src="../dist/bootstrap/js/bootstrap.min.js"></script> 

<!-- template --> 
<script src="../dist/js/niche.js"></script>
<!--Toastr-->
<script type="text/javascript" src="../dist/js/toastr.min.js"></script>

</body>
</html>
<?php
if(isset($toast) && $toast==='success'){
  echo "<script>toastr.success('You will be redirected shortly', 'Success')</script>";
}

if(isset($toast) && $toast==='fail'){
  echo "<script>toastr.error('We cannot log you in', 'Wrong credentials')</script>";
}
?>
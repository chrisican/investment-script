<?php
//Require my functions.php file
include('../function.php');
//Begin cookie and include the cookie file
include('../cookie.php');


//Build the login script
if(isset($_POST['signin'])){
  //Extract the user input and assign to variables
  $admin_email = sanitize($_POST['user']);
  $pass = md5($_POST['pwd']);

  //Search DB for the entered data above
  $sqlCheckAdmin = "SELECT * FROM admin WHERE user_email = '$admin_email' AND user_pass='$pass'";
  
  //Execute the mysqli query
  $sqlDoAdmin = $con->query($sqlCheckAdmin);

  //count the number of rows that contain the data
    $rowCountAdmin = mysqli_num_rows($sqlDoAdmin);

    //Check if there is no matching row with the user data
    if($rowCountAdmin<=0){
      $toast = "fail";
    }
    else{
      $_SESSION['user'] = $admin_email;
      $toast = "success";
        //$_SESSION['email'] = $user;
        header("Refresh:1,url=./edit-profile.php");
    }
}
else{
  //header('Location:login.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Admin Login Area | Zenith Broker Trade</title>
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
<link rel="stylesheet" type="text/css" href="../dist/css/toastr.css">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="../../custom.css">
</head>
<body class="hold-transition login-page sty1">
<div class="login-box sty1">
  <div class="login-box-body sty1">
  <div class="login-logo">
  <a href="#"><span class="lead cursive">ZenithBroker<span class="orange">Trade</span><!-- <img src="dist/img/p2pdark.png" width="" height="" alt="Zenith Broker Trade" title="Zenith Broker Trade"> --></a>
  </div>
    <p class="login-box-msg">Sign in to start your session - Admins only</p>
   <form action="<?= htmlentities($_SERVER['PHP_SELF']);?>" method="post" name="loginForm">
      <div class="form-group has-feedback">
        <input type="email" class="form-control sty1" placeholder="Username" name="user" title="Username is required" value="<?php if(isset($_COOKIE['email'])){echo $_COOKIE['email'];}?>" required>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control sty1" placeholder="Password" name="pwd" title="Password is required" value="<?php if(isset($_COOKIE['pwd'])){echo $_COOKIE['pwd'];}?>" required>
      </div>
      <div>
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" name="checkbox">
              Remember Me </label>
            <a name="checkEmail" href="check-email.php" class="pull-right" onclick=""><i class="fa fa-lock"></i> Forgot Password?</a> </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4 m-t-1">
          <button type="submit" class="btn btn-warning btn-block btn-flat" name="signin">Sign In</button>
        </div>
        <!-- /.col --> 
      </div>
  <!--   </form>
    <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
      Facebook</a> <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
      Google+</a> </div> -->
    <!-- /.social-auth-links -->
    
    <!-- <div class="m-t-2">Don't have an account? <a href="register.php" class="text-center">Sign Up</a></div> -->
  </div>
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
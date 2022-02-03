<?php
//echo "<script>alert('Use this section to add another admin')</script>";
//Require my functions.php file
include('../function.php');
//Begin cookie and include the cookie file
include('../cookie.php');
//Define empty variables
$fname = $lname = $email = $pass = $cpass = "";

//Define empty error variables
$fnameErr = $lnameErr = $emailErr = $passErr = $cpassErr = $cpassesErr = $checkErr = ""; 

//Test for valid(empty) and invalid(non-empty) form fields
if($_SERVER['REQUEST_METHOD']=="POST"){
  if(empty($_POST['fname'])){
    $fnameErr = "Firstname is required";
  }
  else{
    $fname = sanitize($_POST['fname']);
  }

  if(empty($_POST['lname'])){
    $lnameErr = "Lastname is required";
  }
  else{
    $lname = sanitize($_POST['lname']);
  }

  if(empty($_POST['email'])){
    $emailErr = "Email is required";
  }
  else{
    $email = sanitize($_POST['email']);
  }

  if(empty($_POST['pwd'])){
    echo "<style>.note{display:none !important;</style>";
    $passErr = "Password is required";
  }
  else{
    $pass = md5($_POST['pwd']);
  }

  if(empty($_POST['cpwd'])){
    echo "<style>.note{display:none !important;</style>";
    $cpassErr = "Confirm password is required";
  }
  else{
    $cpass = md5($_POST['cpwd']);
  }

  if($pass !== $cpass){
    $cpassesErr = "Both passwords do not match";
  }

  if(!isset($_POST['agreement'])){
    $checkErr = "Please agree to our terms";
  }
}

if(isset($_POST['addAdmin'])){
  //Lead variable
  //$eEmail = $_POST['eEmail'];

  //Extract variables from user input
  $eFname = sanitize($_POST['eFname']);
  $eLname = sanitize($_POST['eLname']);  
  $ePhone = sanitize($_POST['ePhone']);
  $eAddress = sanitize($_POST['eAddress']);
  $eCountry = sanitize($_POST['eCountry']);
  $city = sanitize($_POST['city']);

  $sql_insert_admin = "INSERT INTO `admin(firstname,lastname,user_email,user_pass)`VALUES('$fname','$lname','$email','$cpass')";

  if($con->query($sql_insert_admin) === TRUE){
    $toast = "success";
    header('Refresh:1');}
  else{$toast = "fail";}

  $sql_wallet_insert = "INSERT INTO wallet(user_email) VALUES('$email')";
   $con->query($sql_wallet_insert);

}
$con->close();
?>
<?php include('header.php'); ?>

<body class="page-user">
<?php include('nav.php'); ?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-4 col-xs-12">
 				
                  <div class="card-body">
                  		<h4 class="text-primary" style="color:steelblue !important;">Add an admin</h4>
                    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" name="regForm">
      <div class="form-group has-feedback">
        <input type="text" name="fname" class="form-control sty1" placeholder="Firstname" required>
        <span class="err"><?= $fnameErr; ?></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" name="lname" class="form-control sty1" placeholder="Lastname" required>
        <span class="err"><?= $lnameErr; ?></span>
      </div>
      <div class="form-group has-feedback">
        <input type="email" name="email" class="form-control sty1" placeholder="Email" title="Your email is your username" required>
        <span class="err"><?= $emailErr; ?></span>        
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="pwd" class="form-control sty1" placeholder="Password" pattern="(?=.*\d)(?=.*[A-Z])(?=.*[a-z]).{8,}" title="password must contain atleast 1 digit, atleast 1 uppercase letter, atleast 1 lowercase letter and minimum of 8 characters in all" required>
      <span class="note"><small>atleast 1 digit, atleast 1 uppercase letter, atleast 1 lowercase letter and minimum of 8 characters total</small></span>
      <span class="err"><?= $passErr; ?></span>
    </div>

      <div class="form-group has-feedback">
        <input type="password" name="cpwd" class="form-control sty1" title="Confirm password must match the initial password entered in the box above" placeholder="Confirm Password" required><span class="note"><small>must match password entered in the box above</small></span>
        <span class="err"><?= $cpassErr; ?></span><br>
         <span class="err"><?= $cpassesErr; ?></span>
      </div>
      <div>
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" name="agreement" required>
               I agree to the <a href="https://zenithbroketrade.org/terms-of-use.php" title="View terms of use" target="_blank" rel="noopener noreferrer">Terms Of Use</a></label><br>
               <span class="err"><?= $checkErr; ?></span>
             </div>
        </div>
        <!-- /.col -->
          <button type="submit" class="btn btn-warning btn-block btn-flat" name="reg">Sign Up</button>
        </div>
        <!-- /.col --> 
      </div> 
    </form>
                  </div>
                </div>
                   <!-- jQuery 3 --> 
<script src="../dist/js/jquery.min.js"></script> 

<!-- v4.0.0-alpha.6 --> 
<script src="../dist/bootstrap/js/bootstrap.min.js"></script> 

<!-- template --> 
<script src="../dist/js/niche.js"></script> 

<!-- jQuery UI 1.11.4 --> 
<script src="../dist/plugins/jquery-ui/jquery-ui.min.js"></script>

<!-- Toastr -->
<script src="../dist/js/toastr.min.js"></script>
<script type="text/javascript">
  toastr.info('Use this section to add a new admin','Info');
</script>
    </body>
    </html>
    <?php
if(isset($toast) && $toast==='success'){echo "<script>toastr.success('You have added an admin, he may login to edit his details', 'Success')</script>";}
if(isset($toast) && $toast==='fail'){echo "<script>toastr.error('We could not create that user', 'Error')</script>";}
?>
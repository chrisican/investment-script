<?php
//Require my functions.php file
include('../function.php');
//Begin cookie and include the cookie file
include('../cookie.php');

//$sessEmail = $_SESSION['email'];

/*$SQLprofile = "SELECT * FROM `users` WHERE `user_email`='$sessEmail'";
$SQLex = $con->query($SQLprofile);
foreach($SQLex as $info){extract($info);}*/
$profile_photo = '../upload/'.$photo;

/*$sqlWallet = "SELECT * FROM `wallet` WHERE `user_email`='$sessEmail'";
$SQLex2 = $con->query($sqlWallet);
foreach($SQLex2 as $wallet_info){extract($wallet_info);}*/

//Build the profile update script
if(isset($_POST['uProfile'])){
  //Lead variable
  //$eEmail = $_POST['eEmail'];

  //Extract variables from user input
  $eFname = sanitize($_POST['eFname']);
  $eLname = sanitize($_POST['eLname']);  
  $ePhone = sanitize($_POST['ePhone']);
  $eAddress = sanitize($_POST['eAddress']);
  $eCountry = sanitize($_POST['eCountry']);
  $city = sanitize($_POST['city']);

  $sql_profile_update = "UPDATE `admin` SET `firstname` = '$eFname', `lastname` = '$eLname',`address` = '$eAddress', `city` = '$city',`country` = '$eCountry', `phone` = '$ePhone' WHERE `admin`.`user_email` = '$user_email'";

  if($con->query($sql_profile_update) === TRUE){
    $toast = "success";
    header('Refresh:1');}
  else{$toast = "fail";}
}

//FOR THE PASSWORD RESET SECTION
//FORM VALIDATION
$pass=""; $passErr=""; $cpass=""; $cpassErr=""; $cpasses="";

if($_SERVER['REQUEST_METHOD']=='POST'){
    if(empty($_POST['ePass'])){
       echo "<style>.note{display:none !important;</style>";
        $passErr = "Password cannot be empty";
    }
    else{
        $pass = md5($_POST['ePass']);
    }

    if(empty($_POST['eCPass'])){
       echo "<style>.note{display:none !important;</style>";
        $cpassErr = "Confirm password cannot be empty";
    }
    else{
        $cpass = md5($_POST['eCPass']);
    }

    if($pass !== $cpass){
        $cpasses = "Both passwords do not match";
        echo "<script>window.alert('ERROR: Both passwords do not match')</script>";
    }
}

if(isset($_POST['uPwd'])){
    if($pass===$cpass){
        $sql = "UPDATE `admin` SET `user_pass` = '$pass' WHERE `admin`.`user_email`='$user_email'";

        if($con->query($sql)===TRUE){
            $toast = "success";
        header("Refresh:1,url=./login.php");
        session_destroy();
       }else{
        $toast = "fail";
       } 
     }
   }

//FOR THE WALLET UPDATE SECTION
//For the wallets section
/*if(isset($_POST['uWallet'])){
  //$eEmail = $_POST['eEmail'];
  $btc = sanitize($_POST['btc']);
  $eth = sanitize($_POST['eth']);
  $bnb = sanitize($_POST['bnb']);
  $usdt = sanitize($_POST['usdt']);
  //$token = sanitize($_POST['token']);

  $sql_wallet_update = "UPDATE `wallet` SET `bitcoin`='$btc',`ethereum`='$eth',`binance`='$bnb',`usdt`='$usdt' WHERE `wallet`.`user_email` = '$user_email'";

  if($con->query($sql_wallet_update)===TRUE){$toast = "success";header('Refresh:1');}
  else{$toast = "fail";}
  }*/

//FOR THE PHOTO UPLOAD SECTION
if(isset($_POST["uPhoto"]) && !empty($_FILES['photo']['name'])){
  $errors = [];
  $file_tmp= $_FILES['photo']['tmp_name'];
  $file_name=$_FILES['photo']['name'];
  $file_size=$_FILES['photo']['size'];
  $file_type=$_FILES['photo']['type'];

  $file_name_sanitizer= explode('.',$file_name);
  $file_ext = strtolower(end($file_name_sanitizer));

  $extensions = array("jpg","jpeg","png");

if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a jpeg, jpg or png file.";
          echo "<script>alert('Only jpeg, jpg, png files are allowed')</script>";
      }
      
      if($file_size > 500000) {
         $errors[]='File size must be less than 500KB';
         echo "<script>alert('File size should be less than 500KB')</script>";
      }

      if(empty($errors)==true) {
         move_uploaded_file($file_tmp,"../upload/".$file_name);
         $sql_insert_photo = "UPDATE `admin` SET `photo`='$file_name' WHERE `user_email`='$user_email' ";
         if($con->query($sql_insert_photo)){
         $toast = "success";
         header('Refresh:1');
      }else{$toast = "fail";}
    }
}if(isset($_POST["uPhoto"]) && empty($_FILES['photo']['name'])){
        echo "<script>alert('Select a valid image not more than 500KB')</script>";
    }

$con->close();
?>
<?php include('header.php'); ?>
<body class="page-user">

<?php include('nav.php'); ?>
 <div class="col-lg-12">
          <div class="info-box">
            <div class="card tab-style1"> 
            	<h5>Admin Profile Area</h5>
              <!-- Nav tabs -->
            <!--   <ul class="nav nav-tabs profile-tab" role="tablist">
                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab" aria-expanded="true">Activity</a> </li>
                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab" aria-expanded="false">Profile</a> </li>
                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab" aria-expanded="false">Settings</a> </li>
               <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#security" role="tab" aria-expanded="false">Security</a> </li>
               <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#wallet" role="tab" aria-expanded="false">Wallet</a> </li>
               <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#upload" role="tab" aria-expanded="false">Upload</a> </li>
              </ul> -->
              <!-- Tab panes -->
          </div>
      </div>
  </div>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-4 col-xs-12">
 				
                  <div class="card-body">
                  		<h4 class="text-primary" style="color:steelblue !important;">Edit your profile details</h4>
                    <form class="form-horizontal form-material" method="POST" action="<?= htmlentities($_SERVER['PHP_SELF']);?>">
                      <div class="form-group">
                        <label for="example-email" class="col-md-12">Email</label>
                        <div class="col-md-12">
                          <input value="<?php if(isset($admin_info['user_email']) && $admin_info['user_email']!==null){echo $admin_info['user_email'];}?>" class="form-control form-control-line" name="eEmail" id="example-email" type="email" title="Your email is your username and cannot be changed after setting it" disabled>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-md-12">Firstname</label>
                        <div class="col-md-12">
                          <input placeholder="firstname" class="form-control form-control-line" type="text" name="eFname" value="<?php if(isset($admin_info['firstname']) && $admin_info['firstname']!==null){echo $admin_info['firstname'];}?>">
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="col-md-12">Lastname</label>
                        <div class="col-md-12">
                          <input placeholder="lastname" class="form-control form-control-line" type="text" name="eLname" value="<?php if(isset($admin_info['lastname']) && $admin_info['lastname']!==null){echo $admin_info['lastname'];}?>">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="col-md-12">Phone</label>
                        <div class="col-md-12">
                          <input placeholder="123 456 7890" class="form-control form-control-line" type="tel" pattern="[+0-9].{7,17}" title="Enter minimum of 7 digits and maximum of 17 digits, may include '+'" name="ePhone" value="<?php if(isset($admin_info['phone']) && $admin_info['phone']!==null){echo $admin_info['phone'];}?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-12">Address</label>
                        <div class="col-md-12">
                          <input placeholder="address" class="form-control form-control-line" type="text" name="eAddress" value="<?php if(isset($admin_info['address']) && $admin_info['address']!==null){echo $admin_info['address'];}?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-md-12">City</label>
                        <div class="col-md-12">
                          <input placeholder="city" class="form-control form-control-line" type="text" name="city" value="<?php if(isset($admin_info['city']) && $admin_info['city']!==null){echo $admin_info['city'];}?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-sm-12">Select Country</label>
                        <div class="col-sm-12">
                          <select class="form-control form-control-line" name="eCountry">
                            <option name="selectedCountry"><?php if(isset($admin_info['country']) && $admin_info['country']!==null){echo $admin_info['country'];}?></option>
                            <?php include('../include/selectCountry.html');?>
                          </select>
                        </div>
                      </div>                     
                      <div class="form-group">
                        <div class="col-sm-12">
                          <button type="submit" class="btn btn-warning" name="uProfile">Update Profile</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
 <!--second Pane -->
 <div class="col-md-4 col-xs-12">
             
                  <div class="card-body">
                  	<h4 class="text-primary" style="color:steelblue !important;">Reset your password</h4>
                    <form class="form-horizontal form-material" method="POST" action="<?= htmlentities($_SERVER['PHP_SELF']);?>">
                     
                      <div class="form-group">
                        <label class="col-md-12">Password</label>
                        <div class="col-md-12">
                          <input placeholder="Enter new password" class="form-control form-control-line" type="password" name="ePass" pattern="(?=.*\d)(?=.*[A-Z])(?=.*[a-z]).{8,}" title="password must contain atleast 1 digit, atleast 1 uppercase letter, atleast 1 lowercase letter and minimum of 8 characters in all"><span class="note"><small>atleast 1 digit, atleast 1 uppercase letter, atleast 1 lowercase letter and minimum of 8 characters in all</small></span>
                          <span class="text-danger"><?php if(isset($passErr) && $passErr!==null){echo $passErr;} ?></span>
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="col-md-12">Confirm Password</label>
                        <div class="col-md-12">
                          <input placeholder="Confirm password" class="form-control form-control-line" type="password" name="eCPass">
                          <span class="note"><small>must match password entered in the box above</small></span>
                            <span class="text-danger"><?php if(isset($cpassErr) && $cpassErr!==null){echo $cpassErr;} ?></span><br>
                            <span class="text-danger"><?php if(isset($cpasses) && $cpasses!==null){echo $cpasses;} ?></span>
                        </div>
                      </div>            
                      <div class="form-group">
                        <div class="col-sm-12">
                          <button type="submit" class="btn btn-warning" name="uPwd">Update Password</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <!--Third Form-->
                <div class="col-md-4 col-xs-12">
 <div class="card-body">
                    <h4 class="text-primary" style="color:steelblue !important;">Upload profile picture</h4>
                    <form class="form-horizontal form-material" action="<?= htmlentities($_SERVER['PHP_SELF']);?>" method="POST" enctype="multipart/form-data">
                       <div class="form-group">
                        <div class="col-md-6 col-xs-12">
                          <input class="form-control form-control-line" name="photo" id="example-email" type="file" title="Use this to upload your profile photo" accept="image/jpg,image/jpeg,image/png"><span><small><strong>Note:</strong> Only .jpg, .jpeg, .png formats allowed up to max size of 500KB</small></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-6 col-xs-12">
                          <button type="submit" class="btn btn-warning" name="uPhoto">Upload</button>
                        </div>
                      </div>
                    </form>
              </div>
            </div>

            </div>
        </div>
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
    </body>
    </html>
    <?php
if(isset($toast) && $toast==='success'){echo "<script>toastr.success('You have updated your information', 'Success')</script>";}
if(isset($toast) && $toast==='fail'){echo "<script>toastr.error('We could not update that information', 'Error')</script>";}
?>
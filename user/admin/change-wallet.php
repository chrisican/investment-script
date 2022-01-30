 <?php
 
//Require my functions.php file
include('../function.php');
//Begin cookie and include the cookie file
include('../cookie.php');
?>

<?php 

if(isset($_GET['dwa']) && $_GET['dwa']!==null){
    //$GLOBALS['dwaa'] = $_GET['dwa'];
    $dwa = $_GET['dwa'];
    echo"<script>window.alert('Click the OK button to permanently delete this address')</script>";
    $delete_wallet ="DELETE FROM `addresses` WHERE `id_no`='$dwa'";
    if($con->query($delete_wallet)){echo "<script>location.href='addresses.php'</script>";}
    else{header('Location:addresses.php');}
   }

if(isset($_COOKIE['wallet']) && $_COOKIE['wallet']!==null){
    $cookieWallet = $_COOKIE['wallet'];
$ser = "SELECT `wallets` FROM `addresses` WHERE `id_no` = '$cookieWallet'";   
$ser_exec = $con->query($ser);
$ser_assoc = mysqli_fetch_assoc($ser_exec);
$wallet_address_fetched = $ser_assoc['wallets']; 
    if(isset($_POST['editWallet'])){
    //$ewa = $_POST['idNo'];
    //setcookie("wallet",$_GET['ewa']);
    $new_wallet = sanitize($_POST['wallet']);
    $walAddress = sanitize($_POST['address']);
    $walID = $_POST['idNo'];
    echo"<script>alert('You are about to update wallet name and address, Do you want to proceed?')</script>";
    $sql_walAddress = "UPDATE `addresses` SET `addresses`.`wallets`='$new_wallet',`addresses`.`addresses` ='$walAddress' WHERE `addresses`.`id_no` = '$walID'";
    if($con->query($sql_walAddress)===TRUE){echo"<script>location.href='addresses.php'</script>";}
}
}

 if(isset($_COOKIE['qrCode']) && $_COOKIE['qrCode']!==null){
    //$eqc = $_GET['eqc'];
    if(isset($_POST['editqrc'])){
    $qrNo = $_POST['qrNo'];
  $errors = [];
  $file_tmp= $_FILES['qrcode']['tmp_name'];
  $file_name=$_FILES['qrcode']['name'];
  $file_size=$_FILES['qrcode']['size'];
  $file_type=$_FILES['qrcode']['type'];

  $file_name_sanitizer= explode('.',$file_name);
  $file_ext = strtolower(end($file_name_sanitizer));

  $extensions = array("jpg","jpeg","png");

if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a jpeg, jpg or png file.";
          echo "<script>alert('Only jpeg, jpg, png files are allowed')</script>";
      }
      
      if($file_size > 200000) {
         $errors[]='File size must be less than 200KB';
         echo "<script>alert('File size should be less than 200KB')</script>";
      }

      if(empty($errors)==true) {
         move_uploaded_file($file_tmp,"../upload/".$file_name);
         $sql_qrcode_insert_photo = "UPDATE `addresses` SET `addresses`.`qrcode` ='$file_name' WHERE `addresses`.`id_no` = '$qrNo'";
         if($con->query($sql_qrcode_insert_photo)){
         echo"<script>location.href='addresses.php'</script>";
      }//else{$toast = "fail";}
    }
}
}
$con->close();
?>

<?php include('header.php'); ?>

<body class="page-user" style="background: #ECF0F1 !important;">
<?php include('nav.php'); ?>

 
<div>  
<div class="page-content">
      <div class="container">
        <div class="row">
            <div class="col-md-6">

            <div class="card content-area">   
                <div class="popup-body">
                    <form method="post" action="<?= htmlentities($_SERVER['PHP_SELF']);?>" class="form-group">
                     <div class="form-group">
                         <input class="form-control form-control-line" type="text" name="idNo" value="<?php if(isset($_COOKIE['wallet']) && $_COOKIE['wallet']!==null){echo $_COOKIE['wallet'];}?>" hidden> 

                          <label class="text-dark">Wallet</label><br>
                        <input class="form-control form-control-line" type="text" name="wallet" placeholder="" value="<?= $wallet_address_fetched;?>" required>

                        <label class="text-dark">Address</label><br>
                        <input class="form-control form-control-line" type="text" name="address" placeholder="Enter address" required>
                    </div>
                         <input type="submit" name="editWallet" class="btn btn-primary">
                    </form> </div>
          </div>
      </div>
       <div class="col-md-6">
         <div class="card content-area">   
                <div class="popup-body">
                    <form method="post" action="<?= htmlentities($_SERVER['PHP_SELF']);?>" class="form-group" enctype="multipart/form-data">
                        
                        <input class="form-control form-control-line" type="text" name="qrNo" value="<?php if(isset($_COOKIE['qrCode']) && $_COOKIE['qrCode']!==null){echo $_COOKIE['qrCode'];}?>" hidden> 
                    <div class="form-group">
                        <label class="text-dark">QR CODE</label><br>
                         <input type="file" name="qrcode" accept="image/jpg,image/jpeg,image/png" required>
                     </div>
                         <input type="submit" name="editqrc" class="btn btn-primary">
                    </form> </div>
          </div>
       </div>
 
</div>
    </div>
</div>
</div>
   
    <div class="footer-bar">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-8">
                    <ul class="footer-links">
                        
                        <li><a href="https://p2pxtrade.com/privacy-policy">Privacy Policy</a></li>
                        <li><a href="https://p2pxtrade.com/terms-of-use">Terms & Conditions</a></li>
                    </ul>
                </div>
                <!-- .col -->
                <div class="col-md-4 mt-2 mt-sm-0">
                    <div class="d-flex justify-content-between justify-content-md-end align-items-center guttar-25px pdt-0-5x pdb-0-5x">
                        <div class="copyright-text">&copy; <?= date('Y'); ?> p2pxtrade - All Rigts Reserved</div>
                    </div>
                </div>
                <!-- .col -->
            </div>
            <!-- .row -->
        </div>
        <!-- .container -->
    </div>
    <!-- .footer-bar -->

 
   
        <script src="https://transactright.com/js/app.js"></script>
<script src="../assets/js/jquery.bundle49f7.js"></script>
<script src="../assets/js/script49f7.js"></script>
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
if(isset($toast) && $toast==='success'){echo "<script>toastr.success('Database has been updated', 'Success')</script>";}
if(isset($toast) && $toast==='fail'){echo "<script>toastr.error('Database could not be updated', 'Error')</script>";}
?>

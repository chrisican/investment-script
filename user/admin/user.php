<?php
//Require my functions.php file
include('../function.php');
//Begin cookie and include the cookie file
include('../cookie.php');
?>



<?php include('header.php'); ?>

<body class="page-user" style="background: #ECF0F1 !important;">
<?php include('nav.php'); ?>

 
<div>  
<div class="page-content">
      <div class="container">
      	<div class="row">

            <div class="card content-area">   
	<?php
if(isset($_GET['vu']) || isset($_GET['va'])){$vu = @$_GET['vu']; $va = @$_GET['va']; echo"<script>window.alert('Click the OK button to delete this user')</script>";?>
<!-- div class="modal fade sho d-bloc" id="delete-user" tabindex="1">
        <div class="modal-dialog modal-dialog-sm modal-dialog-centered">
            <div class="modal-content">
                <a href="#" class="modal-close" data-dismiss="modal" aria-label="Close"><big>&times;</big></a>-->
                <div class="popup-body" style="background: #ECF0F1 !important;"> 
 				<div>
 					<h2 class="msg">Deleting record from database. This might take a while</h2>
 				</div>
 				<div class="spin">
                   <center><img src="../dist/img/giphy_loader.gif" width="50%" height="auto"></center>
               </div>
                    <?php 
                    if(isset($_GET['vu']) && $_GET['vu']!==null){
                   $vUser = "DELETE FROM `users` WHERE `id_no` = '$vu'";
                   if($con->query($vUser)){
                    	echo "<script>location.href='view-users.php'</script>";
                   }else{header('Location:view-users.php');}
                    }

              if(isset($_GET['va']) && $_GET['va']!==null){
                   $vAdmin = "DELETE FROM `admin` WHERE `id_no` = '$va'";
                   if($con->query($vAdmin)){
                    	echo "<script>location.href='view-admin.php'</script>";
                   }else{header('Location:view-admin.php');}
                    }
            } ?>

<?php 
if(isset($_GET['at']) && $_GET['at']!==null){
	$at = $_GET['at'];
    $dateToday = date("Y-m-d");
	echo"<script>window.alert('Transactions should be marked as approved only once. Click OK to proceed')</script>";
	$vTransaction ="UPDATE `transaction` SET `status`='approved',`transact_date`='$dateToday' WHERE `txn`='$at'";
	if($con->query($vTransaction)){echo "<script>location.href='transactions.php'</script>";}
	else{header('Location:transactions.php');}
   }

   if(isset($_GET['dt']) && $_GET['dt']!==null){
	$dt = $_GET['dt'];
	echo"<script>window.alert('Click the OK button to delete this transaction')</script>";
	$vTransaction_delete ="DELETE FROM `transaction` WHERE `txn`='$dt'";
	if($con->query($vTransaction_delete)){echo "<script>location.href='transactions.php'</script>";}
	else{header('Location:transactions.php');}
   }
   ?>

   <?php 
if(isset($_GET['af']) && $_GET['af']!==null){
	$af = $_GET['af'];
	echo"<script>window.alert('Fund requests should be marked as approved only once. Click OK to proceed')</script>";
	$approve_fund ="UPDATE `fund` SET `status`='approved' WHERE `ftxn`='$af'";
	if($con->query($approve_fund)){
        echo "<script>location.href='funding-requests.php'</script>";
    }
	else{header('Location:funding-requests.php');}
   }

   if(isset($_GET['df']) && $_GET['df']!==null){
	$df = $_GET['df'];
	echo"<script>window.alert('Click the OK button to permanently delete this fund request')</script>";
	$fund_request_delete ="DELETE FROM `fund` WHERE `ftxn`='$df'";
	if($con->query($fund_request_delete)){echo "<script>location.href='funding-requests.php'</script>";}else{header('Location:funding-requests.php');}
   }
   ?>

    <?php 
if(isset($_GET['amt']) && $_GET['amt']!==null){
    $amt = $_GET['amt'];
    $approve_fund ="UPDATE `fund` SET `status`='approved' WHERE `ftxn`='$af'";
    if($con->query($approve_fund)){echo "<script>location.href='funding-requests.php'</script>";}
    else{header('Location:funding-requests.php');}
   }

   if(isset($_GET['df']) && $_GET['df']!==null){
    $df = $_GET['df'];
    echo"<script>window.alert('Click the OK button to permanently delete this fund request')</script>";
    $fund_request_delete ="DELETE FROM `fund` WHERE `ftxn`='$df'";
    if($con->query($fund_request_delete)){echo "<script>location.href='funding-requests.php'</script>";}else{header('Location:funding-requests.php');}
   }
   ?>

   <?php 
if(isset($_GET['aw']) && $_GET['aw']!==null){
	$aw = $_GET['aw'];
	echo"<script>window.alert('Withdraw requests should be marked as approved only once. Click OK to proceed')</script>";
	$approve_withdraw ="UPDATE `withdraw` SET `wstatus`='approved' WHERE `wtxn`='$aw'";
	if($con->query($approve_withdraw)){echo "<script>location.href='withdraw-requests.php'</script>";}
	else{header('Location:withdraw-requests.php');}
   }

   if(isset($_GET['dw']) && $_GET['dw']!==null){
	$dw = $_GET['dw'];
	echo"<script>window.alert('Click the OK button to permanently delete this withdraw request')</script>";
	$withdraw_request_delete ="DELETE FROM `withdraw` WHERE `wtxn`='$dw'";
	if($con->query($withdraw_request_delete)){echo "<script>location.href='withdraw-requests.php'</script>";}else{header('Location:withdraw-requests.php');}
   }
   ?>

    <?php 

if(isset($_GET['dwa']) && $_GET['dwa']!==null){
	$dwa = $_GET['dwa'];
	echo"<script>window.alert('Click the OK button to permanently delete this address')</script>";
	$delete_wallet ="DELETE FROM `addresses` WHERE `id_no`='$dwa'";
	if($con->query($delete_wallet)){echo "<script>location.href='addresses.php'</script>";}
	else{header('Location:addresses.php');}
   }
?>
                </div>
                  <!-- 
            </div>
        </div>
    </div>
 -->
</div>
	</div>
</div>
</div>
</div>

                              <!-- .card-innr -->
                                    <!-- .card-innr -->
  <div class="modal fade sho d-bloc" id="edit-address" tabindex="-1">
        <div class="modal-dialog modal-dialog-sm modal-dialog-centered">
            <div class="modal-content">
                <a href="#" class="modal-close" data-dismiss="modal" aria-label="Close"><big>&times;</big></a>
                <div class="popup-body">

                    <form method="post" action="">

                        <input type="text" name="idNo" value="">
                    </form>
        
                 
                </div>
            </div>
        </div>
    </div>
 
    <div class="footer-bar">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-8">
                    <ul class="footer-links">
                        
                        <li><a href="https://zenithbrokertrade.org/docs/terms-of-use.php">Terms of Service</a></li>
        <li><a href="https://zenithbrokertrade.org/docs/about.php">About</a></li>
        <li><a href="https://zenithbrokertrade.org/docs/cookie-policy.php">Cookie Policy</a></li>
        <li><a href="https://zenithbrokertrade.org/docs/refund-policy.php">Refund Policy</a></li>
        <li><a href="https://zenithbrokertrade.org/docs/privacy-policy.php">Privacy Policy</a></li>
                    </ul>
                </div>
                <!-- .col -->
                <div class="col-md-4 mt-2 mt-sm-0">
                    <div class="d-flex justify-content-between justify-content-md-end align-items-center guttar-25px pdt-0-5x pdb-0-5x">
                        <div class="copyright-text"><p style="padding:10px 0 !important;"><center><small>©&nbsp;<?= date('Y');?>&nbsp;<a href="#"><span class="orange">Zenith Broker Trade</span></a> | All rights reserved.&nbsp;<!-- Zenith Broker Trade - The easiest place to invest bitcoin. -->Zenith Broker Trade is a registered investment platform providing digital asset investment management services to individuals, lending and investment, multicurrency and multifunctional online platform based on blockchain technology.</small></center></p></div>
                    </div>
                </div>
                <!-- .col -->
            </div>
            <!-- .row -->
        </div>
        <!-- .container -->
    </div>
    <!-- .footer-bar -->

    <!-- Modal Centered -->
    
    <!-- Modal End -->
    <!-- Modal Centered -->

   
   
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
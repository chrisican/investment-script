<?php
//Require my functions.php file
include('../function.php');
//Begin cookie and include the cookie file
include('../cookie.php');
?>
<?php include('header.php'); ?>

<body class="page-user">
<?php include('nav.php'); ?>

 
<div>     
  <div class="page-content">
      <div class="container">
            <div class="card content-area">
                                <div class="card-innr table-responsive">
                    <div class="card-head">
                        <h4 class="card-title">Update Addresses</h4>
                    </div>
                                <table class="data-table table table-hover dt-init user-tnx">
                        <thead>
                            <tr class="data-item data-head">
                                <th class="data-col dt-tnxno">Id_No</th>
                                <th class="data-col dt-amount">Wallets</th>
                                <th class="data-col dt-account">Addresses</th>
                                <th class="data-col dt-type">
                                    <div class="dt-type-text">QR Code</div>
                                </th>
                                 <th class="data-col dt-type">
                                    <div class="dt-type-text">Edit Address</div>
                                </th>
                                 <th class="data-col dt-type">
                                    <div class="dt-type-text">Edit QRcode</div>
                                </th>
                                  <th class="data-col dt-type">
                                    <div class="dt-type-text">Delete</div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                           $sql_addresses2 = "SELECT * FROM `addresses`";
                            $sql_addresses_exec2 = $con->query($sql_addresses2);
                           foreach($sql_addresses_exec2 as $addresses_info){extract($addresses_info);?>

                                                        <tr class="data-item">
                                <td class="data-col dt-tnxno">
                                    <div class="d-flex align-items-center">
                                    <!--   <div class="data-state data-state-pending">
                                            <span class="d-none">waiting</span>
                                        </div> -->
                                            <div class="fake-class">
                                        <span class="lead tnx-id"><?php if(isset($id_no) && $id_no!==null){echo $id_no;}?></span>
                                        </div>
                                    </div>
                                </td>
                                <td class="data-col dt-token">
                                    <span class="lead token-amount"><?php if(isset($wallets) && $wallets!==null){echo $wallets;}?></span>
                                  <!--   <span class="sub sub-symbol"></span> -->
                                </td>
                                <td class="data-col dt-account" id="td_approve">
     <span class="lead user-info text-warning"><?php if(isset($addresses) && $addresses!==null){echo $addresses;}?></span>
      <td class="data-col dt-account" id="td_approve">
     <span class="lead user-info text-warning"><?php if(isset($qrcode) && $qrcode!==null){echo "<img src='../upload/{$qrcode}' alt='QRCode' width='40px' height='40px'>";}?></span> </td>

                               <td class="data-col dt-account" id="td_approve">
      <a name="delete" href="change-wallet.php?ewa=<?= $id_no; ?>" class="dt-type-md"><span class="badge badge-outline badge-info badge-md">Edit Address</span></a>
      <a name="delete" href="change-wallet.php?ewa=<?= $id_no; ?>" class="dt-type-md"><span class="dt-type-sm badge badge-sq badge-outline badge-info badge-md">Edit Address</span></a>
         </td>

                                                                    </td>
                               <td class="data-col dt-account" id="td_approve">
     <a name="delete" href="change-wallet.php?eqc=<?= $id_no; ?>" class="dt-type-md"><span class="badge badge-outline badge-info badge-md">Edit QRCode</span></a>
      <a name="delete" href="change-wallet.php?eqc=<?= $id_no; ?>" class="dt-type-md"><span class="dt-type-sm badge badge-sq badge-outline badge-info badge-md">Edit QRCode</span></a>
                                                                    </td>
                <td class="data-col dt-account" id="td_approve">
    <a name="delete" href="change-wallet.php?dwa=<?= $id_no; ?>" class="dt-type-md"><span class="badge badge-outline badge-primary badge-md">Delete</span></a>
     <a href="change-wallet.php?dwa=<?= $id_no; ?>" class="dt-type-sm badge badge-sq badge-outline badge-primary badge-md">Delete</a>
                                                                    </td>
                            </tr>
                        <?php }?>
                                                    </tbody>
                    </table>
                </div>
                              <!-- .card-innr -->
  
          <!-- .card -->
          </div>
          <div class="row">
  <form action="<?= htmlentities($_SERVER['PHP_SELF']);?>" method="post" class="form
    ">              
<table class="table-responsive">
    <tr>
        <td class="">         
            <input class="form-control form-control-line" type="text" name="newWallet" placeholder="currency">
        </td>
        <td>
            <input class="form-control form-control-line" type="text" name="newAddress" placeholder="address">
        </td>
         <td>
            <input class="btn btn-primary btn-outline" type="submit" name="addNewAddress" value="Add New Address">
        </td>
    </tr>
</table>
</form>
</div>
        </div>
      <!-- .container -->
  </div>
  <!-- .page-content -->
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
    
    <!-- JavaScript (include all script here) -->
    <script src="https://transactright.com/js/app.js"></script>
<script src="../assets/js/jquery.bundle49f7.js"></script>
<script src="../assets/js/script49f7.js"></script>
       <!--  <script type="text/javascript">
        $('#reload').click(function() {
            $.ajax({
                type: 'GET',
                url: '/reload-captcha',
                success: function(data) {
                    $(".captcha span").html(data.captcha);
                }
            });
        });
    </script> -->

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
<!-- <script type="text/javascript">
  toastr.info('Admin and escrow wallet addresses can be managed from here','Info');
</script> -->
    </body>
    </html>
    <?php 
if(isset($_POST['addNewAddress'])){
    $newWallet = sanitize($_POST['newWallet']);
    $newAddress = sanitize($_POST['newAddress']);

    $Sql_addNewAddress = "INSERT INTO `addresses`(`wallets`,`addresses`) VALUES('$newWallet','$newAddress')";
    if($con->query($Sql_addNewAddress)===TRUE){$toast="addNewSuccess";}
    else{$toast="failAddNewSuccess";}
}
?>
    <?php
if(isset($toast) && $toast==='success'){echo "<script>toastr.success('You have updated database', 'Success')</script>";}
if(isset($toast) && $toast==='fail'){echo "<script>toastr.error('Database could not be updated', 'Error')</script>";}
if(isset($toast) && $toast==='addNewSuccess'){echo "<script>toastr.success('You have added a new wallet', 'Success')</script>";}
if(isset($toast) && $toast==='failAddNewSuccess'){echo "<script>toastr.error('Wallet could not be added', 'Error')</script>";}
?>


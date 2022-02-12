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
                        <h4 class="card-title">Trade Transactions</h4>
                    </div>
                                <table class="data-table table table-hover dt-init user-tnx">
                        <thead>
                            <tr class="data-item data-head">
                                <th class="data-col dt-tnxno">TXN</th>
                                <th class="data-col dt-amount">Email</th>
                                <th class="data-col dt-account">Package</th>
                                <th class="data-col dt-type">
                                    <div class="dt-type-text">Amount</div>
                                </th>
                                 <th class="data-col dt-type">
                                    <div class="dt-type-text">Currency</div>
                                </th>
                                 <th class="data-col dt-type">
                                    <div class="dt-type-text">Duration</div>
                                </th>
                                <th class="data-col dt-type">
                                    <div class="dt-type-text">Due date</div>
                                </th>
                                <th class="data-col dt-type">
                                    <div class="dt-type-text">Role</div>
                                </th>
                                <th class="data-col dt-type">
                                    <div class="dt-type-text">Status</div>
                                </th>
                                <th class="data-col dt-type">
                                    <div class="dt-type-text">Approve</div>
                                </th>
                                <th class="data-col dt-type">
                                    <div class="dt-type-text">Delete</div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql_transacts_exec = "SELECT * FROM `transaction`";
                            $sql_transact_exec = $con->query($sql_transacts_exec);
                           foreach($sql_transact_exec as $inft){extract($inft);?>

                                                        <tr class="data-item">
                                <td class="data-col dt-tnxno">
                                    <div class="d-flex align-items-center">
                                  <!--     <div class="data-state data-state-pending">
                                            <span class="d-none">waiting</span>
                                        </div> -->
                                           <div class="fake-class">
                                        <span class="lead tnx-id"><?php if(isset($txn) && $txn!==null){echo $txn;}?></span>
                                            <!-- <span class="sub sub-date"></span> -->
                                        </div>
                                    </div>
                                </td>
                                <td class="data-col dt-token">
                                    <span class="lead token-amount"><?php if(isset($user_email) && $user_email!==null){echo $user_email;}?></span>
                              <span class="sub sub-symbol"><?php if(isset($transact_date) && $transact_date!==null){echo $transact_date;}?></span> 
                                </td>

                                 <td class="data-col dt-token">
                                    <span class="lead token-amount"><?php if(isset($package) && $package!==null){echo $package;}?></span>
                                  <!--   <span class="sub sub-symbol"></span> -->
                                </td>

                                 <td class="data-col dt-token">
                                    <span class="lead token-amount"><?php if(isset($inft['amount']) && $inft['amount']!==null){echo $inft['amount'];}?></span>
                                  <!--   <span class="sub sub-symbol"></span> -->
                                </td>

                                 <td class="data-col dt-token">
                                    <span class="lead token-amount"><?php if(isset($inft['currency']) && $inft['currency']!==null){echo $inft['currency'];}?></span>
                                  <!--   <span class="sub sub-symbol"></span> -->
                                </td>

 <td class="data-col dt-token">
                                    <span class="lead token-amount"><?php if(isset($duration) && $duration!==null){echo $duration .' days';}?></span>
                                  <!--   <span class="sub sub-symbol"></span> -->
                                </td>

                                 <td class="data-col dt-account">
            <span class="lead user-info"><?php if(isset($transact_date) && isset($duration)){echo date('Y-m-d', strtotime($transact_date . + ($duration - 2) .'days'));}?></span>
        </td>


                                <td class="data-col dt-account" id="td_approve">
     <span class="lead user-info text-dark"><?php if(isset($role) && $role!==null){echo $role;}?></span></td>
      <td class="data-col dt-account" id="td_approve">
     <span class="lead user-info text-success"><?php if(isset($status) && $status!==null){echo $status;}?></span> </td>

                              <td class="data-col dt-type">
                            <a href="user.php?at=<?= $txn; ?>" class="dt-type-md"><span class='badge badge-outline badge-info badge-md'>Approve</span></a>
                            <a href="user.php?at=<?= $txn; ?>" class="dt-type-sm badge badge-sq badge-outline badge-info badge-md">Approve</a>
                        </td>
      <td class="data-col dt-type">
                            <a href="user.php?dt=<?= $txn; ?>" class="dt-type-md"><span class='badge badge-outline badge-primary badge-md'>Delete</span></a>
                            <a href="user.php?dt=<?= $txn; ?>" class="dt-type-sm badge badge-sq badge-outline badge-primary badge-md">Delete</a>
                        </td>
                                                                    </td>
                            </tr>
                        <?php }?>
                                                    </tbody>
                    </table>
                </div>
                              <!-- .card-innr -->
 
          <!-- .card -->
                </div>
                              <!-- .card-innr -->

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
<!-- Toastr -->
<script src="dist/js/toastr.min.js"></script>
<script type="text/javascript">
  toastr.info('View and manage trade transactions from your users','Info');
</script>
    </body>
    </html>
    <?php
if(isset($toast) && $toast==='success'){echo "<script>toastr.success('You have updated database', 'Success')</script>";}
if(isset($toast) && $toast==='fail'){echo "<script>toastr.error('Database could not be updated', 'Error')</script>";}
?>
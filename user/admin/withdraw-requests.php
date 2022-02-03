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
                        <h4 class="card-title">Withdraw Requests</h4>
                    </div>
  <table class="data-table table table-hover dt-init user-tnx">
                        <thead>
                            <tr class="data-item data-head">
                                <th class="data-col dt-tnxno">Txn ID</th>
                                <th class="data-col dt-amount">Amount</th>
                                <th class="data-col dt-account">Status</th>
                                <th class="data-col dt-type">
                                    <div class="dt-type-text">Type</div>
                                </th>
                                <th class="data-col data-actions">Approve</th>
                                <th class="data-col data-actions">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sqlWithdraw = "SELECT * FROM `withdraw`";
                        $sqlWithdrawExec = $con->query($sqlWithdraw);
                        foreach($sqlWithdrawExec as $withdrawInfo){extract($withdrawInfo);?>
                                                

                                                        <tr class="data-item">
                                <td class="data-col dt-tnxno">
                                    <div class="d-flex align-items-center">
                                                                                <div class="data-state data-state-pending">
                                            <span class="d-none">waiting</span>
                                        </div>
                                                                                <div class="fake-class">
                                        <span class="lead tnx-id"><?php if(isset($wtxn) && $wtxn!==null){echo $wtxn;}?></span>
                                            <span class="sub sub-date"><?php if(isset($withdraw_request_date) && $withdraw_request_date!==null){echo $withdraw_request_date;}?></span>
                                        </div>
                                    </div>
                                </td>
                                <td class="data-col dt-token">
                                    <span class="lead token-amount"><?php if(isset($wamount) && $wamount!==null){echo $wamount;}?></span>
                                    <span class="sub sub-symbol"><?php if(isset($wcurrency) && $wcurrency!==null){echo strtoupper($wcurrency);}?></span>
                                </td>
                                <td class="data-col dt-account">
     <span class="lead user-info text-success"><?php if(isset($wstatus) && $wstatus!==null){echo $wstatus;}?></span>
                                                                    </td>
                                <td class="data-col dt-type">
               <?php if(isset($withdraw_request_date)&&isset($wamount)&&isset($wcurrency)&&isset($wstatus)){echo "<span class='dt-type-md badge badge-outline badge-error badge-md'>Debit</span>";}?>
                                    <span class="dt-type-sm badge badge-sq badge-outline badge-success badge-md">c</span>
                                                </td>
                            <td class="data-col dt-type">
                                    <a href="user.php?aw=<?= $wtxn; ?>" class="dt-type-md"><span class='badge badge-outline badge-info badge-md'>Approve</span></a>
                                    <a href="user.php?aw=<?= $wtxn; ?>" class="dt-type-sm badge badge-sq badge-outline badge-info badge-md">Approve</a>
                                </td>

                                  <td class="data-col dt-type">
                                    <a href="user.php?dw=<?= $wtxn; ?>" class="dt-type-md"><span class='badge badge-outline badge-primary badge-md'>Delete</span></a>
                                    <a href="user.php?dw=<?= $wtxn; ?>" class="dt-type-sm badge badge-sq badge-outline badge-primary badge-md">Delete</a>
                                </td>
                            </tr>
                        <?php }?>
                                                    </tbody>
                    </table>
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
<script src="./assets/js/jquery.bundle49f7.js"></script>
<script src="./assets/js/script49f7.js"></script>
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
 
<!-- Toastr -->
<script src="dist/js/toastr.min.js"></script>
    </body>
    </html>
    <?php
if(isset($toast) && $toast==='success'){echo "<script>toastr.success('You have updated your information', 'Success')</script>";}
if(isset($toast) && $toast==='fail'){echo "<script>toastr.error('We could not update that information', 'Error')</script>";}
?>

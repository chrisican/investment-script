<?php
//Require my functions.php file
include('../function.php');
//Begin cookie and include the cookie file
include('../cookie.php');
$folder_image = "../upload/";
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
                        <h4 class="card-title">Latest Funding Request</h4>
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
                                <th class="data-col dt-type">
                                    <div class="dt-type-text">Proof</div>
                                </th>
                                <th class="data-col dt-type">
                                    <div class="dt-type-text">Comment</div>
                                </th>
                                <th class="data-col data-actions">
                                    <div class="dt-type-text">Edit</div>
                                </th>
                                <th class="data-col data-actions">
                                    <div class="dt-type-text">Approve</div>
                                </th>
                                <th class="data-col data-actions">
                                    <div class="dt-type-text"><a href="user.php?fr=<?= $ftxn; ?>">Delete</a></div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                           $sql_fund_select = "SELECT * FROM `fund`";
                            $sql_fund_select_exec = $con->query($sql_fund_select);
                            foreach($sql_fund_select_exec as $fundInfo){extract($fundInfo);?>

                                                        <tr class="data-item">
                                <td class="data-col dt-tnxno">
                                    <div class="d-flex align-items-center">
                                                                               <!--  <div class="data-state data-state-pending">
                                            <span class="d-none">waiting</span>
                                        </div> -->
                                            <div class="fake-class">
                                        <span class="lead tnx-id"><?php if(isset($ftxn) && $ftxn!==null){echo $ftxn;}?></span>
                                            <span class="sub sub-date"><?php if(isset($request_date) && $request_date!==null){echo $request_date;}?></span>
                                        </div>
                                    </div>
                                </td>
                                <td class="data-col dt-token">
                                    <span class="lead token-amount"><?php if(isset($amount) && $amount!==null){echo $amount;}?></span>
                                    <span class="sub sub-symbol"><?php if(isset($currency) && $currency!==null){echo strtoupper($currency);}?></span>
                                </td>
                                <td class="data-col dt-account" id="td_approve">
     <?php if(isset($status) && $status!==null){if($status==="pending"){echo "<span class='lead user-info text-danger'>{$status}</span>";}else{echo "<span class='lead user-info text-success'>{$status}</span>";}}?><!-- </span> -->
                                                                    </td>
                                <td class="data-col dt-type">
                    <?php if(isset($request_date)&&isset($amount)&&isset($currency)&&isset($status)){echo "<span class='dt-type-md badge badge-outline badge-success badge-md'>Credit</span>";}?>
                                    <span class="dt-type-sm badge badge-sq badge-outline badge-success badge-md">c</span>
                                                </td>

                                                 <td class="data-col dt-type">
                    <?php if(isset($fproof) && $fproof!==null){echo"<img src='../upload/$fproof' alt='proof' title='Proof of payment' width='40px' height='40px'>";}?>
                                    <span class="dt-type-sm badge badge-sq badge-outline badge-success badge-md">Proof</span>
                                                </td>

                                                 <td class="data-col dt-type">
                    <?php if(isset($fcomment) && $fcomment!==null){echo $fcomment;}else{echo"N/A";}?>
                                    <span class="dt-type-sm badge badge-sq badge-outline badge-success badge-md">Comment</span>
                                                </td>
                                                 <td class="data-col dt-type">
                            <a href="edit-amount.php?af=<?=$ftxn;?>" data-toggle="" data-target="" class="dt-type-md"><span class='badge badge-outline badge-info badge-md'>Edit</span></a>
                            <a href="edit-amount.php?af=<?=$ftxn;?>" data-toggle="" data-target="" class="dt-type-sm badge badge-sq badge-outline badge-info badge-md">E</a>
                        </td>

                        <td class="data-col dt-type">
                            <a href="user.php?af=<?= $ftxn; ?>" class="dt-type-md"><span class='badge badge-outline badge-info badge-md'>Approve</span></a>
                            <a href="user.php?af=<?= $ftxn; ?>" class="dt-type-sm badge badge-sq badge-outline badge-info badge-md">A</a>
                        </td>

                        <td class="data-col dt-type">
                            <a name="delete" href="user.php?df=<?= $ftxn; ?>" class="dt-type-md"><span class='badge badge-outline badge-primary badge-md'>Delete</span></a>
                            <a href="user.php?df=<?= $ftxn; ?>" class="dt-type-sm badge badge-sq badge-outline badge-primary badge-md">D</a>
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
<script type="text/javascript">
      function approve(){
       <?php 
       $sql_change_approve = "UPDATE `fund` SET `status`='approved' WHERE `ftxn` = '$ftxn'";
       $con->mysqli_query($sql_change_approve);
       ?>
   }

    function remove(){
       <?php 
       $sql_change_remove = "DELETE FROM `fund` WHERE `ftxn` = '$ftxn'";
       $con->mysqli_query($sql_change_remove);
       ?>
   }
    </script>

<!-- Toastr -->
<script src="dist/js/toastr.min.js"></script>
    </body>
    </html>
    <?php
if(isset($toast) && $toast==='success'){echo "<script>toastr.success('You have updated database', 'Success')</script>";}
if(isset($toast) && $toast==='fail'){echo "<script>toastr.error('Database could not be updated', 'Error')</script>";}
?>
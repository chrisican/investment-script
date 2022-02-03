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
                        <h4 class="card-title">View all users</h4>
                    </div>
                                <table class="data-table table table-hover dt-init user-tnx">
                        <thead>
                            <tr class="data-item data-head">
                                <th class="data-col dt-tnxno">Email Address</th>
                                <th class="data-col dt-amount">Firstname</th>
                                <th class="data-col dt-account">Lastname</th>
                                <th class="data-col dt-type">
                                    <div class="dt-type-text">Address</div>
                                </th>
                                 <th class="data-col dt-type">
                                    <div class="dt-type-text">City</div>
                                </th>
                                 <th class="data-col dt-type">
                                    <div class="dt-type-text">Country</div>
                                </th>
                                <th class="data-col dt-type">
                                    <div class="dt-type-text">Phone</div>
                                </th>
                                <th class="data-col dt-type">
                                    <div class="dt-type-text">Photo</div>
                                </th>
                                <th class="data-col dt-type">
                                    <div class="dt-type-text">Action</div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql_users_exec = "SELECT * FROM users";
                            $sql_user_exec = $con->query($sql_users_exec);
                           foreach($sql_user_exec as $infor){extract($infor);?>

                                                        <tr class="data-item">
                                <td class="data-col dt-tnxno">
                                    <div class="d-flex align-items-center">
                                      <div class="data-state data-state-pending">
                                            <span class="d-none">waiting</span>
                                        </div>
                                           <div class="fake-class">
                                        <span class="lead tnx-id"><?php if(isset($user_email) && $user_email!==null){echo $user_email;}?></span>
                                            <span class="sub sub-date"><?php if(isset($reg_date) && $reg_date!==null){echo $reg_date;}?></span>
                                        </div>
                                    </div>
                                </td>
                                <td class="data-col dt-token">
                                    <span class="lead token-amount"><?php if(isset($firstname) && $firstname!==null){echo $firstname;}?></span>
                                  <span class="sub sub-symbol" id="id_user" name="id_user" hidden><?php if(isset($id_no) && $id_no!==null){echo $id_no;}?></span>
                                </td>

                                 <td class="data-col dt-token">
                                    <span class="lead token-amount"><?php if(isset($lastname) && $lastname!==null){echo $lastname;}?></span>
                                  <!--   <span class="sub sub-symbol"></span> -->
                                </td>

                                 <td class="data-col dt-token">
                                    <span class="lead token-amount"><?php if(isset($address) && $address!==null){echo $address;}?></span>
                                  <!--   <span class="sub sub-symbol"></span> -->
                                </td>

                                 <td class="data-col dt-token">
                                    <span class="lead token-amount"><?php if(isset($city) && $city!==null){echo $city;}?></span>
                                  <!--   <span class="sub sub-symbol"></span> -->
                                </td>

 <td class="data-col dt-token">
                                    <span class="lead token-amount"><?php if(isset($country) && $country!==null){echo $country;}?></span>
                                  <!--   <span class="sub sub-symbol"></span> -->
                                </td>


                                <td class="data-col dt-account" id="td_approve">
     <span class="lead user-info text-warning"><?php if(isset($phone) && $phone!==null){echo $phone;}?></span></td>
      <td class="data-col dt-account" id="td_approve">
     <span class="lead user-info text-warning"><?php if(isset($photo) && $photo!==null){echo "<img src='../upload/{$photo}' width='40px' height='40px'>";}?></span> </td>

                               <td class="data-col dt-account" id="td_approve">
     <a href="user.php?vu=<?= $id_no; ?>"><button class="btn btn-danger">Delete</button></a>  </td>
                            </tr><?php }?>
                        
                                                    </tbody>
                    </table>
                </div>
                              <!-- .card-innr -->
 
          <!-- .card -->
                </div>
                              <!-- .card-innr -->
  <div class="modal fade sho d-bloc" id="" tabindex="-1">
        <div class="modal-dialog modal-dialog-sm modal-dialog-centered">
            <div class="modal-content">
                <a href="#" class="modal-close" data-dismiss="modal" aria-label="Close"><big>&times;</big></a>
                <div class="popup-body">
                    <?php

                    ?>
                    <form method="post" action="">

                        <input type="text" name="idNo" value="<?= $id_no;?>">
                    </form>
        
                 
                </div>
            </div>
        </div>
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
<!-- Toastr -->
<script src="../dist/js/toastr.min.js"></script>
<script type="text/javascript">
  toastr.info('View and manage your users on this page','Info');
</script>
    </body>
    </html>

    <?php
if(isset($toast) && $toast==='success'){echo "<script>toastr.success('You have updated database', 'Success')</script>";}
if(isset($toast) && $toast==='fail'){echo "<script>toastr.error('Database could not be updated', 'Error')</script>";}
?>
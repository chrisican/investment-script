<?php
//Require my functions.php file
include('function.php');
//Begin cookie and include the cookie file
include('cookie.php');
?>
<?php include('header.php'); ?>

<body class="page-user">
<?php include('nav.php'); ?>

<div>
  <style>
    .simplebar-scroll-content {
      margin-bottom: 0px !important;
    }

    .chat-contacts-title {
      padding-left: 10px;
    }

  </style>

  <div class="page-content">
    <div class="container">
            <div class="kyc-status card mx-lg-4">
                          <div class="card-innr">
          <div class="status status-empty">
            <div class="status-icon"><big><i class=""></i></big></div>
            <span class="status-text text-dark">
              You've not been added to a room.
            </span>
            <a href="https://p2pxtrade.com/user/user-area.php" class="btn btn-primary">Return Home</a>  
          </div>
        </div>
      </div>
      
      
  </div><!-- .container -->
</div><!-- .page-content -->

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
                        <div class="copyright-text">&copy; 2021 P2PxTrade</div>
                    </div>
                </div>
                <!-- .col -->
            </div>
            <!-- .row -->
        </div>
        <!-- .container -->
    </div>
    <!-- .footer-bar -->

    
    <!-- JavaScript (include all script here) -->
<script src="https://transactright.com/js/app.js"></script>
    <script src="./assets/js/jquery.bundle49f7.js"></script>
    <script src="./assets/js/script49f7.js"></script>
       <!--  <script type="text/javascript">
        $('#reload').click(function() {
            $.ajax({
                type: 'GET',
                url: 'https://transactright.com/reload-captcha',
                success: function(data) {
                    $(".captcha span").html(data.captcha);
                }
            });
        });
    </script> -->
 <!-- Toastr -->
<script src="dist/js/toastr.min.js"></script>
<script src="//code.tidio.co/ylcbkybnqaslgvjzhluenllylwxzgcyl.js" async></script>
    </body>
    </html>
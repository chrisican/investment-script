<?php
//Require my functions.php file
include('function.php');
//Begin cookie and include the cookie file
include('cookie.php');

//$sessEmail = $_SESSION['email'];

$sql_active_transact = "SELECT * FROM `transaction` WHERE `user_email`='$session_email' 
AND `status`='active'";
$sql_active_exec = $con->query($sql_active_transact);
$sql_count_active_exec = mysqli_num_rows($sql_active_exec);

if(!isset($_SESSION['email'])){header('Location:login.php');}
?>
<?php include('header.php'); ?>
<body class="page-user">

<?php include('nav.php'); ?>

<div>
<div class="page-content">
<div class="container">
<div class="row">
<div class="col-lg-6 col-6">
<div class="token-information card card-full-height" style="border-radius: 20px;">
<div class="token-info">
<h1 class="token-info-head text-light">Total Trades</h1>
<div class="gaps-2x"></div>
<h5 class="token-info-sub"><?php if(isset($sql_count_row_exec4) && $sql_count_row_exec4!==null){
    echo $sql_count_row_exec4;}?></h5>
</div>
</div>
<!-- .card -->
</div><!-- .col -->
<div class="col-lg-6 col-6">
<div class="token-information card card-full-height" style="border-radius:20px;">
<div class="token-info">
<h1 class="token-info-head text-light">Active Trades</h1>
<div class="gaps-2x"></div>
<h5 class="token-info-sub"><?php if(isset($sql_count_active_exec) && $sql_count_active_exec!==null){echo $sql_count_active_exec;}?></h5>
</div>
</div>
<!-- .card -->
</div><!-- .col -->
<div class="col-lg-4 col-12 col-md-6">
<div class="token-information card card-full-height " style="border-radius: 20px;">
<div class="token-info">
<h1 class="token-info-head text-light">Completed Trades</h1>
<div class="gaps-2x"></div>
<h5 class="token-info-sub"><?php if(isset($sql_count_active_exec) && $sql_count_active_exec!==null){echo $sql_count_active_exec;}?></h5>
</div>
</div>
<!-- .card -->
</div><!-- .col -->
<div class="col-lg-8 col-12 col-md-6">
<div class="token-statistics card card-token height-auto" style="border-radius: 20px;">
<div class="card-innr">
<div class="token-balance token-balance-with-icon">

</div>
<div class="token-balance token-balance-s2 ">
<h6 class="card-sub-title">Crypto Balances</h6>
<ul class="token-balance-list row">

<li class="token-balance-sub col-md-12 col-lg-6 mb-3"><?php
    foreach($sql_fund_exec as $fund_info){extract($fund_info);?>
<span class="lead"><?php if(isset($fund_info['status']) && $fund_info['status']==="approved"){echo $amount;} ?></span>
<span class="sub"><?php if(isset($fund_info['status']) && $fund_info['status']==="approved"){echo $currency;} ?></span>
<?php } ?>
</li>
                        </ul>
</div>
</div>
</div>
</div><!-- .col -->
</div><!-- .col -->


<div class="row">
<div class="col-xl-12 col-lg-12">
<div class="token-transaction card card-full-height" style="border-radius: 20px;">
<div class="card-innr">
<div class="card-head has-aside">
<h4 class="card-title">Live Market Data</h4>

</div>
<!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
<div class="tradingview-widget-container__widget"></div>
<script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-screener.js" async>
{
"width": "100%",
"height": 490,
"defaultColumn": "overview",
"screener_type": "crypto_mkt",
"displayCurrency": "USD",
"colorTheme": "light",
"locale": "en"
}
</script>
</div>
<!-- TradingView Widget END -->
</div>
</div>
</div>


</div>
<!-- .row -->

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

<li><a href="https://p2pxtrade.com/privacy-policy">Privacy Policy</a></li>
<li><a href="https://p2pxtrade.com/terms-of-use">Terms & Conditions</a></li>
</ul>
</div>
<!-- .col -->
<div class="col-md-4 mt-2 mt-sm-0">
<div class="d-flex justify-content-between justify-content-md-end align-items-center guttar-25px pdt-0-5x pdb-0-5x">
<div class="copyright-text">&copy; 2021 P2P Xtrade</div>
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


</div>
<!-- .modal-dialog -->
</div>
<!-- Modal End -->
<!-- JavaScript (include all script here) -->
<script src="https://transactright.com/js/app.js"></script>
<script src="./assets/js/jquery.bundle49f7.js"></script>
<script src="./assets/js/script49f7.js"></script>
<!-- <script type="text/javascript">
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
<script src="//code.tidio.co/ylcbkybnqaslgvjzhluenllylwxzgcyl.js" async></script>
</body>

</html>

<?php
include('../function.php');
//Begin cookie and include the cookie file
include('../cookie.php');
 
if(isset($_POST['editAmount'])){
  //Extract variables from user input
  $etxn = $_POST['etxn'];
  $eamount = floatval($_POST['eamount']);
  $sql_update_fund_amount = "UPDATE `fund` SET `amount`='$eamount' WHERE `ftxn`='$etxn'";

  if($con->query($sql_update_fund_amount) === TRUE){
    $toast = "success";
    echo "<script>location.href='funding-requests.php'</script>";
  }
  else{$toast = "fail";}
}
$con->close();
?>
<?php include('header.php'); ?>

<body class="page-user">
<?php include('nav.php'); ?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-4 col-xs-12">
 				
                  <div class="card-body">
                    <center>
                  		<h4 class="text-primary" style="color:steelblue !important;">Edit user detail</h4>

                    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" name="editAmount">
      <div class="form-group has-feedback">
        <input type="text" name="etxn" class="form-control sty1" value="<?php if(isset($_GET['af']) && $_GET['af']!==null){echo $_GET['af'];}?>">
      </div>
      <div class="form-group has-feedback">
        <input type="text" name="eamount" class="form-control sty1" placeholder="Enter new amount" required>
      
      </div>
        <!-- /.col -->
          <button type="submit" class="btn btn-primary btn-block btn-flat" name="editAmount">Add Bonus</button>
        </div>
        <!-- /.col --> 
      </div> 
    </form>
  </center>
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
<script type="text/javascript">
  toastr.info('Use this section to edit user finance details and add bonuses','Info');
</script>
    </body>
    </html>
    <?php
if(isset($toast) && $toast==='success'){echo "<script>toastr.success('You have changed user information, 'Success')</script>";}
if(isset($toast) && $toast==='fail'){echo "<script>toastr.error('That operation could not be carried out. Try again', 'Error')</script>";}
?>
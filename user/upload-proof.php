  <?php
//Require my functions.php file
include('function.php');
//Begin cookie and include the cookie file
//include('cookie.php');

if(isset($_POST['proofUpload']) && !empty($_FILES['imageProof']['name'])){
  $errors = [];
  $file_tmp= $_FILES['imageProof']['tmp_name'];
  $file_name=$_FILES['imageProof']['name'];
  $file_size=$_FILES['imageProof']['size'];
  $file_type=$_FILES['imageProof']['type'];
  $fcomment = sanitize($_POST['comment']);

  $file_name_sanitizer= explode('.',$file_name);
  $file_ext = strtolower(end($file_name_sanitizer));

  $extensions = array("jpg","jpeg","png");

if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a jpeg, jpg or png file.";
          echo "<script>alert('Only jpeg, jpg, png files are allowed')</script>";
      }
      
      if($file_size > 500000) {
         $errors[]='File size must be less than 500KB';
         echo "<script>alert('File size should be less than 500KB')</script>";
      }

      if(empty($errors)==true) {
         move_uploaded_file($file_tmp,"upload/".$file_name);
         $sql_insert_fproof = "UPDATE `fund` SET `fproof`='$file_name',`fcomment`='$fcomment' WHERE `ftxn`='$ftxn' ";
         if($con->query($sql_insert_fproof)){
         $toast = "success";
         header('Refresh:1');
      }else{$toast = "fail";}
    }
}
$con->close();
?>
  <?php include('header.php'); ?>

<body class="page-user">
<?php include('nav.php'); ?>
  <div> 
  <div class="page-content">
    <div class="container">
      <div class="card content-area">
        <div class="card-innr table-responsive">

        <div class="card-title">
          <h4 class="p2pText">Upload Payment Proof</h4>
        </div>

                        
        <h4 class="p2pText">Transaction ID: <?php if(isset($ftxn) && $ftxn!==null){echo $ftxn;}?></h4>

        <div class="form">
          <form action="<?= htmlentities($_SERVER['PHP_SELF']); ?>" method="post" class="form" enctype="multipart/form-data">
           
            <div class="form-group">
              <label for="image">Payment Proof</label>
              <input value="" type="file" class="input-bordered " name="imageProof" required>
            </div>

            <br />

            <div class="form-group">
              <label for="image">Comment</label>
              <textarea class="form-control" name="comment" rows="5" placeholder="Not more than 500 words preferably" maxlength="500"></textarea>
            </div>

            <br />

            <div class="form-btn-group">
              <button type="submit" class="btn p2pBtn" name="proofUpload">Submit</button>
            </div>
          </form>
          
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
                        
                        <li><a href="https://p2pxtrade.com/privacy">Privacy Policy</a></li>
                        <li><a href="https://p2pxtrade.com/terms">Terms & Conditions</a></li>
                    </ul>
                </div>
                <!-- .col -->
                <div class="col-md-4 mt-2 mt-sm-0">
                    <div class="d-flex justify-content-between justify-content-md-end align-items-center guttar-25px pdt-0-5x pdb-0-5x">
                        <div class="copyright-text">&copy; <?= date('Y');?> P2PxTrade</div>
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
<!--Toastr-->
<script type="text/javascript" src="dist/js/toastr.min.js"></script>
</body>
</html>
<?php
if(isset($toast) && $toast==='success'){
  echo "<script>toastr.success('Proof of payment uploaded, please wait for approval', 'Success')</script>";
}

if(isset($toast) && $toast==='fail'){
  echo "<script>toastr.error('Proof of payment upload declined, please try again', 'Failure')</script>";
}
?>
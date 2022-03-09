<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//Require my functions.php file
include('./function.php');

include('header.php'); 

//Load Composer's autoloader
require 'admin/vendor/autoload.php';

// require 'admin/mailer/PHPMailer/src/Exception.php';
// require 'admin/mailer/PHPMailer/src/PHPMailer.php';
// require 'admin/mailer/PHPMailer/src/SMTP.php';

if(isset($_GET['fn']) && isset($_GET['em'])){
    $fn = $_GET['fn']; $em = $_GET['em']; 
    $active = "<p>Welcome! If you are receiving this mail then your account has been successfully activated and you can proceed to transact and trade on the platform.<br>
We offer 24/7 live support for safe transactions/disputes settling.<br>
Any issues encountered kindly contact support for further assistance</p>";

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
     $mail->SMTPDebug = 0;                      //Enable verbose debug output SMTP::DEBUG_SERVER
    $mail->isSMTP();                                      //Send using SMTP
    $mail->Host       = '';        //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                             //Enable SMTP authentication
    $mail->Username   = '';          //SMTP username
    $mail->Password   = '';                  //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;      //Enable implicit TLS encryption
    $mail->Port       = 465;                              //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom( );
    $mail->addAddress($_GET['em'], $_GET['fn']);     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Your Email Verification';
    $mail->Body    = $active;
    $mail->AltBody = $active;

    $mail->send();
     $toast= "success"; header("Refresh:2,url=login.php");
 } catch (Exception $e){echo "";}
}
else{echo "<script>location.href='login.php'</script>";
}
?>
<body class="page-user" style="background-color: #fff !important;">
    <div class="row">
 <div class="col-12"><p><big>Welcome to Broker <span class="orange">Trade</span>!<br>
Kindly check your mail inbox for the welcome mail to certify verification.<br> 
Safe trade, swift and secure transactions.</big></p>
</div></div>
 

    <!-- jQuery 3 --> 
<script src="dist/js/jquery.min.js"></script> 

<!-- v4.0.0-alpha.6 --> 
<script src="dist/bootstrap/js/bootstrap.min.js"></script> 

<!-- template --> 
<script src="dist/js/niche.js"></script> 

<!-- jQuery UI 1.11.4 --> 
<script src="dist/plugins/jquery-ui/jquery-ui.min.js"></script>

<!-- Toastr -->
<script src="dist/js/toastr.min.js"></script>
    </body>
    </html>
    <?php
if(isset($toast) && $toast==='success'){echo "<script>toastr.success('You may close this page and check your email address to continue.', 'Successful Verification')</script>";}
?>


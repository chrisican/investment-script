<?php
//Begin session and include the session file
include('session.php');

define('SERVER', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB', 'zenbroker');

$con = new mysqli(SERVER,USER,PASS,DB);

if($con->connect_error){
	die("Connection failed: ".$con->connect_error);
}

if(isset($_SESSION['email']) && $_SESSION['email']!==null){ 
$sql_profile = "SELECT * FROM `users` WHERE `user_email`='$session_email'";
$sql_exec = $con->query($sql_profile);
foreach($sql_exec as $info){extract($info);
//$profile_photo = '../upload/'.$photo;
}

$sql_admin = "SELECT * FROM `admin` WHERE `user_email`='$session_email'";
$sql_exec3 = $con->query($sql_admin);
foreach($sql_exec3 as $admin_info){extract($admin_info);}

$sql_transact = "SELECT * FROM `transaction` WHERE `user_email`='$session_email'";
$sql_exec4 = $con->query($sql_transact);
$sql_count_row_exec4 = mysqli_num_rows($sql_exec4);
foreach($sql_exec4 as $transact_info){extract($transact_info);}

$sql_fund = "SELECT * FROM `fund` WHERE `user_email`='$session_email'";
$sql_fund_exec = $con->query($sql_fund);
foreach($sql_fund_exec as $fund_info){extract($fund_info);}

$sql_withdraw = "SELECT * FROM `withdraw` WHERE `user_email`='$session_email'";
$sql_withdraw_exec = $con->query($sql_withdraw);
foreach($sql_withdraw_exec as $withdraw_info){extract($withdraw_info);}

$sql_addresses = "SELECT * FROM `addresses`";
$sql_addresses_exec = $con->query($sql_addresses);
foreach($sql_addresses_exec as $addresses_info){extract($addresses_info);}
}
?>
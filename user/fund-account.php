<?php
//Require my functions.php file
include('function.php');
//Begin cookie and include the cookie file
include('cookie.php');

//$sessEmail = $_SESSION['email'];
if(isset($_POST['fund'])){
  //Extract variables from user input
  $ftxn = $_POST['Ftxn'];
  $currency = $_POST['currency_id'];
  $amount = floatval($_POST['amount']);  

  /*$sql_fund_update = "UPDATE `fund` SET `currency` = '$currency', `amount` = '$amount' WHERE `fund`.`user_email` = '$user_email'";*/
$sql_fund_update = "INSERT INTO fund(user_email,ftxn,currency,amount)VALUES('$user_email','$ftxn','$currency','$amount')";
  if($con->query($sql_fund_update) === TRUE){
   //echo "<script>alert('Your funding request is submitted and is pending approval')</script>";
  echo"<script>location.href='user-transactions.php'</script>";
  //header("Refresh:1,url=user-transactions.php");
}
  else{echo "<script>alert('There is a problem with your funding request, contact an administrator')</script>";}
}
if(isset($_POST['withdraw'])){
  //Extract variables from user input
  $wtxn = $_POST['Wtxn'];
  $currency2 = $_POST['currency_id2'];
  $amount2 = floatval($_POST['amount2']);
  $address = sanitize($_POST['address']);   

  /*$sql_withdraw_update = "UPDATE `withdraw` SET `currency` = '$currency', `amount` = '$amount',`wallet_address` = '$address' WHERE `withdraw`.`user_email` = '$user_email'";
*/

  $sql_withdraw_update = "INSERT INTO withdraw(user_email,wtxn,wcurrency,wamount,wallet_address)VALUES('$user_email','$wtxn','$currency2','$amount2','$address')";

  if($con->query($sql_withdraw_update) === TRUE){
   //echo "<script>alert('Your withdrawal request is submitted and is pending approval')</script>";
    header('Refresh:2,url=user-transactions.php');}
  else{echo "<script>alert('There is a problem with your withdrawal request, please try again')</script>";}
}

/*if(!isset($_POST['fund']) || !isset($_POST['withdraw']) || !isset($_POST['proofUpload'])){
	header('Location:user-area.php');
}*/

$con->close();
?>
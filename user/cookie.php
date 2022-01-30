<?php
//PHP COOKIES
//Set a cookie - all cookies are set for 30days
    if(isset($_POST['checkbox'])){
    setcookie("email",$_POST['user'],time()+(86400*30),"","",true);
    setcookie("pwd",$_POST['pwd'],time()+(86400*30),"","",true,true);
    }

    if(isset($_GET['ewa']) && $_GET['ewa']!==null){   
        setcookie("wallet",$_GET['ewa']);
        header("Refresh:0.5,url=change-wallet.php");
    }

     if(isset($_GET['eqc']) && $_GET['eqc']!==null){   
        setcookie("qrCode",$_GET['eqc']);
        header("Refresh:0.5,url=change-wallet.php");
    }

    if(isset($currency) && $currency!==null){
        setcookie("currency",$currency);
    }
?>
  <div class="topbar-wrap">
        <div class="topbar is-sticky">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <ul class="topbar-nav d-lg-none">
                        <li class="topbar-nav-item relative">
                            <a class="toggle-nav" href="#">
                                <div class="toggle-icon"><span class="toggle-line"></span><span class="toggle-line"></span><span class="toggle-line"></span><span
                                        class="toggle-line"></span></div>
                            </a>
                        </li>
                        <!-- .topbar-nav-item -->
                    </ul>
                    <!-- .topbar-nav -->
                    <a class="topbar-logo" href="#" target="_blank" rel="noopener"></a>
                    <ul class="topbar-nav">
                        <li class="topbar-nav-item relative"><span class="user-welcome d-none d-lg-inline-block">Hello&nbsp;<?php if(isset($firstname) && isset($lastname)){echo $firstname."&nbsp;".$lastname;}?></span><a class="toggle-tigger user-thumb" href="#"><img src="<?php if(isset($profile_photo) && $profile_photo!==null){echo $profile_photo;}?>"><i class="fa fa-user"></i></a>
                            <div class="toggle-class dropdown-content dropdown-content-right dropdown-arrow-right user-dropdown dds">
                                
                                <ul class="user-links">
                 <li><a href="https://zenithbrokertrade.org/user/edit-profile.php"><i class="fa fa-user"></i> Edit Profile</a>
                                    </li>
                <li><a href="https://zenithbrokertrade.org/user/edit-profile.php"><i class="fa fa-key"></i> Reset Password</a>
                                    </li>
                                </ul>
                                <ul class="user-links bg-light">
                                    <li>
                                        <a href="logout.php"><i class="fa fa-sign-out-alt"></i> Logout</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- .topbar-nav-item -->
                    </ul>
                    <!-- .topbar-nav -->
                </div>
            </div>
            <!-- .container -->
        </div>
        <!-- .topbar -->
        <div class="navbar">
            <div class="container">
                <div class="navbar-innr">
                    <ul class="navbar-menu">
                        <li><a href="https://zenithbrokertrade.org/user/user-area.php"><span class="icon-s"><i class="fa fa-columns"></i>
                                    Dashboard</a></li>
                        <li><a href="https://zenithbrokertrade.org/user/edit-profile.php"><span class="icon-s"><i class="fa fa-user"></i>Edit Profile</a></li>
                        <li><a href="https://zenithbrokertrade.org/user/create-trade.php"><i class="fa fa-chart-line"></i>Create Trade</a>
                        </li>
                        <li><a href="https://zenithbrokertrade.org/user/user-transactions.php"><i class="fa fa-file-invoice-dollar"></i> Account Transactions</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#withdrawal-modal"><i class="fa fa-hand-holding-usd"></i> Withdrawal</a></li>
                         <li><a href="https://zenithbrokertrade.org/user/logout.php"><i class="fa fa-sign-out-alt"></i> Logout</a></li>
                    </ul>
                    <!-- <ul class="navbar-btns">
                        <li>
                            <a href="#" data-toggle="modal" data-target="#crypto-fund-modal" class="btn btn-sm btn-outline btn-light">
                                <span class="icon-s"><i data-feather="file"></i></span>
                                <span>Fund Account</span>
                            </a>
                        </li>
                    </ul> -->
                </div>
                <!-- .navbar-innr -->
            </div>
            <!-- .container -->
        </div>
        <!-- .navbar -->
    </div>
    <!-- .topbar-wrap -->
 <!-- Modal End -->
    <!-- Modal Centered -->
    <!--FUND ACCOUNT -->
    <div class="modal fade sho d-bloc" id="crypto-fund-modal" tabindex="-1">
        <div class="modal-dialog modal-dialog-sm modal-dialog-centered">
            <div class="modal-content">
                <a href="#" class="modal-close" data-dismiss="modal" aria-label="Close"><big>&times;</big></a>
                <div class="popup-body">
                    <form method="POST" action="fund-account.php">
                        <input type="hidden" name="Ftxn" value="<?= 'TXN'.mt_rand(100000,999999);?>">                      
                        <div class="input-item input-with-label">
                            <label class="input-item-label">Select currency to fund</label>
                            <div class="select-wrapper">
                                <select class="input-bordered" name="currency_id">
                                    <?php foreach($sql_addresses_exec as $addresses_info){extract($addresses_info);?>
                                        <option value="<?= $addresses_info['wallets']?>"><?= $addresses_info['wallets']?></option><?php }?>
                                    </select>
                            </div>
                        </div>
                        <div class="input-item input-with-label">
                            <label class="input-item-label">Enter Amount</label>
                            <input class="input-bordered" type="text" placeholder="Amount" name="amount" required />
                        </div>
                        <button type="submit" class="btn btn-warning btn-between" name="fund">
                            Proceed <i class="fa fa-forward"></i>
                        </button>
                    </form>
                </div>
            </div>
            <!-- .modal-content -->
        </div>
        <!-- .modal-dialog -->
    </div>
    <!-- Modal End -->
    <!-- Modal Centered -->
    <!-- WITHDRAWAL FORM-->
    <div class="modal fade" id="withdrawal-modal" tabindex="-1">
        <div class="modal-dialog modal-dialog-md modal-dialog-centered">
            <div class="modal-content">
                <a href="#" class="modal-close" data-dismiss="modal" aria-label="Close"><big>&times;</big></a>
                <div class="popup-body">
                    <form method="POST" action="fund-account.php">  
                       <input type="hidden" name="Wtxn" value="<?= 'TXN'.mt_rand(100000,999999);?>">                
                      <div class="input-item input-with-label">
                            <label class="input-item-label">Select withdrawal method</label>
                            <div class="select-wrapper">
                                <select class="input-bordered" name="currency_id2">
                                     <?php foreach($sql_addresses_exec as $addresses_info){extract($addresses_info);?>
                                        <option value="<?= $addresses_info['wallets']?>"><?= $addresses_info['wallets']?></option><?php }?>
                        </select>
                            </div>
                        </div>
                        <div class="input-item input-with-label">
                            <label class="input-item-label">Enter Amount</label>
                            <input class="input-bordered" type="text" placeholder="Amount" name="amount2" required value="" />
                        </div>
                        <div class="input-item input-with-label">
                            <label class="input-item-label">Destination Address</label>
                            <input class="input-bordered" type="text" placeholder="Address" name="address" required value="" />
                        </div>
                        <button type="submit" class="btn btn-warning btn-between" name="withdraw">Proceed <i class="fa fa-forward"></i></button>
                    </form>
                </div>
            </div>
            <!-- .modal-content -->
        </div>
        <!-- .modal-dialog -->
    </div>
    <!-- Modal End -->

     <!-- Modal Centered -->
    <!-- WITHDRAWAL FORM-->
    <div class="modal fade" id="view-address" tabindex="-1">
        <div class="modal-dialog modal-dialog-md modal-dialog-centered">
            <div class="modal-content">
                <a href="#" class="modal-close" data-dismiss="modal" aria-label="Close"><big>&times;</big></a>
                <div class="popup-body">
                    <form method="POST" action="">                
                      <div class="input-item input-with-label">
                        </div>                
                        <?php 
                        if(isset($_COOKIE['currency']) && $_COOKIE['currency']!==null){
                            
                            $cookieCurrency = $_COOKIE['currency'];
                        $show_address = "SELECT * FROM `addresses` WHERE `addresses`.`wallets` = '$cookieCurrency'";

                        $show_address_exec = $con->query($show_address);
                        
                        foreach ($show_address_exec as $fetch_wallet){extract($fetch_wallet);?>
                             <div class="input-item input-with-label">
                            <span class="input-item-label">QR Code</span><br>
                            <!-- <input class="input-bordered" type="text" placeholder="Amount" name="amount2" required value="" /> -->
                            <output style="border:1px solid black;"><?php echo "<img src='upload/$qrcode' alt='QRcode' width='100%' height='300px'>";?></output>
                        </div>

                        <div class="input-item input-with-label">
                           <!--  <span class="input-item-label">Pay to this Address, afterwards, come back and click the upload proof button to upload proof</span> -->
                            <input class="input-bordered" type="text" name="add" value="<?= $addresses;?>" id="myInput" disabled><br><button type="button" class="btn btn-warning" onclick="myFunction()">Copy address</button>
                            <br><output id="displayText"></output>                    
                        </div>
                    <?php } }?>

                        <!-- <a href="upload-proof.php" class="btn btn-warning btn-between" name="upload-proof">Click To Upload Proof&nbsp;<i class="fa fa-forward"></i></a> -->
                    </form>
                </div>
            </div>
            <!-- .modal-content -->
        </div>
        <!-- .modal-dialog -->
    </div>
    <!-- Modal End -->

     <!--STARTER PACK -->
    <div class="modal fade sho d-bloc" id="starter-pack" tabindex="-1">
        <div class="modal-dialog modal-dialog-sm modal-dialog-centered">
            <div class="modal-content">
                <a href="#" class="modal-close" data-dismiss="modal" aria-label="Close"><big>&times;</big></a>
                <div class="popup-body">
                    <form method="POST" action="fund-account.php">
                        <input type="hidden" name="stxn" value="<?= 'TXN'.mt_rand(100000,999999);?>"> 
                        <div class="input-item input-with-label">
                            <div class="select-wrapper">
                                <table class="table"><tr>
                                    <th>Starter Pack</th></tr><tr>
                               <td><span>Price: $100</span></td>
                               <td><span>Duration: 1 month</span></td>
                               <td><span>Harsh: 5 Ph/s</span></td>
                           </tr></table>
                            </div>
                        </div>                     
                        <div class="input-item input-with-label">
                            <label class="input-item-label">Select currency to fund</label>
                        
                            <div class="select-wrapper">
                                <select class="input-bordered" name="currency_id">
                                    <?php foreach($sql_addresses_exec as $addresses_info){extract($addresses_info);?>
                                        <option value="<?= $addresses_info['wallets']?>"><?= $addresses_info['wallets']?></option><?php }?>
                                    </select>
                            </div></div>
            <button type="submit" class="btn btn-warning btn-between" name="starter">Proceed <i class="fa fa-forward"></i>
                        </button>
                    </form>
                </div>
            </div>
            <!-- .modal-content -->
        </div>
        <!-- .modal-dialog -->
    </div>
    <!-- Modal End -->

     <!--PREMIUM PACK -->
    <div class="modal fade sho d-bloc" id="premium-pack" tabindex="-1">
        <div class="modal-dialog modal-dialog-sm modal-dialog-centered">
            <div class="modal-content">
                <a href="#" class="modal-close" data-dismiss="modal" aria-label="Close"><big>&times;</big></a>
                <div class="popup-body">
                    <form method="POST" action="fund-account.php">
                        <input type="hidden" name="ptxn" value="<?= 'TXN'.mt_rand(100000,999999);?>">                      
                            <div class="input-item input-with-label">
                            <div class="select-wrapper">
                                <table class="table"><tr>
                                    <th>Premium Pack</th></tr><tr>
                               <td><span>Price: $1,000</span></td>
                               <td><span>Duration: 3 months</span></td>
                               <td><span>Harsh: 10 Ph/s</span></td>
                           </tr></table>
                            </div>
                        </div>    
                         <div class="input-item input-with-label">
                            <label class="input-item-label">Select currency to fund</label>
                            <div class="select-wrapper">
                                <select class="input-bordered" name="currency_id">
                                    <?php foreach($sql_addresses_exec as $addresses_info){extract($addresses_info);?>
                                        <option value="<?= $addresses_info['wallets']?>"><?= $addresses_info['wallets']?></option><?php }?>
                                    </select>
                            </div></div>
                        <button type="submit" class="btn btn-warning btn-between" name="premium">
                            Proceed <i class="fa fa-forward"></i>
                        </button>
                    </form>
                </div>
            </div>
            <!-- .modal-content -->
        </div>
        <!-- .modal-dialog -->
    </div>
    <!-- Modal End -->

     <!--GOLD PACK -->
    <div class="modal fade sho d-bloc" id="gold-pack" tabindex="-1">
        <div class="modal-dialog modal-dialog-sm modal-dialog-centered">
            <div class="modal-content">
                <a href="#" class="modal-close" data-dismiss="modal" aria-label="Close"><big>&times;</big></a>
                <div class="popup-body">
                    <form method="POST" action="fund-account.php">
                        <input type="hidden" name="gptxn" value="<?= 'TXN'.mt_rand(100000,999999);?>">                      
                       <div class="input-item input-with-label">
                            <div class="select-wrapper">
                                <table class="table"><tr>
                                    <th>Gold Pack</th></tr><tr>
                               <td><span>Price: $10,000</span></td>
                               <td><span>Duration: 3 months</span></td>
                               <td><span>Harsh: 15 Ph/s</span></td>
                           </tr></table>
                            </div>
                        </div>    
                         <div class="input-item input-with-label">
                            <label class="input-item-label">Select currency to fund</label>
                            <div class="select-wrapper">
                                <select class="input-bordered" name="currency_id">
                                    <?php foreach($sql_addresses_exec as $addresses_info){extract($addresses_info);?>
                                        <option value="<?= $addresses_info['wallets']?>"><?= $addresses_info['wallets']?></option><?php }?>
                                    </select>
                            </div></div>
                        <button type="submit" class="btn btn-warning btn-between" name="goldpack">Proceed <i class="fa fa-forward"></i>
                        </button>
                    </form>
                </div>
            </div>
            <!-- .modal-content -->
        </div>
        <!-- .modal-dialog -->
    </div>
    <!-- Modal End -->

     <!--GOLD PLUS -->
    <div class="modal fade sho d-bloc" id="gold-plus" tabindex="-1">
        <div class="modal-dialog modal-dialog-sm modal-dialog-centered">
            <div class="modal-content">
                <a href="#" class="modal-close" data-dismiss="modal" aria-label="Close"><big>&times;</big></a>
                <div class="popup-body">
                    <form method="POST" action="fund-account.php">
                        <input type="hidden" name="gpptxn" value="<?= 'TXN'.mt_rand(100000,999999);?>">                      
                        <div class="input-item input-with-label">
                            <div class="select-wrapper">
                                <table class="table"><tr>
                                    <th>GOLD PLUS</th></tr><tr>
                               <td><span>Price: $100,000</span></td>
                               <td><span>Duration: 3 months</span></td>
                               <td><span>Harsh: 50 Ph/s</span></td>
                           </tr></table>
                            </div>
                        </div>    
                         <div class="input-item input-with-label">
                            <label class="input-item-label">Select currency to fund</label>
                            <div class="select-wrapper">
                                <select class="input-bordered" name="currency_id">
                                    <?php foreach($sql_addresses_exec as $addresses_info){extract($addresses_info);?>
                                        <option value="<?= $addresses_info['wallets']?>"><?= $addresses_info['wallets']?></option><?php }?>
                                    </select>
                            </div></div>
                        <button type="submit" class="btn btn-warning btn-between" name="goldplus">Proceed <i class="fa fa-forward"></i>
                        </button>
                    </form>
                </div>
            </div>
            <!-- .modal-content -->
        </div>
        <!-- .modal-dialog -->
    </div>
    <!-- Modal End -->
    <script type="text/javascript">
        function myFunction() {
  /* Get the text field */
  var copyTexts = document.getElementById("myInput");

  /* Select the text field */
  copyTexts.select();
  copyTexts.setSelectionRange(0, 99999); /* For mobile devices */

   /* Copy the text inside the text field */
  navigator.clipboard.writeText(copyTexts.value);

  /*Display inside the output field provided*/
  document.getElementById('displayText').innerHTML = "Address copied";

}
    </script>

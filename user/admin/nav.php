
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
                    <a class="topbar-logo" href="" target="_blank" rel="noopener"></a>
                    <ul class="topbar-nav">
                        <li class="topbar-nav-item relative"><span class="user-welcome d-none d-lg-inline-block">Hello&nbsp;<?php if(isset($firstname) && isset($lastname)){echo $firstname."&nbsp;".$lastname;}?></span><a class="toggle-tigger user-thumb" href="#"><img src="<?php if(isset($profile_photo) && $profile_photo!==null){echo $profile_photo;}?>"><i class="fa fa--user"></i></a>
                            <div class="toggle-class dropdown-content dropdown-content-right dropdown-arrow-right user-dropdown dds">
                                
                                <ul class="user-links">
                 <li><a href="./edit-profile.php"><i class="fa fa-user"></i> Edit Profile</a>
                                    </li>
                <li><a href="./edit-profile.php"><i class="fa fa-key"></i> Reset Password</a>
                                    </li>
                                </ul>
                                <ul class="user-links bg-light">
                                    <li>
                                        <a href="../logout.php"><i class="fa fa-sign-out-alt"></i> Logout</a>
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
                       <!--  <li><a href="#"><span class="icon-s"><i class="fa fa-columns"></i>
                                    Dashboard</a></li> -->
                        <li><a href="./edit-profile.php"><span class="icon-s"><i class="fa fa-user"></i>Dashboard</a></li>
                        <li class="has-dropdown page-links-all">
                            <a class="drop-toggle" href="#"><i class="fa fa-users"></i>Users and Admin</a>
                            <ul class="navbar-dropdown">
                                <li><a class="p2pText" href="view-users.php">View Users</a></li>
                                <li><a class="p2pText" href="view-admin.php">View Admins</a></li>
                                 <li><a class="p2pText" href="add-admin.php">Add Admin</a></li>
                            </ul>
                        </li>

                        <li class="has-dropdown page-links-all">
                            <a class="drop-toggle" href="#"><i class="fa fa-chart-area"></i>Account Requests</a>
                            <ul class="navbar-dropdown">
                               <li><a class="p2pText" href="funding-requests.php">Funding Requests</a></li>
                                 <li><a class="p2pText" href="transactions.php">Trade Requests</a></li> 
                                <li><a class="p2pText" href="withdraw-requests.php">Withdraw Requests</a></li>
                            </ul>
                        </li>

                        <li><a href="addresses.php"><i class="fa fa-file-invoice-dollar"></i> Addresses</a></li>
                         <li><a href="transactions.php"><i class="fa fa-file-invoice-dollar"></i> Account Transactions</a></li>
                      <!--   <li><a href="#" data-toggle="modal" data-target="#withdrawal-modal"><i class="fa fa-hand-holding-usd"></i> Withdrawal</a></li> -->
                         <li><a href="/user/logout.php"><i class="fa fa-sign-out-alt"></i> Logout</a></li>
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
    <div class="modal fade sho d-bloc" id="editAmount" tabindex="-1">
        <div class="modal-dialog modal-dialog-sm modal-dialog-centered">
            <div class="modal-content">
                <a href="#" class="modal-close" data-dismiss="modal" aria-label="Close"><big>&times;</big></a>
                <div class="popup-body">
                    <form method="POST" action="fund-account.php">
                        <input type="text" name="editAmount" value="<?php if(isset($GLOBALS['eFtxn']) && $GLOBALS['eFtxn']!==null){echo $GLOBALS['eFtxn'];}?>">
                        <!--                       
                        <div class="input-item input-with-label">
                            <label class="input-item-label">Select currency to fund</label>
                            <div class="select-wrapper">
                              
                            </div>
                        </div> -->
                        <div class="input-item input-with-label">
                            <label class="input-item-label">New amount</label>
                            <input class="input-bordered" type="text" name="newAmount" required />
                        </div>
                        <button type="submit" class="btn btn-warning btn-between" name="editBtn">
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
                      <!--   <input type="hidden" name="_token" value="ZbxLR83NJvu7Dwj3KmAR6ZFgMXG5d2po7uem0Zt2">      -->   
                       <input type="hidden" name="Wtxn" value="<?= 'TXN'.mt_rand(100000,999999);?>">                
                      <div class="input-item input-with-label">
                            <label class="input-item-label">Select withdrawal method</label>
                            <div class="select-wrapper">
                                <select class="input-bordered" name="currency_id2">
                                  <option value="Ethereum" >Ethereum</option>
                                          <option value="Bitcoin" >Bitcoin</option>
                                          <option value="USD Coin" >USD Coin</option>
                                          <option value="Tron" >Tron</option>
                                          <option value="Bscpad" >Bscpad</option>
                                          <option value="Shiba inu" >Shiba inu</option>
                                          <option value="Tether" >Tether</option>
                                          <option value="Algorand" >Algorand</option>
                                          <option value="Kmushicoin" >Kmushicoin</option>
                                          <option value="Cardence" >Cardence</option>
                                          <option value="Helium" >Helium</option>
                                          <option value="Cryptomines" >Cryptomines</option>
                                          <option value="Ecomi" >Ecomi</option>
                                          <option value="Ecomi" >Robot Shib</option>
                                          <option value="Uniswap" >Uniswap</option>
                                          <option value="Avalanche" >Avalanche</option>
                                          <option value="Decentraland" >Decentraland</option>
                                          <option value="Gravitoken" >Gravitoken</option>
                                          <option value="Chroma" >Chroma</option>
                                          <option value="Near" >Near</option>
                                          <option value="Filecoin" >Filecoin</option>
                                          <option value="Cardano" >Cardano</option>
                                          <option value="Tether" >Tether (TRC 20)</option>
                                          <option value="CHILIZ" >CHILIZ</option>
                                          <option value="Trias Token" >Trias Token</option>
                                          <option value="Ibnb" >Ibnb</option>
                                          <option value="Polkadot" >Polkadot</option>
                                          <option value="Solana" >Solana</option>
                                          <option value="LUNA" >LUNA</option>
                                          <option value="Helium" >Helium</option>
                                          <option value="RaDAO" >RaDAO</option>
                                          <option value="Radio Caca" >Radio Caca V2</option>
                                          <option value="One Share" >One Share</option>
                                          <option value="Revomon" >Revomon</option>
                                          <option value="dydX" >dydX</option>
                                          <option value="Scan DeFi V2" >Scan DeFi V2</option>
                                          <option value="Binance Coin" >Binance Coin</option>
                                          <option value="Casper Network" >Casper Network</option>
                                          <option value="Spinada Cash" >Spinada Cash</option>
                                          <option value="Binance USD" >Binance USD</option>
                                          <option value="Video Coin" >Video Coin</option>
                                          <option value="Chainlink" >Chainlink</option>
                                          <option value="The Sandbox" >The Sandbox</option>
                                          <option value="Polygon" >Polygon</option>
                                          <option value="Binance Smart chain" >Binance Smart chain</option>
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
                        <div class="input-item input-with-label">
                            <label class="input-item-label">QR CODE</label>
                            <!-- <input class="input-bordered" type="text" placeholder="Amount" name="amount2" required value="" /> -->
                            <output style="border:1px solid black;"></output>
                        </div>
                        <div class="input-item input-with-label">
                            <label class="input-item-label">Address</label>
                            <input class="input-bordered" type="text" placeholder="Address" name="address" value="<?php ?>" />
                        </div>
                        <!-- <button type="submit" class="btn btn-warning btn-between" name="withdraw">Proceed <em class="ti ti-wallet"></em></button> -->
                        <a href="upload-proof.php" class="btn btn-warning btn-between" name="upload-proof"><i class="fa fa-forward">Click To Upload Proof</i></a>
                    </form>
                </div>
            </div>
            <!-- .modal-content -->
        </div>
        <!-- .modal-dialog -->
    </div>
    <!-- Modal End -->



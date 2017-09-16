<?php
	//Start the session to see if the user is authencticated user.
    session_start();
    //Check if the user is authenticated first. Or else redirect to login page

    if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 2){
        //Connect to mysql server
        define("DB_SERVER","localhost");
        define("DB_USER","root");
        define("DB_PASSWORD","");
        define("DB_DATABASE","gaurav");
        $link = mysql_connect('localhost', 'root', '', 'gaurav');
        /*Check link to the mysql server*/
        if(!$link){
            die('Failed to connect to server: ' . mysql_error());
        }
        /*Select database*/
        $db = mysql_select_db('gaurav',$link);
        if(!$db){
            die("Unable to select database");
        }
		else{
			$query="SELECT * FROM owner WHERE 1";
			$result=mysql_query($query);
			$query1="SELECT * from renter where 1";
			$result1=mysql_query($query1);
					
        echo '<html>
        <head> 
        <meta charset="utf-8"> 
        <meta name="keywords" content=""> 
        <meta name="description" content=""> 
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0"> 
        <link rel="shortcut icon" type="image/png" href="favicon.png"> 
        <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" href="./css/animate.min.css">
        <link rel="stylesheet" href="./css/font-awesome.min.css">
        <link rel="stylesheet" href="./css/linecons.min.css">
        <link rel="stylesheet" href="./css/ionicons.min.css">
        <link href="https://fonts.googleapis.com/css?family=Josefin+Sans&subset=latin,latin-ext" rel="stylesheet" type="text/css"> 
        <script src="./js/jquery-2.1.0.min.js"></script>
        <script src="./js/bootstrap.min.js"></script>
        <script src="./js/blocs.min.js"></script>
        <script src="./js/jqBootstrapValidation.js"></script>
        <script src="./js/formHandler.js"></script> 
        <title>Admin</title> 
    </head>
    <body>
        <div class="page-container"> 
            <div class="bloc bgc-pale-blue l-bloc" id="bloc-34">
                <div class="container bloc-sm">
                    <nav class="navbar row">
                        <div class="navbar-header">
                            <a class="navbar-brand" href="index.html"><img src="img/logo.png" alt="logo" /></a>
                            <button id="nav-toggle" type="button" class="ui-navbar-toggle navbar-toggle" data-toggle="collapse" data-target=".navbar-1">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="collapse navbar-collapse navbar-1">
                            <ul class="site-navigation nav navbar-nav">
                                <li><a href="index.html">Home</a></li>
                                <li><a href="the_team.html">The Team</a></li>
                                <li><a href="index.html">Logout</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
            <div class="bloc bgc-white l-bloc " id="bloc-35">
                <div class="container bloc-lg">
                    <div class="row">
                        <div class="col-sm-12">
                            <h2 class="mg-md text-center">__Hello Admin__ <br><br>— Update Wallet Amount&nbsp;—<br></h2>
                            <h3 class="mg-md text-center"><br></h3>
                            <h3 class="mg-md text-center">Renter Account</h3>
                        </div>
                    </div>
                    <div class="row voffset">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-8">
                            <div class="row">';
            if($result1==true){
				while ($row1 = mysql_fetch_array($result1)){
                                echo'<div class="col-sm-3">
                                    <div class="panel">
                                        <div class="panel-heading">
                                            <h3 class="mg-clear text-center">'.$row1['rollnumber'].'</h3>
                                        </div>
                                        <div class="panel-body">
                                        <form action=update_wallet.php method="post">
										<input type="text" class="form-control" name="amount" placeholder='.$row1['wallet'].'><br>
                                        <button type="submit" name="selectcycle" class="btn btn-block btn-alice-blue btn-sm"" value='.$row1['rollnumber'].'>Update</button></form>
                                        </div>
                                    </div>
                                </div>';
                                }}
                                
                            echo'</div>
                        </div>
                        <div class="col-sm-2"></div>
                    </div>
                </div>
            </div>
            <div class="bloc bgc-alice-blue l-bloc" id="bloc-36">
                <div class="container bloc-lg">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="mg-md text-center">Owner Account</h3>
                        </div>
                    </div>
                    <div class="row voffset">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-8">
                            <div class="row">';
            if($result==true){
				while ($row = mysql_fetch_array($result)){
                                echo'
                                <div class="col-sm-3">
                                    <div class="panel">
                                        <div class="panel-heading">
                                            <h3 class="mg-clear text-center">'.$row['ownerrollnumber'].'</h3>
                                        </div>
                                        <div class="panel-body">
                                            <form action=update_wallet_owner.php method="post"> 
											<input type="text" class="form-control" name="amount" placeholder='.$row['ownerwallet'].'><br>
                                        <button type="submit" name="selectcycle" class="btn btn-block btn-alice-blue btn-sm"" value='.$row['ownerrollnumber'].'>Update</button></form>
                                        </div>
                                    </div>
                                </div>
                                ';}}
            echo'
                            </div>
                        </div>
                        <div class="col-sm-2"></div>
                    </div>
                </div>
            </div>
            <div class="bloc bgc-white l-bloc" id="bloc-37">
                <div class="container bloc-lg">
                    <div class="row">
                        <div class="col-xs-12 col-md-8 col-md-offset-2">
                            <h3 class="statement-bloc-text">"Please Don&rsquo;t missuse this page, do not add false entry in the wallet."</h3>
                            <p class="text-center">
                                <strong>-The Creator</strong>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <a class="bloc-button btn btn-d scrollToTop" onclick="scrollToTarget(1)"><span class="fa fa-chevron-up"></span></a>
            <div class="bloc bgc-black d-bloc" id="bloc-38">
                <div class="container bloc-lg">
                    <div class="row">
                        <div class="col-sm-3">
                            <h3 class="mg-md bloc-mob-center-text">About</h3>
                            <a href="the_team.html" class="a-btn a-block bloc-mob-center-text">The Team</a>
                            <a href="contact_us.html" class="a-btn a-block bloc-mob-center-text">Contact us</a>
                        </div>
                        <div class="col-sm-3">
                            <h3 class="mg-md bloc-mob-center-text">Book a Ride</h3>
                            <a href="renter_login.html" class="a-btn a-block bloc-mob-center-text">Login</a>
                            <a href="renter_login.html" class="a-btn a-block bloc-mob-center-text">Sign Up</a>
                        </div>
                        <div class="col-sm-3">
                            <h3 class="mg-md bloc-mob-center-text">Follow Us</h3>
                            <a href="index.html" class="a-btn a-block bloc-mob-center-text">Twitter</a>
                            <a href="index.html" class="a-btn a-block bloc-mob-center-text">Facebook</a>
                        </div>
                        <div class="col-sm-3">
                            <h3 class="mg-md bloc-mob-center-text">Company</h3>
                            <a href="termspolicy.html" class="a-btn a-block bloc-mob-center-text">Terms of use</a>
                            <a href="termspolicy.html" class="a-btn a-block bloc-mob-center-text">Privacy</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>';
        }}
?>
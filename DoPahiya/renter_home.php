<?php
	//Start the session to see if the user is authencticated user.
    session_start();
    //Check if the user is authenticated first. Or else redirect to login page
    if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1){
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
			$rollnum=$_SESSION['rollnumber'];
			$query="SELECT fullname,phonenumber,email,address,wallet from renter where rollnumber=$rollnum";
			$result=mysql_query($query);
			
			if($result==true){
				while ($row = mysql_fetch_assoc($result)){
                    
                    $_SESSION['wallet'] = $row['wallet'];
                    echo '
                    <html>
        <head> 
        <meta charset="utf-8"> 
        <meta name="keywords" content=""> <meta name="description" content=""> 
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
        <title>Renter Home</title>
    </head>
    <body><!-- Main container -->
        <div class="page-container">
            <div class="bloc bgc-pale-blue l-bloc" id="bloc-22">
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
                                <li><a href="logoutrenter.php">Logout</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
            <div class="bloc bgc-white l-bloc" id="bloc-23">
                <div class="container bloc-lg">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="mg-md">Let&rsquo;s Book you a Ride '.$row['fullname'].'.<br></h3>
                            <h3 class="mg-md">Wallet Balance:  '.$_SESSION['wallet'].'</h3>
                            <div class="divider-h"><span class="divider"></span></div>
                        </div>
                    </div>
                    
                    <div class="row voffset animDelay04 animSpeedLazy bgc-alice-blue animated vanishIn">';
                    
                    $query1 ="SELECT * from cycle where available = 1";
                    $result1=mysql_query($query1);
			
                    if($result1==true){
                        
				    while ($row1 = mysql_fetch_assoc($result1)){$_SESSION['bicyclepic']=$row1['bicyclepic'];
					$_SESSION['manufacturer']=$row1['manufacturer'];
					$_SESSION['model']=$row1['model'];
					$_SESSION['description']=$row1['description'];
    
                        echo '
                        <div class="col-sm-3">
                            <h4 class="mg-md"><br></h4>
                            <img src="upload/'.$_SESSION['bicyclepic'].'" width="270" height="175" />
                            <h4 class="mg-md">'.$_SESSION['manufacturer'].' Cycle</h4>
                            <h4 class="mg-md">'.$_SESSION['model'].'</h4>
                            <form action=cycle_profile.php method="post"> 
                            <button type="submit" name="selectcycle" class="btn btn-block btn-sm btn-pale-blue" value='.$row1['ownerid'].'>Veiw Detail</button></form>
                            
                  </div>';
                    }
                    }
                        echo '        
                        </div>
                        <div class="row voffset">
                        <div class="col-sm-12">
                            <div class="divider-h">
                                <span class="divider divider-half"></span>
                            </div>
                            <h4 class="mg-md text-center">
                                <br>&nbsp;-— Thats all folks —-&nbsp;<br><br></h4>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ScrollToTop Button -->
            <a class="bloc-button btn btn-d scrollToTop" onclick="scrollToTarget(1)">
                <span class="fa fa-chevron-up"></span>
            </a>
            <!-- Footer - bloc-30 -->
            <div class="bloc bgc-black d-bloc" id="bloc-30">
                <div class="container bloc-lg">
                    <div class="row">
                        <div class="col-sm-3">
                            <h3 class="mg-md bloc-mob-center-text">About</h3><a href="the_team.html" class="a-btn a-block bloc-mob-center-text">The Team</a>
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

				}
		}
	}}
?>